
var rootURL = "http://localhost/SlimLabWine1/api/wine";

var curretnWine;

$(document).ready(function(){
    alert("This is Example A");

    findAll();
});


var findAll = function(){
    console.log("findAll");
    $.ajax({
        type: 'GET',
        url: rootURL,
        dataType: "json",
        success : renderList
        
    });
    console.log("findAllDone");
};

var renderList = function(data){
    console.log("render");
    var list = data.wine;
    $('#wineList li').remove();
    $.each(list, function(index,wine){
        $('#wineList').append('<li><a href="#" id="' +wine.id + '">'+wine.name+'</a></li>');
    });
};