package routeme.server;
import twitter4j.Status;
import twitter4j.StatusAdapter;
import twitter4j.StatusDeletionNotice;
import twitter4j.StatusListener;
import twitter4j.TwitterException;
import twitter4j.TwitterStream;
import twitter4j.TwitterStreamFactory;

/**
* <p>This is a code example of Twitter4J Streaming API - sample method support.<br>
* Usage: java twitter4j.examples.PrintSampleStream<br>
* </p>
*
* @author Yusuke Yamamoto - yusuke at mac.com
*/
public class PrintSampleStream extends StatusAdapter {
/**
* Main entry of this application.
*
* @param args
*/
    public static void main(String[] args) throws TwitterException {
        TwitterStream twitterStream = new TwitterStreamFactory().getInstance();
        
        StatusListener listener = new StatusListener() {
        	public void onStatus(Status status) {
                System.out.println("@" + status.getUser().getScreenName() + " - " + status.getText());
            }

            public void onDeletionNotice(StatusDeletionNotice statusDeletionNotice) {
                System.out.println("Got a status deletion notice id:" + statusDeletionNotice.getStatusId());
            }

            public void onTrackLimitationNotice(int numberOfLimitedStatuses) {
                System.out.println("Got track limitation notice:" + numberOfLimitedStatuses);
            }

            public void onScrubGeo(long userId, long upToStatusId) {
                System.out.println("Got scrub_geo event userId:" + userId + " upToStatusId:" + upToStatusId);
            }

            public void onException(Exception ex) {
                ex.printStackTrace();
            }
        };
        
        twitterStream.addListener(listener);
        twitterStream.sample();
    }
}