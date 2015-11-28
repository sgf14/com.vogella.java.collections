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
 		<div class = "content"> <!-- change div from 'class' to 'id' to get script immediately below to work -->
<!-- 
		<script>
		// this does actually work- but cannot yet get AJAX to work in tab content- see script below
		//function ajaxHistory() {
            params = "conditions"  //dont actually use params yet in WHERE clause, placeholder for later
            request = new ajaxRequest()
            // calls the server file
            request.open("POST", "php/historyTab2.php", true)
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            request.setRequestHeader("Content-length", params.length)
            request.setRequestHeader("Connection", "close")

            //'function' style below is called an inline, unnamed function.  if you pulled this out as a 
            //separate ajax response callback file- similar to crossBrowserAJAXFunction.js, you would name the 
            //function and then reference the onreadystatechange property
            request.onreadystatechange = function () {
                //using this. allows function to copied and reused for other applications
                // state 4 means AJAX request completed
                if (this.readyState == 4) {
                    //status 200 means AJAX request completed successfully
                    if (this.status == 200) {
                        if (this.responseText != null) {
                            document.getElementById('content').innerHTML = this.responseText //note get byID- need to change div from Class to ID
                            
                        }
                        else alert("Ajax error: No data recieved")
                    }
                    else alert("Ajax error: " + this.statusText)
                }
            }

            //initiates the actual AJAX request- code above is the setup
            request.send(params)
			//}

            function ajaxRequest() {
                try {
                    // all browsers except IE
                    var request = new XMLHttpRequest()
                }
                catch (e1) {
                    try {
                        //IE 6+
                        request = new ActiveXObject("Msxml2.XMLHTTP")
                        }
                    catch (e2) {
                        try {
                            //IE 5
                            request = new ActiveXObject("Microsoft.XMLHTTP")
                            }
                        catch (e3) {
                            //no ajax support in browser
                            request = false
                            }
                    }
                }
                return request
            }

		</script>
 -->		

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
var main = function () {  //add (toDoObjects) as called method for AJAX main to work- see document. call below- remove once individual tabs are working
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
				//this AJAX (jq [$.get] method) works from Main- trying to call within tab
				//var $content = (toDoObjects); //(toDoObjects) has to be called in main method- above -for this to work
				
				//this one- inside the tab- doesnt work; trying to figure out
				/*
				var content2 = (function () {
					$.get("php/historyTab2.php", function (toDoObjects) {
					var $content = $(toDoObjects);
					});
				});
				*/
								
				 //$("main .content").append($content);
				
			} else if ($element.parent().is(":nth-child(2)")){
				etymologyAjaxCall();
				/*var $content = $("<span>test123</span>");
				$content.append("<ul>");
				$content.append("<li>first</li>");
						
				$("main .content").append($content);
				*/
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
// original- turn this on to get different tabs to function (??) still figuring this out, comment out otherwise- cannot have two $(documents).ready... calls
// $(document).ready(main);

//ajax ver- turn this on for main to function- as noted above; comment out to test different tabs.  see pg 164 WAB

var historyAjaxCall = function(data) {
	var $content = (data);
	$("main .content").append($content);
};

var etymologyAjaxCall = function(data) {
	var $content = (data);
	$("main .content").append($content);
};

$(document).ready(function () {
	$.get("php/historyTab2.php", historyAjaxCall); 
	$.get("php/etymologyTab.php", etymologyAjaxCall); // {
		// call main w to-dos as object
		main();
	//});
});


//normally this would be in a separate script file- in this file for testing
/*
var ajaxHistory = function () {
    params = "conditions"
    request = new ajaxRequest()
    // calls the server file
    request.open("POST", "php/historyTab2.php", true)
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    request.setRequestHeader("Content-length", params.length)
    request.setRequestHeader("Connection", "close")

    //'function' style below is called an inline, unnamed function.  if you pulled this out as a 
    //separate ajax response callback file- similar to crossBrowserAJAXFunction.js, you would name the 
    //function and then reference the onreadystatechange property
    request.onreadystatechange = function () {
        //using this. allows function to copied and reused for other applications
        // state 4 means AJAX request completed
        if (this.readyState == 4) {
            //status 200 means AJAX request completed successfully
            if (this.status == 200) {
                if (this.responseText != null) {
                    document.getElementById('content').innerHTML = this.responseText //note get by'ID', not 'Class'- in related div- there is no getElementByClass
                }
                else alert("Ajax error: No data recieved")
            }
            else alert("Ajax error: " + this.statusText)
        }
    }

    //initiates the actual AJAX request- code above is the setup
    request.send(params)
	};

	// this is a ajax function that can be reused as a libary item.  would generally separate this out 
    //into a file and call it as neccessary
    var ajaxRequest function () {
        try {
            // all browsers except IE
            var request = new XMLHttpRequest()
        }
        catch (e1) {
            try {
                //IE 6+
                request = new ActiveXObject("Msxml2.XMLHTTP")
                }
            catch (e2) {
                try {
                    //IE 5
                    request = new ActiveXObject("Microsoft.XMLHTTP")
                    }
                catch (e3) {
                    //no ajax support in browser
                    request = false
                    }
            }
        }
        return request
    };

*/
</script>