package routeme.server.response;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import routeme.server.DatabaseManager;
import twitter4j.Status;
import twitter4j.Twitter;
import twitter4j.TwitterException;
import twitter4j.TwitterFactory;
import twitter4j.auth.AccessToken;
import twitter4j.auth.RequestToken;

public class ResponseServer {

	protected DatabaseManager db;
	protected int pollingPeriod = 5000;
	
	public ResponseServer() {
		this.db = new DatabaseManager();
	}
	
	public void start() {
		Connection conn = this.db.getConnection();
		
		while (true) {
			try {
				Thread.sleep(this.pollingPeriod);
			} catch (InterruptedException e) {
				// DO NOTHING!!
			}
			
			this.processTweets(conn);
		}
	}
	
	protected void processTweets(Connection conn) {
		System.out.println("Polling for Tweets");
		Statement stmt = null;
		ResultSet rs = null;

		try {
			stmt = conn.createStatement();
			rs = stmt.executeQuery("SELECT * FROM `tweets` WHERE `processed` = 0");
			while (rs.next()) {
				if (this.processTweet(rs)) {
					this.markCompleted(conn, rs.getString("id"));
				}
			}
		} catch (SQLException e) {
			System.out.println("Error encountered while querying the database");
			System.out.println(e.getMessage());
		} finally {
			if (rs != null) {
				try {
					rs.close();
				} catch (SQLException e) {
					// IGNORE
				}
				rs = null;
			}
			
			if (stmt != null) {
				try {
					stmt.close();
				} catch (SQLException e) {
					// IGNORE
				}
				stmt = null;
			}
		}
	}
	
	protected void markCompleted(Connection conn, String id) {
		try {
			PreparedStatement pstmt = conn.prepareStatement("UPDATE `tweets` SET `processed` = 1 WHERE `id` = ?");
			pstmt.setString(1, id);
			pstmt.executeUpdate();
		} catch (SQLException e) {
			System.out.println("Failed to updated processed status");
			System.out.println(e.getMessage());
		}
	}
	
	protected boolean processTweet(ResultSet rs) {
		try {
			System.out.println("Processing tweet");

			String username = rs.getString("user_screen_name");
			if (!this.hasLocation(rs.getString("lat"), rs.getString("lon"))) {
				this.sendResponse(username, "Please enable Location when tweeting!");
				return true;
			}
			
			if (this.sendResponse(username, this.constructResponse())) {
				System.out.println("Response sent successfully!");
				return true;
			}
		} catch (SQLException e) {
			System.out.println("SQL Exception while getting data from ResultSet");
			System.out.println(e.getMessage());
		}
		return true;
	}
	
	protected boolean hasLocation(String lat, String lon) {
		return lat != null && lon != null;
	}
	
	protected String constructResponse() {
		// Replace this with real data
		String routeId = "1234";
		String location = "Cnr First St & River Rd";
		String walkTime = "3 min";
		String linkUrl = "http://bit.ly/123rnn";
		
		return "Bus " + routeId + ": " + location + " (" + walkTime + ") " + linkUrl;
	}
	
	protected boolean sendResponse(String to, String message) {
		return this.sendResponse("@" + to + " " + message);
	}
	
	protected boolean sendResponse(String message) {
		System.out.println("Attempting to send Twitter response");
		Status status = null;
		try {
			Twitter twitter = new TwitterFactory().getInstance();
			try {
                // get request token.
                // this will throw IllegalStateException if access token is already available
                RequestToken requestToken = twitter.getOAuthRequestToken();
                System.out.println("Got request token.");
                System.out.println("Request token: " + requestToken.getToken());
                System.out.println("Request token secret: " + requestToken.getTokenSecret());
                AccessToken accessToken = null;

                BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
                while (accessToken == null) {
                    System.out.println("Open the following URL and grant access to your account:");
                    System.out.println(requestToken.getAuthorizationURL());
                    System.out.print("Enter the PIN(if available) and hit enter after you granted access.[PIN]:");
                    String pin = br.readLine();
                    try {
                        if (pin.length() > 0) {
                            accessToken = twitter.getOAuthAccessToken(requestToken, pin);
                        } else {
                            accessToken = twitter.getOAuthAccessToken(requestToken);
                        }
                    } catch (TwitterException te) {
                        if (401 == te.getStatusCode()) {
                            System.out.println("Unable to get the access token.");
                        } else {
                            te.printStackTrace();
                        }
                    }
                }
                System.out.println("Got access token.");
                System.out.println("Access token: " + accessToken.getToken());
                System.out.println("Access token secret: " + accessToken.getTokenSecret());
            } catch (IllegalStateException ie) {
                // access token is already available, or consumer key/secret is not set.
                if (!twitter.getAuthorization().isEnabled()) {
                    System.out.println("OAuth consumer key/secret is not set.");
                    System.exit(-1);
                }
                System.out.println("Using existing access token");
            } catch (IOException ioe) {
            	System.out.println("IO Exception");
            	System.out.println(ioe.getMessage());
            	return false;
            }
			System.out.println("Attempting Tweet: " + message);
			status = twitter.updateStatus(message);
		} catch (TwitterException e) {
			System.out.println("Failed to update Twitter status");
			System.out.println(e.getMessage());
			e.printStackTrace();
			return false;
		}
		
		System.out.println("Successfully updated Twitter status: " + status.getText());
		return true;
	}
	
	/**
	 * @param args
	 */
	public static void main(String[] args) {
		System.out.println("=============================================");
		System.out.println("Starting RouteMe ResponseServer");
		System.out.println("=============================================");
		
		ResponseServer server = new ResponseServer();
		server.start();
	}
}
