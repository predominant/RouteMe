$(function() {
	$('#map').css({
		width: window.innerWidth - 450,
		height: window.innerHeight - 180
	});
	initialize();
});

var map;
var places = {
	canberra: {
		lat: -35.2828,
		lon: 149.1314
	}
};

function initialize() {
	var myLatlng = new google.maps.LatLng(places.canberra.lat, places.canberra.lon);
	var myOptions = {
		center: myLatlng,
		zoom: 12,
		streetViewControl: false,
		mapTypeControl: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById('map'), myOptions);
}
