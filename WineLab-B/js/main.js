// This file render the results of your GET request and manipulate the DOM to append the items to your UL
// The root URL for the RESTful api
// This should match the route you created in your index.php 
var rootURL = "http://localhost/WineLab-B/api/wines";

var currentWine; 

//When the DOM is ready.
$(document).ready(function(){
	
	//show alert to make sure jQuery code is being accessed
	alert("This is Example C");
	
	// Nothing to delete in initial application state
	$('#btnDelete').hide();

	//event listeners
	$(document).on("click", '#wineList a', function(){findById(this.id);});
	$(document).on("click", '#btnAdd', function(){newWine();});
	$(document).on("click", '#btnSave', function(){addWine();});
	
	//reset form
	$('#wineId').val("");
	$('#name').val("");
	$('#grapes').val("");
	$('#country').val("");
	$('#region').val("");
	$('#year').val("");
	$('#pic').attr('src', "");
	$('#description').val("");
	
	//call the findAll
	findAll();
});


//Calls the GET method of your rest API with the root URL
var findAll=function() {
	console.log('findAll');
	$.ajax({
		type: 'GET',
		url: rootURL,
		dataType: "json", // data type of response
		success: renderList
	});
};


//Calls the GET method of your rest API with the root URL and appends on '/' and the ID
var findById= function(id) {
	console.log('findById: ' + id);
	$.ajax({
		type: 'GET',
		url: rootURL + '/' + id,
		dataType: "json",
		success: function(data){
			$('#btnDelete').show();
			console.log('findById success: ' + data.name);
			currentWine = data;
			renderDetails(currentWine);
		}
	});
};

var newWine=function () {
	$('#btnDelete').hide();
	currentWine = {};
	renderDetails(currentWine); // Display empty form as current wine is blank
};

//Calls the POST method of your rest API. Uses the formToJSON to format it for insert
var addWine = function () {
	console.log('addWine');
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: rootURL,
		dataType: "json",
		data: formToJSON(),
		success: function(data, textStatus, jqXHR){
			alert('Wine created successfully');
			$('#btnDelete').show();
			$('#wineId').val(data.id);
                        findAll();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('addWine error: ' + textStatus);
		}
	});
};

//updates the DOM to append the returned values and create your list of entries
var renderList= function(data) {
    var list=data.wine;
	$('#wineList li').remove();
	$.each(list, function(index, wine) {
		$('#wineList').append('<li><a href="#" id="' + wine.id + '">'+wine.name+'</a></li>');
	});
};

//populates the fields with the associated elements
var renderDetails=function(wine) {
	$('#wineId').val(wine.id);
	$('#name').val(wine.name);
	$('#grapes').val(wine.grapes);
	$('#country').val(wine.country);
	$('#region').val(wine.region);
	$('#year').val(wine.year);
	$('#pic').attr('src', 'pics/' + wine.picture);
	$('#description').val(wine.description);
};

// Helper function to serialize all the form fields into a JSON string
var formToJSON=function () {
	var wineId = $('#wineId').val();
	return JSON.stringify({
		"id": wineId == "" ? null : wineId, 
		"name": $('#name').val(), 
		"grapes": $('#grapes').val(),
		"country": $('#country').val(),
		"region": $('#region').val(),
		"year": $('#year').val(),
		"picture": currentWine.picture,
		"description": $('#description').val()
		});
};