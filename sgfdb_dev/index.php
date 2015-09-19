<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>sgfdb</title>
		<link href="style/reset.css" rel="stylesheet" type="text/css" >
		<link href="style/style.css" rel="stylesheet" type="text/css" >
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	</head>
	<body>
			<header>
<!-- 			replace with search- put this in footer -->
			<div class="container">
				<div class="title">
					<h1>sgfdb</h1>
				</div>
				<nav>
				<a href="#">Sign Up!</a> |
				<a href="/html/faq.html">FAQ</a> |
				<a href="#">Support</a>
				</nav>
			</div>
		</header>
	
		<main>
		<?php
		// changes over time- this is meant as the single entrance into php functions
		// on the server need to designate the whole path- followiugn variable is used as a single place to house dir info
		//note that all other path references need to include any path info beyond this (ie incl all subfolders)
		
		//for dev testing. need to swap login.php file for localhost db and baseServerpath var below
		//xmapp also needs to be mysql prot 3307, not standard 3306- can edit config file on that line
		
			//$baseServerPath = '/home/sgfdbc5/public_html/'; //for prod- incorporate into functions
			$baseServerPath = ''; //for dev- local host
 			require_once $baseServerPath . 'php/mysql_init.php';
		?>
		
			<div class="container">
				<div class = "tabs">
					<a href = ""><span class="active">Newest</span></a>
					<a href = ""><span>Oldest</span></a>
					<a href = ""><span>Tags</span></a>
					<a href = ""><span>Add</span></a>
				</div>
				<div class = "content">

				</div>				
			</div>
			<img src="images/woods.PNG" alt = "mtn pic">
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
		
		<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
		<script src="webroot/js/app.js"></script>
<!-- 		part of ajax ajax call -->
<!-- 		<script src="ajax/flickr.js"></script> -->
	</body>
</html>

