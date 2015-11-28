<?php
// need to mod index.php file to call this file

session_start();

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
 <!-- 	10/11/15-	you are missing the connection in js- see below- back to these DOM 'tabs'div
 		see pg 252 of webapp book- working on this.  I think I havent read far enough in that chapter yet 
 		going back to pg 136 to do this the longer way w/ header3.php file
 		-->
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
	<!-- 				below breaks the bottom right footer into two columns.  had to get help on this.  chap 4 of books website.
					note ul tags outside the left and right div tags and there is no overflow in style.css. see footer section of 
					css.
	 -->				
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
				
<!-- 			</div>
<!-- 			for ajax call to flicker -->
<!--			<div class="photos"> -->
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
				var $content = $("<span>");
				// things are going wrong here need - to find concatenate symbol for js, tried plus and period- no luck
				$content.append(
				<?php
// not getting the php to work- all else around this ok- can call php ok, 
// but not contents- see firebug console error msg.  working on it ... 
// 				echo "<ul><li>History</li></ul>";
/* 
  				$result = queryMysql("SELECT title FROM history ORDER BY history_id");
 				$num = $result->num_rows;

 				for ($j = 0; $j < $num ; ++$j) {
 				$row = $result->fetch_array(MYSQLI_ASSOC);
 				echo 'Title: ' . $row['title'] . '<br>';
 				}
 */				
 				?>

				);
				$content.append("test trsrt</span>"); //attempting to combine these three items
				$("main .content").append($content);
			} else if ($element.parent().is(":nth-child(2)")){
				var $content = $("<span>test123</span>");
				$content.append("<ul>");
				$content.append("<li>first</li>");
						
				$("main .content").append($content);
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
$(document).ready(main);				
</script>