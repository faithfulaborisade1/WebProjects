// This file render the results of your GET request and manipulate the DOM to append the items to your UL
// The root URL for the RESTful api
// This should match the route you created in your index.php 
var rootURL = "http://localhost/WineLab-B/api/wines";

var currentWine; 

//When the DOM is ready.
$(document).ready(function(){
	
	//show alert to make sure jQuery code is being accessed
	alert("This is Example B");
	
	//call the findAll
	findAll();
	
	//set listener for the onClock event
	$(document).on("click",'#wineList a', function(){findById(this.id);});
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

//Calls the GET method of your rest API with the root URL and appended Id
var findById=function(id) {
	alert("findById function ... this sends the ajax request to GET, based on the rootURL defined above with appended Id. Test that Route in Postman ");
	console.log('findById: ' + id);
	alert(rootURL + '/' + id);
	$.ajax({
		type: 'GET',
		url: rootURL + '/' + id, //append the /id onto the root URL
		dataType: "json", // data type of response
		success: function(data){
			console.log('findById ' + id + ' success: ' + data.name);
			currentWine = data;
			renderDetails(currentWine);
		}
	});
};


//updates the DOM to append the returned values and create your list of entries
var renderList= function(data) {
	alert("renderList function ... This will process the results of your GET request and if sucessful will update the DOM ");
    var list=data.wine;
	$('#wineList li').remove();
	$.each(list, function(index, wine) {
		$('#wineList').append('<li><a href="#" id="' + wine.id + '">'+wine.name+'</a></li>');
	});
};

var renderDetails=function(wine){
	$('#wineId').val(wine.id);
	$('#name').val(wine.name);
	$('#grapes').val(wine.grapes);
	$('#country').val(wine.country);
	$('#region').val(wine.region);
	$('#year').val(wine.year);
	$('#pic').attr('src','pics/' + wine.picture);
	$('#description').val(wine.description);
	
};