package routeme.server.response;

import java.io.FileInputStream;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.Properties;

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
