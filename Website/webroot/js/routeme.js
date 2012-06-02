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

	currentPosition: {
		lat: -35.2747,
		lon: 149.0738
	},

	initialize: function() {
		self = this;
		var myLatlng = new google.maps.LatLng(self.currentPosition.lat, self.currentPosition.lon);
		var myOptions = {
			center: myLatlng,
			zoom: 12,
			streetViewControl: false,
			mapTypeControl: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		self.map = new google.maps.Map(document.getElementById(self.mapId), myOptions);
		google.maps.event.addListener(self.map, 'tilesloaded', self.tilesLoaded)
	},

	tilesLoaded: function() {
		//self.busStops();
	},

	busStops: function(routeId) {
		var stopIcon = self.stopIcon();
		$.getJSON('/routes/stops/' + routeId + '.json', function(data) {
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

