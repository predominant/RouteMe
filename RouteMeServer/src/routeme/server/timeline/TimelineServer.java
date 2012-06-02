package routeme.server.timeline;

import java.sql.Connection;
import java.util.List;

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
			
			List<Tweet> tweets = this.checkTimeline(conn);
			for (Tweet tweet : tweets) {
				System.out.println(tweet.getFromUser() + " - " + tweet.getText());
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
