var map, marker, infoWindow;
function initMap() {
    //set up map object by initializing the zoom index and the position: lat, lag
    map = new google.maps.Map(document.getElementById("map"),{
        zoom: 13, 
        center: {lat:43.24458199937876,  lng: -79.87154251830432}});
        //set up marker object

        marker = new google.maps.Marker({
            map: map,
        });

        var examplemarker = {
            lat: parseFloat($("#res_lat").text()), 
            lng: parseFloat($("#res_lng").text())
        };

        
        marker.setPosition(examplemarker);//set the location of marker
        map.setCenter(examplemarker, 9)//reset the centre of the map
        marker.setAnimation(google.maps.Animation.DROP);
        marker.addListener("mouseover", bounceanimation);
}

