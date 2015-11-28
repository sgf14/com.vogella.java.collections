//see ajaxPost.js

function setDbTable(data) {
	$("#idx").html(data.idx);  
	$("#title").html(data.title);
	$("#desc").html(data.desc);
}

function getDbData(idx) {
	$.get("/php/historyTabAj.php", {idx:idx}, setDbTable);
}

$(document).ready(function() {
	$.get("/getList", setList).done(function() {  //done function sets 1st span as default
		$("span:first").click(); return false;
	});
	
});