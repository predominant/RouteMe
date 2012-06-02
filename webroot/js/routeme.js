var RouteMe = {

	map: null,
	mapId: 'map',
	places: {
		canberra: {
			lat: -35.2828,
			lon: 149.1314
		}
	},

	initialize: function() {
		var myLatlng = new google.maps.LatLng(this.places.canberra.lat, this.places.canberra.lon);
		var myOptions = {
			center: myLatlng,
			zoom: 12,
			streetViewControl: false,
			mapTypeControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		this.map = new google.maps.Map(document.getElementById(this.mapId), myOptions);
		this.map.addEventListener('tilesloaded', this.tilesLoaded)
	},

	tilesLoaded: function() {
		console.log("Tiles loaded");
	}
};


$(function() {
	$('#map').css({
		width: window.innerWidth - 450,
		height: window.innerHeight - 180
	});
	RouteMe.initialize();
});

