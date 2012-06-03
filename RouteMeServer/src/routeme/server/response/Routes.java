package routeme.server.response;
import org.apache.commons.math3.geometry.euclidean.twod.*;

import routeme.server.DatabaseManager;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Dictionary;
import java.util.HashMap;

public class Routes {
	protected DatabaseManager db;
	
	public void Routes() {
		this.db = new DatabaseManager()
	}
	public Vector2D GetClosestStop(Vector2D destinationVector){
		//Get all the stops from the database
		Statement stmt = null;
		ResultSet rs = null;
		Connection conn = db.getConnection();
		HashMap<Stops, Double> stops;
		try {
			stmt = conn.createStatement();
			rs = stmt.executeQuery("select id, lat, lon from `stops`");
			
			stops = new HashMap<Stops, Double>();
			//Dump all the stops and the distance between them and the destination into a 
			//HashMap
			while(rs.next()) {
				Stops aStop = new Stops(
						rs.getString("id"),
						new Vector2D(
								Double.parseDouble(rs.getString("lat")),
								Double.parseDouble(rs.getString("long"))
						)
				);
				
				stops.put(aStop, Vector2D.distance(
						destinationVector, aStop.getVector())
				);
			}			
		} 
		catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		finally {

			try {
			rs.close();
			stmt.close();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}


		//Find the closest stop to the destination.
		
		return closestStop;
	}
}