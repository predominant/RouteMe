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
	
	public Routes() {
		this.db = new DatabaseManager();
	}
	public Stops GetClosestStop(Vector2D destinationVector){
		//Get all the stops from the database
		Statement stmt = null;
		ResultSet rs = null;
		Connection conn = this.db.getConnection();
		Stops closestStop = null;
		try {
			stmt = conn.createStatement();
			rs = stmt.executeQuery("select id, lat, lon from `stops`");
			
			//Dump all the stops and the distance between them and the destination into a 
			//HashMap
			while(rs.next()) {
				Stops aStop = new Stops(
						rs.getString("id"),
						new Vector2D(
								Double.parseDouble(rs.getString("lat")),
								Double.parseDouble(rs.getString("lon"))
						)
				);
				
				
				if(closestStop == null) {
					//should only be called the first loop
					closestStop = aStop;
				}
				else {
					//If aStop is closer to the destination, set it to be the 
					//closest stop
					if(Vector2D.distance(aStop.getVector(), destinationVector) <
					Vector2D.distance(closestStop.getVector(), destinationVector))
					{
						closestStop = aStop;
					}
				}
			}
			return closestStop;
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