//copied from amazeriffic chap 5/Json
//original app.js file from amazeriffic prior to php tab change attempts

var main = function (toDoObjects) {
	"use strict";
	
	// see pg 165 of book, this new todO VAR just Redirected from an array in chap four to referenceing the json list- see toDoObjects in main 
	//function and document ready changes at bottom - no other part of code changes
	var toDos = toDoObjects.map(function (toDo) {
		// we'll just return the description of this toDoObject
		return toDo.description
	});
	
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
						var tags = [];
						
						//iterate over all the to dos
						toDoObjects.forEach(function (toDo) {
							//iterate over each tag in the to do item
							toDo.tags.forEach(function (tag) {
								//make sure the tag is not already in the array; if not push into array
								if (tags.indexOf(tag) === -1) {
									tags.push(tag);
								}
							});
						});
						 
						var tagObjects = tags.map(function (tag) {
							var toDosWithTag = [];
							toDoObjects.forEach(function (toDo) {
								if(toDo.tags.indexOf(tag) !== -1) {
									toDosWithTag.push(toDo.description);
								}
							});
							return { "name" : tag , "toDos" : toDosWithTag };
						});
						//note-this var changed from organizedByTag to tagObjects upon insert of working tag tab- not noted in book, but in gitHub for book	                      						
						tagObjects.forEach(function (tag) {
							var $tagName = $("<h3>").text(tag.name),
							$content = $("<ul>");
							
							tag.toDos.forEach(function (description) {
								var $li = $("<li>").text(description);
								$content.append($li);
							});
							
							$("main .content").append($tagName);
							$("main .content").append($content);
						});
					} else if ($element.parent().is(":nth-child(4)")){
						var $input = $("<input>").addClass("description"),
						$inputLabel = $("<p>").text("Description"),
						$tagInput = $("<input>").addClass("tags"),
						$tagLabel = $("<p>").text("Tags: "),
						$button = $("<button>").text("+"),
						//add div tag in order to place text field and button. note- pg 166 has this $content after the if stmt, but he didnt 
						//declare the variable.  i put it here to declare it w/i the instantiations of this section
						$content = $("<div>").append($input, $inputLabel, $tagInput, $tagLabel, $button);
						
						//event listener for button
						$button.on("click" , function () {
							var description = $input.val(),
							//split on comma
							// one problem with this validation is that if the user enters a space after the comma, but before the 2nd tag
							// it creates a new category (ie "work vs " work") even though that is not the intention- a bug to fix
							// a 'clean' type function to remove white space??
							tags = $tagInput.val().split(",");
							
							toDoObjects.push({"description":description, "tags":tags});
							
							//update to dos
							toDos = toDoObjects.map(function (toDo) {
								return toDo.description;
							});
							
							//reset field values to null
							$input.val("");
							$tagInput.val("");
							
							//original 4th child validation; single field, kept for ref
/*							if ($input.val() !== "") {
								toDos.push($input.val());
								$input.val("");
							}*/
						});
						//add stuff to main/content
						$("main .content").append($content);
					}						
					return false;
					
			});
		});
	//when the page loads this ensures one the first tab is opened up by default; otherwise nothing is opened 
	// until one of the tabs is clicked
	$(".tabs a:first-child span").trigger("click");
};

$(document).ready(function () {
//	call to file has to have the right directory from index.php, not app.js- or list doesnt show up
	$.getJSON("webroot/js/toDos.json", function (toDoObjects) {
		// call main w to-dos as object
		main(toDoObjects);
	});
});