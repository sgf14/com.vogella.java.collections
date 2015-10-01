<?php
// copy of php/header.php file with html incorporated w/i file-  part of refactor tab issue

//file ensures all pages in the project has access to the same set of features.  see lpmj pg 607.
//using to call html tag files for now.  will see how this works calling php/db files
//will use thsi for login calls once setup- have basic template below from lpmj; commented out for now
session_start();

require_once 'functions.php'; //generic app functions
//require_once 'html/headTag.html';
echo <<<_END
	<head>
		<meta charset="ISO-8859-1">
		<title>sgfdb</title>
		<link href="style/reset.css" rel="stylesheet" type="text/css" >
		<link href="style/style.css" rel="stylesheet" type="text/css" >
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<!-- 		<script src='http://code.jquery.com/jquery-2.0.3.min.js'></script> -->
<!-- 		<script src='webroot/js/app.js'></script> -->
	</head>
_END;

//login call; lpmj 608.  activate security after tabs setup
/* $userStr = '(Guest)';

if (isset($_SESSION['user'])) {
$user = $_SESSION['user'];
$loggedIn = TRUE;
$userStr = ' ($user)';
} else {
$loggedIn = FALSE;
} */

//html links; wrap an if/then conditional around this for meeting login criteria- see pg 608 of lpmj
echo 	"<div class='appname'>$appName</div>";
// 		.	"<script src='webroot/js/app.js></script>";

//require_once 'html/bodyHeaderTag.html';
echo <<<_END
<header>
<!-- 			replace with search- put this in footer -->
			<div class="container">
<!-- 				<div class="title">
					<h1>sgfdb</h1>
				</div> -->
				<nav>
				<a href="#">Sign Up!</a> |
				<a href="/html/faq.html">FAQ</a> |
				<a href="#">Support</a>
				</nav>
			</div>
</header>
_END;

//login conditional
/* 		if ($loggedIn)
 echo	"<br><ul class='menu'>"
.	"<li><a href='xx.php'>Main Page</a></li>"
.	"<li><a href='xx.php'>XX</a></li></ul><br>";
else  */

// require_once 'html/bodyMainTag.html';
echo <<<_END
<main>
		<div class="container">
				<div class = "tabs">
					<a href = "../index.php"><span class="active">Main</span></a>
					<a href = "php/sql/historyTab.php"><span>History</span></a>
					<a href = ""><span>Etymology</span></a>
					<a href = ""><span>Math/Sci</span></a>
					<a href = ""><span>Coding</span></a>
				</div>
				<div class = "content">

				</div>
		</div>

</main>
_END;

// require_once 'html/bodyFooterTag.html';
echo <<<_END
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
_END;

?>