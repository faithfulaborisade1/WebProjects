var userRootURL = "http://localhost/WebProject3/api/user";

var currentUser;

var search =function(searchKey) {
	if (searchKey == '') 
		findAllUsers();
	else
		findByName(searchKey);
};


var newUser=function () {
	 
 
	currentUser = {};
	renderDetails(currentUser);  
	 
};

var findAllUsers = function() {
    $.ajax({
        type: 'GET',
        url: userRootURL,
        dataType: "json",
        success: function(data) {
            renderUserList(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error fetching user data"+ textStatus);
        }
    });
};

var findByName= function(searchKey) {
	console.log('findByName: ' + searchKey);
	$.ajax({
		type: 'GET',
		url: userRootURL + '/search/' + searchKey,
		dataType: "json",
		success: renderList 
	});
};

var findById= function(id) {
	console.log('findById: ' + id);
	$.ajax({
		type: 'GET',
		url: userRootURL + '/' + id,
		dataType: "json",
		success: function(data){
			console.log('findById success: ' + data.name);
			currentUser = data;
			renderDetails(currentUser);
			$('#addDogModal').modal('show');
	}
});
};

 
var addUser = function () {
	console.log('addUser');
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: userRootURL,
		dataType: "json",
		data: formToJSON(),
		success: function(data, textStatus, jqXHR){
			alert('User created successfully');
			 
			$('#UserId').val(data.id);
                        findAllUsers();
						location.reload();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('addUser error: ' + textStatus + errorThrown);
		}
	});
};

var updateUser= function () {
	console.log('updateUser');
	$.ajax({
		type: 'PUT',
		contentType: 'application/json',
		url: userRootURL + '/' + $('#UserId').val(),
		dataType: "json",
		data: formToJSON(),
		success: function(data, textStatus, jqXHR){
			alert('User updated successfully');
                         findAllUsers();
						 location.reload();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('updateUser error: ' + textStatus+ errorThrown);
		}
	});
};

var deleteUser = function(UserId) {
    console.log('deleteUser');
    $.ajax({
        type: 'DELETE',
        url: userRootURL + '/' + UserId,
        success: function(data, textStatus, jqXHR){
            alert('User deleted successfully');
            findAllUsers();
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('deleteUser error' + textStatus + errorThrown);
        }
    });
};

var renderUserList = function(data) {
    var tableBody = data.users
    $('#table_body').empty();
    $.each(tableBody, function(index, user) {
        $('#table_body').append('<tr><td>' + user.id + '</td><td>' + user.name + '</td><td>' + user.username + '</td><td>'+ user.password +'</td><td><button class="btn-update-user" data-id="' + user.id + '">Update</button> <button class="btn-delete-user" data-id="' + user.id + '">Delete</button></td></tr>');

    });
};

var renderDetails=function(user) {
	$('#userId').val(user.id);
	$('#name').val(user.name);
	$('#username').val(user.username);
	$('#password').val(user.password);
 
};

var formToJSON=function () {
	var userId = $('#userId').val();
	return JSON.stringify({
		"id": userId == "" ? null : userId, 
		"name": $('#name').val(), 
		"username": $('#username').val(),
		"password": $('#password').val(),
		 
		});
};

$(document).ready(function() {
   

    // $(document).on('click', '.btn-update-user', function() {
    //     var userId = $(this).data('id');
    //     findById(userId)
    // });
    
    // $(document).on('click', '.btn-delete-user', function() {
    //     var userId = $(this).data('id');
    //     deleteUser(userId);
    // });


    // // Register listeners
	// $('#btnSearch').click(function() {
	// 	search($('#searchKey').val());
	// 	return false;
	// });

	// // Trigger search when pressing 'Return' on search key input field
	// $('#searchKey').keypress(function(e){
	// 	if(e.which == 13) {
	// 		search($('#searchKey').val());
	// 		e.preventDefault();
	// 		return false;
	//     }
	// });

	// $('#btnAdd').click(function() {
	// 	newUser();
	// 	return false;
	// });

	// $('#btnSave').click(function() {
    //     addUser();
	// 	// if ($('#userId').val() == '')
	// 	// 	addUser();
	// 	// else
	// 	// 	updateUser();
	// 	// return false;
		
	// });
    // $('#UserList a').on("click",function() {
	// 	findById($(this).data('identity'));
	// });
	
	// $(document).on("click", '#userList a', function(){findById(this.id);});

	// // // Replace broken images with generic wine bottle
	// // $("img").error(function(){
	// //   $(this).attr("src", "pics/generic.jpg");

	// // });
	// //reset form
	// $('#dogId').val("");
	// $('#name').val("");
	// $('#age').val("");
	// $('#color').val("");
	// $('#maintenance').val("");
	// $('#breed').val("");

    findAllUsers();
    
});
