package routeme.server.response;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import routeme.server.DatabaseManager;
import twitter4j.Tweet;

public class ResponseServer {

	protected DatabaseManager db;
	
	public ResponseServer() {
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
			
			Tweet[] tweets = this.getUnprocessedTweets(conn);
		}
	}
	
	protected Tweet[] getUnprocessedTweets(Connection conn) {
		System.out.println("Polling for Tweets");
		Statement stmt = null;
		ResultSet rs = null;
		boolean success = false;

		try {
			stmt = conn.createStatement();
			rs = stmt.executeQuery("SELECT * FROM `tweets` WHERE `processed` = 0");
			while (rs.next()) {
				this.processTweet("Test Tweet");
			}
			return null;
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
		return null;
	}
	
	protected boolean processTweet(String tweet) {
		System.out.println("Processing tweet: " + tweet);
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
