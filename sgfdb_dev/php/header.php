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
						var tabs = [];
						tabs.push({
							"name" : "Main",
							"content" : function () {
								var $content;
								$content = $("<ul>");
								<?php 
								echo "Main stuff";
								
								?>
							
							return $content;
							}
						});

						tabs.push({
							"name" : "History",
							"content" : function () {
								var $content;
								$content = $("<ul>");
								<?php 
								echo "<h3>History</h3>";

								$result = queryMysql("SELECT title FROM history ORDER BY history_id");
								$num = $result->num_rows;

								for ($j = 0; $j < $num ; ++$j) {
								$row = $result->fetch_array(MYSQLI_ASSOC);
								echo 'Title: ' . $row['title'] . '<br>';

								}
								
								?>
							
							return $content;
							}
						});

						tabs.push({
							"name" : "Etymology",
							"content" : function () {
								var $content;
								$content = $("<ul>");
								<?php 
								echo "Etymology stuff";
								
								?>
							
							return $content;
							}

						});
					};

					//loop over tabs array
					tabs.forEach (function (tab) {
						var $aElement = $("<a>").attr("href",""),
							$spanElement = $("<span>").text(tab.name);

						$aElement.append($spanElement);

						$spanElement.on("click", function () {
							var $content;

							$(".tabs a span").removeClass("active");
							$spanElement.addClass("active");
							$("main .content").empty();

							//get content
							$content = tab.content();

							$("main .content").append($content);
							return false;
							});
					});


</script>