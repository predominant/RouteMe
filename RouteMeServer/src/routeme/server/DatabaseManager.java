package routeme.server;

import java.io.FileInputStream;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.Properties;

import routeme.server.response.ResponseServer;

public class DatabaseManager {
	
	protected Properties properties;
	
	public DatabaseManager() {
		try {
			System.out.println("Resolving MySQL driver");
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			System.out.println("Unable to load MySQL Driver");
			System.exit(1);
		}
		
		this.properties = this.getProperties();
	}
	
	public Connection getConnection() {
		Connection conn = null;
		Properties prop = this.properties;

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
	
	protected Properties getProperties() {
		Properties prop = new Properties();
		
		try {
			prop.load(new FileInputStream("database.properties"));
		} catch (IOException e) {
			System.out.println("Failed to load database.properties file");
			System.exit(2);
		}
		return prop;
	}

}
