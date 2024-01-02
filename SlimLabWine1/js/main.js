
var rootURL = "http://localhost/WineLab/api/wines";

var curretnWine;

$(document).ready(function(){
    alert("This is Example A");

    findAll();
})


var findAll = function(){
    console.log("findAll");
    $.ajax({
        type: 'GET',
        url: rootURL,
        dataType: "json",
        success : renderList
    })
};

var renderList = function(data){
    var list = data.wine;
    $('#wineList li').remove();
    $.each(list, function(index,wine){
        $('#wineList').append('<li><a href="#" id="' +wine.id + '">'+wine.name+'</a></li>');
    })
}