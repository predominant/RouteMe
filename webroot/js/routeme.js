var self = null;

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
		self = this;
		var myLatlng = new google.maps.LatLng(this.places.canberra.lat, this.places.canberra.lon);
		var myOptions = {
			center: myLatlng,
			zoom: 12,
			streetViewControl: false,
			mapTypeControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		this.map = new google.maps.Map(document.getElementById(this.mapId), myOptions);
		google.maps.event.addListener(this.map, 'tilesloaded', this.tilesLoaded)
	},

	tilesLoaded: function() {
		self.busStops();
	},

	busStops: function() {
		var stopIcon = self.stopIcon();
		$.getJSON('/routes/stops/2-10181.json', function(data) {
			$.each(data, function(k, v) {
				var m = new google.maps.Marker({
					map: self.map,
					draggable: false,
					icon: stopIcon,
					position: new google.maps.LatLng(v.Stop.lat, v.Stop.lon),
					visible: true
				});
			});
		});
	},

	stopIcon: function() {
		return '/img/gmarker_busstop.png';
	}
};


$(function() {
	$('#map').css({
		width: window.innerWidth - 450,
		height: window.innerHeight - 180
	});
	RouteMe.initialize();
});

