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

var updatereview =  function(){
    let content = $('#usertext').val();
    let name = $('#rstant_name').text();
    let restid = $('#resid').text();
    //alert(name);
    if (content == ''){
        alert("input empty");
        return false;
    }
    $.ajax({
             type:"GET",
             url:"/Toolman/php/review_data.php",
             data: {'review': content, 'restaurant_name': name, 'rest_id': restid},
             dataType: "html",
             async : false,
             success:function(result){
                data = '';
                data = eval("("+result+")");
                $.each(data, function (i,item) {

                })
                $("#restaurant").html(resulthtml);
                }

        })
}