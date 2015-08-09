$(document).ready(function() {
	
	// Contact Maps
	$("#maps").gmap3({
		map: {
			options: {
			  center: [-32.7879528,-71.1991765],
			  zoom: 14,
			  scrollwheel: false
			}  
		 }
    /*,
		marker:{
			latLng: [-32.7921717,-71.1928978],
			options: {
			 icon: new google.maps.MarkerImage(
			   "https://dl.dropboxusercontent.com/u/29545616/Preview/location.png",
			   new google.maps.Size(48, 48, "px", "px")
			 )
			}
		 }*/
	});
	
	//Slider
	$("#slider").carousel({
		interval: 5000
	});
	
	$("#testi").carousel({
		interval: 4000
	});
	
	$("#itemsingle").carousel({
		interval: false
	});

});
