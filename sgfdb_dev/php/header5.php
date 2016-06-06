<?php
// need to mod index.php file to call this file

//06/05/16- had to disable sesseion_start() temporarily.  error appears in prod.  need to figure out how to fix
//session_start();

require_once 'functions.php'; //generic app functions

echo 	"<div class='appname'>$appName</div>";
?>

<header>
<!-- 			replace with search- put this in footer -->
			<div class="container">
				<nav>
				<a href="#">Sign Up!</a> |
				<a href="html/faq.html">FAQ</a> |
				<a href="#">Support</a>
				</nav>
			</div>
</header>

<main>
	<div class="container">
 		<div class = "tabs">
 <!-- 	 pg 252 of webapp book 		-->
			<a href = ""><span class="active">Main</span></a>
			<a href = ""><span>History</span></a>
			<a href = ""><span>Etymology</span></a>
			<a href = ""><span>Math/Sci</span></a>
			<a href = ""><span>Coding</span></a> 

		</div>	
 		<div class = "content"> 
		</div>			
	</div>
</main>

<footer>
	<div class="container">
		<div class="contact">
			<h5>Contact Us</h5>
			<p class="company">sgfdb</p>
			<p>123 Fake Street</p>
			<p>Springfield, KY 76801</p>
		</div>
			
		<div class="sitemap">
			<h5>Sitemap</h5>
	 			<ul>
					<div class="sitemapLeft">
						<li><a href="#">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Privacy</a></li>
					</div> 
					
					<div class="sitemapRight">
						<li><a href="#">Support</a></li>
						<li><a href="faq.html">FAQ</a></li>
						<li><a href="#">Careers</a></li>
					</div>
				</ul>
			</div>
		</div>
	</footer>

<script src='http://code.jquery.com/jquery-2.0.3.min.js'></script>
<script>
var main = function () {  
"use strict";
//tab functionality- pg 137 of web app book(WAB)
	$(".tabs a span").toArray().forEach(function (element) {
		//create a click handler for this element
		$(element).on("click", function() {
			var $element = $(element);
			$(".tabs a span").removeClass("active");
			$(element).addClass("active");
			$("main .content").empty();
//tab content
			if ($element.parent().is(":nth-child(1)")) {
				historyAjaxCall();
								
			} else if ($element.parent().is(":nth-child(2)")){
				etymologyAjaxCall();
				
			} else if ($element.parent().is(":nth-child(3)")){
				$content = $("<div>test456</div>");
				$("main .content").append($content);
			}
//return false or browser will follow the link- pg 136 in WAB
			return false;
		});
	});
	
	$(".tabs a:first-child span").trigger("click");

    
};

var historyAjaxCall = function(data) {
	var $content = (data);
	$("main .content").append($content);
};

var etymologyAjaxCall = function(data) {
	var $content = (data);
	$("main .content").append($content);
};

//original doc call- for ref
//$(document).ready(main);

//ajax ver-   see pg 164 WAB
/*
 *  pg 440 of Sams AngJs book AJAX- problem here is that both hist and etm show up in tab contents 1 and 3 (4and 5 arent defined)
 in main above- 2 doestn show anything.  the calls themselves bring back the right data, still working on this
 there is a tab example pg 445, working to see if I can get something similar working w/ php calls
 */
	
	
$(document).ready(function () {
	$.get("php/historyTab2.php", historyAjaxCall); 
	$.get("php/etymologyTab.php", etymologyAjaxCall); 
	main();
	
});
</script>
