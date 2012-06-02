package routeme.server.response;

import java.io.FileInputStream;
import java.io.IOException;
import java.util.Properties;

public class ResponseServer {

	public ResponseServer() {
	}
	
	public void start(Properties prop) {
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			System.out.println("Unable to load MySQL Driver");
			System.exit(1);
		}
	}
	
	protected void getConnection() {
		
	}
	
	/**
	 * @param args
	 */
	public static void main(String[] args) {
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
