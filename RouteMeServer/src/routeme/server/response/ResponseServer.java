package routeme.server.response;

import java.io.FileInputStream;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Properties;

import twitter4j.Tweet;

public class ResponseServer {

	public ResponseServer() {
		try {
			System.out.println("Resolving MySQL driver");
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			System.out.println("Unable to load MySQL Driver");
			System.exit(1);
		}
	}
	
	public void start(Properties prop) {
		Connection conn = this.getConnection(prop);
		
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
	
	protected Connection getConnection(Properties prop) {
		Connection conn = null;
		
		try {
			System.out.println("Attempting MySQL connection");
			conn = DriverManager.getConnection(
					"jdbc:mysql://" +
					prop.getProperty("hostname") + "/" +
					prop.getProperty("database") + "?" +
					"user=" + prop.getProperty("username") + "&" +
					"password=" + prop.getProperty("password"));
			
		} catch (SQLException e) {
			System.out.println("Failed to connect to MySQL database");
			System.exit(3);
		}
		
		return conn;
	}
	
	/**
	 * @param args
	 */
	public static void main(String[] args) {
		System.out.println("=============================================");
		System.out.println("Starting RouteMe ResponseServer");
		System.out.println("=============================================");
		
		Properties prop = new Properties();
		
		try {
			prop.load(new FileInputStream("database.properties"));
			ResponseServer server = new ResponseServer();
			server.start(prop);
		} catch (IOException e) {
			System.out.println("Failed to load database.properties file");
			System.exit(2);
		}
		
	}
}
