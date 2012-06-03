package routeme.server.response;

import org.apache.commons.math3.geometry.euclidean.twod.Vector2D;

public class Stops {
	private Vector2D vector;
	private String id;
	
	public Stops(String id, Vector2D vector) {
		this.id = id;
		this.vector = vector;
	}
	public Vector2D getVector() {
		return vector;
	}

	public void setVector(Vector2D vector) {
		this.vector = vector;
	}

	public String getId() {
		return id;
	}

	public void setId(String id) {
		this.id = id;
	}

}
