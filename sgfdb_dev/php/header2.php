<!-- need to chage index file to call this

this is a test file to make sure the original amazeriffic tabs functions work before 
adding db functionality to tabs.  worked successfully 10/04- moving on to header3.php as next step -->
<?php
//  session_start();

require_once 'functions.php'; //generic app functions

echo 	"<div class='appname'>$appName</div>";
?>


<header>
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
				<a href = ""><span class="active">Main</span></a>
				<a href = ""><span>History</span></a>
				<a href = ""><span>Etymology</span></a>
				<a href = ""><span>Math/Sci</span></a>
				<a href = ""><span>Coding</span></a>
			</div>
			<div class = "content">
<!-- 	test			<span>stuff</span> -->
<!--			<ul>
						<li>Get groceries</li>
						<li>Answer emails</li>
						<li>Add ToDos</li>
					</ul>
-->
<!-- 			stuff goes here -->
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
				
	</div>
</footer>

		<script src='http://code.jquery.com/jquery-2.0.3.min.js'></script>
		<script src='app.js'></script>

