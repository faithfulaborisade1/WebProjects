// The root URL for the RESTful services
var rootURL = "http://localhost/WD3PCAssessment2023/api/books";


var findAll= function () {
	console.log('findAll');
	$.ajax({
		type: 'GET',
		url: rootURL,
		dataType: "json", // data type of response
		success: renderList
	});
};

var findById= function(id) {
	console.log('findById: ' + id);
	//alert("findbyid");
	$.ajax({
		type: 'GET',
		url: rootURL + '/' + id,
		dataType: "json",
		success: function(data){
			console.log('findById success: ' + data.name);
			renderDetails(data);
		}
	});
};

 
 
var renderList = function (data) {
	list=data.wine;
        console.log("response");
	$.each(list, function(index, wine) {
		$('#table_body').append('<tr><td>'+wine.name+'</td><td>'+
				wine.grapes+'</td><td>'+wine.country+'</td><td>'+wine.year+
				'</td><td id="'+wine.id+'"><a href="#">More Info</a></td></tr>');
	});
        $('#table_id').DataTable();
};

//Retrieve the wine list when the DOM is ready
$(document).ready(function(){
	findAll();
         $(document).on("click", '#table_body td', function(){findById(this.id);});
      
});

