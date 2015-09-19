/*there are no 'AJAX' files.  JSON -JavaScript Object Notation (Javascript Functions) is the application in the form of .js files
that utilizes 'AJAX' to update webpage. information/displays without reloading the page.  
AJAX= Asynchornous Javascript and XML
See web app book pg 155 for definition and 160 for practical example- which is used below with website Flickr as an example
**history **
the common data-interchange format between computers/servers that proceeded JSON was XML- which is still in widespread use-
however a major move has been made to JSON since AJAX was invented

in the case below AJAX is passing content to your webpage through a publicly available portal on Flick servers.

you need this file and a call to the file from index html or similar file called from index.
used this as initial example and will build a more practical example as dev proceeds.

activate index.php footer 'photos' tag and call to this file in js section at bottom to get this to work.
github webappbook chap 5 is also a reference (this was copied from git hub) to get the example up and working.
 */

var main = function () {
	"use strict";
	
	var url = "http://api.flickr.com/services/feeds/photos_public.gne?tags=dogs&format=json&jsoncallback=?";
		
	$.getJSON(url,function(flickrResponse) {
		flickrResponse.items.forEach(function (photo) {
			//create new JQuery element to hold the image
			var $img = $("<img>").hide();  //note the hide part is only used in conjunction with teh fadeInn later; not required for functionality
			
			//set the attribute to the url contained in the response
			$img.attr("src", photo.media.m);
			//attach the img tag to the main
			$("footer .photos").append($img);
			//this is just some aesthetics and formatting 
			$img.fadeIn();
			//console.log(photo.media.m);
		});
		
	});
};

$(document).ready(main);