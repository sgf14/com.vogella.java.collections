<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>sgfdb</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
		
	</head>
	<body>
			<header>
<!-- 			replace with search-- put this in footer -->
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
		<!-- note that we use a dash here for the CSS class name that contains multiple words, 
		that is a CSS convention -->
			<section class="comment-input">
				<p>Add your Comment:</p>
				<input type="text"><button>+</button>
			</section>
		
			<section class="comments">
				<p>This is the first comment!</p>
				<p>This is the second comment</p>
				<p>Here is another one</p>
				<p>One more</p>
			</section>
			<img src="images/woods.PNG" alt = "mtn pic">
		</main>
		
		<footer>
			<h3>This work is released into the public domain</h3>
		</footer>
		
		<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
		<script src="webroot/js/app.js"></script>
	</body>
</html>

