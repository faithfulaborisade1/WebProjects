// This file render the results of your GET request and manipulate the DOM to append the items to your UL
// The root URL for the RESTful api
// This should match the route you created in your index.php 
var rootURL = "http://localhost/WineLab-A/api/wine";

var currentWine; 

//When the DOM is ready.
$(document).ready(function(){
	
	//show alert to make sure jQuery code is being accessed
	alert("This is Example A");
	
	//call the findAll
	findAll();
});


//Calls the GET method of your rest API with the root URL
var findAll=function() {
	alert("findAll function ... this sends the ajax request to GET, based on the rootURL defined above. Test that Route in Postman ");
	console.log('findAll');
	$.ajax({
		type: 'GET',
		url: rootURL,
		dataType: "json", // data type of response
		success: renderList
	});
};


//updates the DOM to append the returned values and create your list of entries
var renderList= function(data) {
	alert("renderList function ... THis will process the results of your GET request and if sucessful will update the DOM ");
    var list=data.wine;
	$('#wineList li').remove();
	$.each(list, function(index, wine) {
		$('#wineList').append('<li><a href="#" id="' + wine.id + '">'+wine.name+'</a></li>');
	});
};
