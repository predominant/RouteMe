package routeme.server.timeline;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.List;
import java.sql.PreparedStatement;
import routeme.server.DatabaseManager;
import routeme.server.response.ResponseServer;
import twitter4j.Query;
import twitter4j.QueryResult;
import twitter4j.Tweet;
import twitter4j.Twitter;
import twitter4j.TwitterException;
import twitter4j.TwitterFactory;

public class TimelineServer {

	protected DatabaseManager db;
	
	public TimelineServer() {
		this.db = new DatabaseManager();
	}
	
	public void start() {
		Connection conn = this.db.getConnection();
		
		while (true) {
			try {
				Thread.sleep(2000);
			} catch (InterruptedException e) {
				// DO NOTHING!!
			}
				Statement stmt = null;
				PreparedStatement pstmt = null;
				ResultSet rs = null;			
			try {
				//Retrieve the tweets.
				List<Tweet> tweets = this.checkTimeline(conn);
				

				boolean success = false;
				stmt = conn.createStatement();

				//Cycle through all the retrieved tweets, looking for new ones.
				for (Tweet tweet : tweets) {
					//System.out.println(tweet.getFromUser() + " - " + tweet.getText());
					rs = stmt.executeQuery("SELECT * FROM `tweets` WHERE `id` = " + tweet.getId());
					
					if (!rs.next()) {
						//This is a new tweet, save it.
					      pstmt = conn.prepareStatement("insert into `tweets` "
									+ "(id, coordinates, created_at, text, " 
									+ "in_reply_to_user_id, in_reply_to_screen_name, "
									+ "user_screen_name, user_location) " 
									+ "values(?, ?, ?, ?, ?, ?, ?, ?) ");
					      pstmt.setString(1, tweet.getId()+"");
					      pstmt.setString(2, tweet.getGeoLocation()+"");
					      pstmt.setString(3, tweet.getCreatedAt()+"");
					      pstmt.setString(4, tweet.getText());
					      pstmt.setString(5, tweet.getToUserId()+"");
					      pstmt.setString(6, tweet.getToUser());
					      pstmt.setString(7, tweet.getFromUser());
					      pstmt.setString(8, tweet.getLocation());
					      pstmt.executeUpdate();
					}
				}
			} catch (SQLException e) {
				System.out.println("Error encountered while querying the database");
				System.out.println(e.getMessage());
			} 
			
			finally {
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
	}
	
	protected List<Tweet> checkTimeline(Connection conn) {
		List<Tweet> tweets = null;
		Twitter t = new TwitterFactory().getInstance();
		try {
			QueryResult result = t.search(new Query("@RouteMe1"));
			tweets = result.getTweets();
		} catch (TwitterException e) {
			System.out.println("Error searching Twitter");
			System.out.println(e.getMessage());
		}
		return tweets;
	}
	
	/**
	 * @param args
	 */
	public static void main(String[] args) {
		System.out.println("=============================================");
		System.out.println("Starting RouteMe TimelineServer");
		System.out.println("=============================================");
		
		TimelineServer server = new TimelineServer();
		server.start();
	}

}
