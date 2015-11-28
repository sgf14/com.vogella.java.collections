var main = function () {
	"use strict";
	var toDos = [
	             "Finish coding js",
	             "Answer emails",
	             "Get Groceries",
	             "make up to dos",
	             "do stuff",
	             "etc"
	             ];
	
	$(".tabs a span").toArray().forEach(function (element) {
			$(element).on("click", function() {
				var $element = $(element),
					$content;
				
					$(".tabs a span").removeClass("active");
					$(element).addClass("active");
					$("main .content").empty();
					
					if ($element.parent().is(":nth-child(1)")) {
						var $content = $("<ul>");
						// this organizes the list 'backwards' from last to first. have to be careful with this decrement for loop 
						// operators- can get into infinite loops
						var n;
						for (n = toDos.length - 1; n >= 0; n--) { //undefined is first entry so had to use .length - 1
							$content.append($("<li>" + toDos[n] + "</li>"));
						}
						$("main .content").append($content);
					} else if ($element.parent().is(":nth-child(2)")){
						var $content = $("<ul>");
						//this is a little easier  ordered first to last
						toDos.forEach(function (todo) {
							$content.append($("<li>").text(todo));
						});
						$("main .content").append($content);
					} else if ($element.parent().is(":nth-child(3)")){
						var $input = $("<input>"),
						$button = $("<button>").text("+"),
						//add div tag in order to place text field and button
						$content = $("<div>").append($input, $button);
						
						//event listener for button
						$button.on("click" , function () {
							if ($input.val() !== "") {
								toDos.push($input.val());
								$input.val("");
							}
						});
						//add stuff to main/content
						$("main .content").append($content);
						//console.log("third tab clicked");
					}
					
					return false;
					
			});
		});
	//when the page loads this ensures one the first tab is opened up by default; otherwise nothing is opened 
	// until one of the tabs is clicked
	$(".tabs a:first-child span").trigger("click");
};

$(document).ready(main);

/*	var main = function () {
	"use strict";
	var $histCont = "History";

	
	$(".tabs a span").toArray().forEach( function (element) {
		$(element).on("click", function () {
			var $element = $(element),
			$content;
			
			$(".tabs a span").removeClass("active");
			$element.addClass("active");
			$("main .content").empty();

			if ($element.parent().is(":nth-child(1)")) {
				var $content = $("<ul>
						<li>Get groceries</li>
						<li>Answer emails</li>
						<li>Add ToDos</li>
					</ul>");
				//$content.append($("<li>").text($histCont));
				$("main .content").append($content);
			} else if ($element.parent().is(":nth-child(2)")) {
					console.log("History clicked");
			}	
			return false  //so browser doesnt follow link- not needed in this case
			});
	});
		
	$(".tabs a:first-child span").trigger("click");
};
$(document).ready(main);
*/
	