var map, marker, infoWindow;  //variables to set up map and markers


//Initialize the Google Map API
function initMap() {
    //set up map object by initializing the zoom index and the position: lat, lag
    map = new google.maps.Map(document.getElementById("map"),{
        zoom: 13, 
        center: {lat:43.24458199937876,  lng: -79.87154251830432}});

        infoWindow = new google.maps.InfoWindow;

        //set up marker object
        marker = new google.maps.Marker({
            map: map,
        });
}

    
//HTML5 Geolocation API
function showposition(){
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var currentpositon = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            marker.setPosition(currentpositon);//set the location of marker
            map.setCenter(currentpositon, 12.5)//reset the centre of the map
            marker.setAnimation(google.maps.Animation.DROP);
            marker.setAnimation(google.maps.Animation.BOUNCE);
        });
    }
    else{
        alert("Ops, your browser does not support HTML5 geolocation.");
    }
}

function showresult(){
    document.getElementById('yummy').style.display = "block";
    document.getElementById('yummy').style.animation = "fadeInLeft 0.5s linear 1";
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
}

function bounceanimation() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

//Check the validation of the input this is the aggregate function
function validationForSignUp(form){

    var numVal = validPhoneNumber(form);
    var emailVal = validEmail(form);
    var pwVal = validPW(form);
    var uN = validUN(form);
    if (numVal == false || emailVal == false || pwVal == false || uN == false){
        return false;
    }
    else{
        return true;
    }
}

function validationForLogIn(form){

    var emailVal = validEmail(form);
    var pwVal = validPW(form);
    if (emailVal == false || pwVal == false){
        return false;
    }
    else{
        return true;
    }

}


function validPhoneNumber(form){

    if(form.PhoneNumber.value == ""){
        alert("Need to fill up Phone Number")
        return false;
    }

    //Regular expression to restrict the form that user entering the phone number
    else if (!(/^(\+1)?[\s\-]?\(?[0-9]{3}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{4}$/.test(form.PhoneNumber.value))){
        alert("Invalid form of Phone Number");
        return false;
    }
    return true;

    //found a more specific way to set the pattern which prevent some inputs like (905)+1344355 passing the validation
    /*
    var standard = form.PhoneNumber.value.replace(/^(\+1)/g, "");
    var text = standard.replace(/[\(\)\s\-]/g, "");
    if (form.PhoneNumber.value == ""){
        alert("Need to fill something")
        return false;
    }
    else if (/^[0-9]{10}$/.test(text)){
        alert("Invalid form of phone number");
        return false;
    }
    */

}

function validEmail(form){
    if(form.EMailAddress.value == ""){
        alert("Need to fill up E-Mail Address.")
        return false;
    }

    //Regular expression to restrict the form that user entering the email address
    else if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,})+$/.test(form.EMailAddress.value))){
        alert("Invalid form of E-mail Address");
        return false;
    }
    return true;
}

function validPW(form){
    if(form.Userpw.value == ""){
        alert("Need to fill up Password.")
        return false;
    }
    else if(!(/^[a-zA-Z0-9]{8,32}$/.test(form.Username.value))){
        alert("Invalid form of Password");
        return false;
    }
    return true;
}

function validUN(form){
    if(form.Username.value == ""){
        alert("Need to fill up UserName.")
        return false;
    }
    else if(!(/^[a-zA-Z]{8,12}$/.test(form.Username.value))){
        alert("Invalid form of Username");
        return false;
    }
    return true;
}
