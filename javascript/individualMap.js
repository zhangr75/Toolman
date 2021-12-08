var map, marker, infoWindow;
function initMap() {
    //set up map object by initializing the zoom index and the position: lat, lag
    map = new google.maps.Map(document.getElementById("map"),{
        zoom: 13, 
        center: {lat:43.24458199937876,  lng: -79.87154251830432}});
        //set up marker object
}

/**
var reviews =  function(){
    let id = $_GET['resturantId'];
    if (id == ''){
        alert("input empty");
        return false;
    }
    $.ajax({
             type:"GET",
             url:"/Toolman/php/searchbox.php",
             data: {"search": id},
             dataType: "html",
             async : false,
             success:function(result){
                data = '';
                var restaurant_name = '';
                var address = '';
                data = eval("("+result+")");
                $.each(data, function (i,item) {
                    restaurant_name = item.name;
                    address = item.address
                })
                $("#restant_name").html(restaurant_name);
                }

        })
        
        var examplemarker = {
            lat: parseFloat(la), 
            lng: parseFloat(lo)
        };

        marker.setPosition(examplemarker);//set the location of marker
        map.setCenter(examplemarker, 9)//reset the centre of the map

        google.maps.event.addListener(marker,'click', function() {
            infoWindow.setContent(searchexample);
            infoWindow.open(map, marker);
            });
        marker.setAnimation(google.maps.Animation.DROP);
        marker.addListener("mouseover", bounceanimation);

    /**
    var searchexample = 
                '<div class="info_content">' +
                '<h3>So yummy</h3>' +
                '<a href = "individual_sample.html"><u>More info</u></a>' +
                '</div>';

    var examplemarker = {
        lat: 43.25875194676521, 
        lng: -79.84498643707694
    };
    marker.setPosition(examplemarker);//set the location of marker
    map.setCenter(examplemarker, 9)//reset the centre of the map

    google.maps.event.addListener(marker,'click', function() {
        infoWindow.setContent(searchexample);
        infoWindow.open(map, marker);
        });
    marker.setAnimation(google.maps.Animation.DROP);
    marker.addListener("mouseover", bounceanimation);
    
}**/