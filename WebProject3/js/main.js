 
var rootURL = "http://localhost/WebProject3/api/dog";



var currentDog;



var search =function(searchKey) {
	if (searchKey == '') 
		findAll();
	else
		findByName(searchKey);
};


var newDog=function () {
	 
	$('#btnDelete').hide();
	currentDog = {};
	renderDetails(currentDog); // Display empty form
	 
};


// var findAll = function() {
//     console.log('findAll');
//     $.ajax({
//         type: 'GET',
//         url: rootURL,
//         dataType: "json", // data type of response
//         success: function(data) {
//             renderList(data);
//             location.reload(); // Refresh the page
//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             alert('findAll error: ' + textStatus);
//         }
//     });
// };


var findAll = function() {
    console.log('findAll');
    $.ajax({
        type: 'GET',
        url: rootURL,
        dataType: "json", // data type of response
        success: function(data) {
            renderList(data);
			console.log(data)
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('findAll error: ' + textStatus);
        }
    });
};


var findByName= function(searchKey) {
	console.log('findByName: ' + searchKey);
	$.ajax({
		type: 'GET',
		url: rootURL + '/search/' + searchKey,
		dataType: "json",
		success: renderList 
	});
};

var findById= function(id) {
	console.log('findById: ' + id);
	$.ajax({
		type: 'GET',
		url: rootURL + '/' + id,
		dataType: "json",
		success: function(data){
			console.log('findById success: ' + data.name);
			currentDog = data;
			renderDetails(currentDog);
			$('#addDogModal').modal('show');
	}
});
};

var addDog = function () {
	console.log('addDog');
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: rootURL,
		dataType: "json",
		data: formToJSON(),
		success: function(data, textStatus, jqXHR){
			alert('Dog created successfully');
			// $('#btnDelete').show();
			$('#dogId').val(data.id);
                        findAll();
						location.reload();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('addDog error: ' + textStatus + errorThrown);
		}
	});
};

var updateDog= function () {
	console.log('updateDog');
	$.ajax({
		type: 'PUT',
		contentType: 'application/json',
		url: rootURL + '/' + $('#dogId').val(),
		dataType: "json",
		data: formToJSON(),
		success: function(data, textStatus, jqXHR){
			alert('Dog updated successfully');
                         findAll();
						 location.reload();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('updateDog error: ' + textStatus+ errorThrown);
		}
	});
};

var deleteDog = function(dogId) {
    console.log('deleteDog');
    $.ajax({
        type: 'DELETE',
        url: rootURL + '/' + dogId,
        success: function(data, textStatus, jqXHR){
            alert('Dog deleted successfully');
            findAll();
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('deleteDog error' + textStatus + errorThrown);
        }
    });
};

 

var renderList= function(data) {
	var list=data.dogs;
	
	//display the data in a table rather than a list
	 
    $('#table_body').empty(); // Clear existing rows
    $.each(list, function(index, dog) {

        $('#table_body').append('<tr><td>' + dog.id + '</td><td>' + dog.name + '</td><td>' + dog.age + '</td><td>' + dog.color + '</td><td>' + dog.maintenance + '</td><td>' + dog.breed + '</td><td><button class="btn-update" data-id="' + dog.id + '">Update</button> <button class="btn-delete" data-id="' + dog.id + '">Delete</button></td></tr>');
		console.log(dog.id)

    });
    $('#table_id').DataTable();
};


var renderDetails=function(dog) {
	$('#dogId').val(dog.id);
	$('#name').val(dog.name);
	$('#age').val(dog.age);
	$('#color').val(dog.color);
	$('#maintenance').val(dog.maintenance);
	$('#breed').val(dog.breed);
};

// Helper function to serialize all the form fields into a JSON string
var formToJSON=function () {
	var dogId = $('#dogId').val();
	return JSON.stringify({
		"id": dogId == "" ? null : dogId, 
		"name": $('#name').val(), 
		"age": $('#age').val(),
		"color": $('#color').val(),
		"maintenance": $('#maintenance').val(),
		"breed": $('#breed').val(),
		});
};

//When the DOM is ready.
$(document).ready(function(){
	 

	$(document).on('click', '.btn-update', function() {
		var dogId = $(this).data('id');
		findById(dogId);
	});
	
	$(document).on('click', '.btn-delete', function() {
		var dogId = $(this).data('id');
		deleteDog(dogId);
	});
	

	// Register listeners
	$('#btnSearch').click(function() {
		search($('#searchKey').val());
		return false;
	});

	// Trigger search when pressing 'Return' on search key input field
	$('#searchKey').keypress(function(e){
		if(e.which == 13) {
			search($('#searchKey').val());
			e.preventDefault();
			return false;
	    }
	});

	$('#btnAdd').click(function() {
		newDog();
		return false;
	});

	$('#btnSave').click(function() {
		if ($('#dogId').val() == '')
			addDog();
		else
			updateDog();
		return false;
		
	});

	// $('#btnDelete').click(function() {
	// 	deleteDog();
	// 	return false;
	// });

	$('#DogList a').on("click",function() {
		findById($(this).data('identity'));
	});
	
	$(document).on("click", '#dogList a', function(){findById(this.id);});

	// // Replace broken images with generic wine bottle
	// $("img").error(function(){
	//   $(this).attr("src", "pics/generic.jpg");

	// });
	//reset form
	$('#dogId').val("");
	$('#name').val("");
	$('#age').val("");
	$('#color').val("");
	$('#maintenance').val("");
	$('#breed').val("");
 
	findAll();
});
