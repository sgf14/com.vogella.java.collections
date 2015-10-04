<?php
echo <<<_END
<main>
		<div class="container">
				<div class = "tabs">
					<a href = ""><span class="active">Main</span></a>
					<a href = ""><span>History</span></a>
					<a href = ""><span>Etymology</span></a>
					<a href = ""><span>Math/Sci</span></a>
					<a href = ""><span>Coding</span></a>

					<script src='http://code.jquery.com/jquery-2.0.3.min.js'></script>
<!--					<script src='webroot/js/app.js'></script> -->
					<script>
						var main = function () {
						"use strict";


	$(".tabs a span").toArray().forEach(function (element) {
			$(element).on("click", function() {
				var jQelement = $(element);
					
					$(".tabs a span").removeClass("active");
					$(element).addClass("active");
					$("main .content").empty();
			
					if (jQelement.parent().is(":nth-child(1)")) {
					$("tab .content").append($contentHist);
_END;
