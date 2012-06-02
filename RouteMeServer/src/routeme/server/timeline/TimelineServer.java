package routeme.server.timeline;

import java.sql.Connection;

import routeme.server.DatabaseManager;
import routeme.server.response.ResponseServer;
import twitter4j.Tweet;

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
			
			Tweet[] tweets = this.checkTimeline(conn);
		}
	}
	
	protected Tweet[] checkTimeline(Connection conn) {
		return new Tweet[]{};
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
