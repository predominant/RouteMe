package routeme.tests;

import java.util.Scanner;

import org.apache.commons.math3.geometry.euclidean.twod.Vector2D;

import routeme.server.response.Routes;
import routeme.server.response.Stops;

public class RoutesTest {

	public static void main(String args[]) {
		Routes route = new Routes();
		/*lat: -35.2747,
        lon: 149.0738*/
		Vector2D IAmHere = new Vector2D(-35.2747,149.0738);
		Stops closestStop= route.GetClosestStop(IAmHere);
		System.out.println("Your stop is:\r\n" + closestStop.getVector());
		Scanner scanner = new Scanner(System.in);
		scanner.next();
	}
	
}
