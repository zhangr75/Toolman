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


// $(function(){
//     $(".searchbtn").on('click'),function(){
//         var $name = $("searchcontent").val();
//         if($name == ''){
//             alert("input empty");
//             return false;
//         }else{
//             var data = {
//                 name: $name
//             }
//         }
//         $.ajax({
//              type:"GET",
//              url:"/Toolman/php/searchbox.php",
//              data: name,
//              dataType: "html",

//              success:function(result){
//                 $("#restaurant").html(result); 
//              }
//         });
//     }
// });



var showresult =  function(){
    var la, lo;
    let name = $('#searchcontent').val();
    if (name == ''){
        alert("input empty");
        return false;
    }
    $.ajax({
             type:"GET",
             url:"/Toolman/php/searchbox.php",
             data: {"search": name},
             dataType: "html",
             async : false,
             success:function(result){
                //$("#restaurant").html(result).show(); 
                $("#result_table").empty();
                var resulthtml = '';
                var resultid = '';
                data = '';
                data = eval("("+result+")");
                $.each(data, function (i,item) {
                        resulthtml += "<tr><td>" + "<a href=''indivudual_page.php?resturantId=' + item.id'>" +  item.name + "</a>"
                                      "</tr><td>" + item.address + 
                                      "</tr></td>"
                        la = item.latitude;
                        lo = item.longitude;
                        resultid = item.id;
                })
                $("#result_table").append(resulthtml);
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
    **/
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
        $('#phoneErr').html("Need to fill up Phone Number");
        return false;
    }

    //Regular expression to restrict the form that user entering the phone number
    else if (!(/^(\+1)?[\s\-]?\(?[0-9]{3}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{4}$/.test(form.PhoneNumber.value))){
        $('#phoneErr').html("Invalid form of Phone Number");
        return false;
    }
    return true;

}

function validEmail(form){
    if(form.EMailAddress.value == ""){
        $('#emailErr').html("Need to fill up E-Mail Address.");
        return false;
    }

    //Regular expression to restrict the form that user entering the email address
    else if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,})+$/.test(form.EMailAddress.value))){
        $('#emailErr').html("Invalid form of E-mail Address");
        return false;
    }
    return true;
}

function validPW(form){
    if(form.Userpw.value == ""){
        $('#passErr').html("Need to fill up Password.");
        return false;
    }
    else if(!(/^[a-zA-Z0-9]{8,32}$/.test(form.Username.value))){
        $('#passErr').html("Invalid form of Password");
        return false;
    }
    return true;
}

function validUN(form){
    if(form.Username.value == ""){
        $('#unErr').html("Need to fill up UserName.");
        return false;
    }
    else if(!(/^[a-zA-Z]{8,12}$/.test(form.Username.value))){
        $('#unErr').html("Invalid form of Username");
        return false;
    }
    return true;
}

/*ajax for multiple using*/
function signUp(){
    /*Get the input form users*/
    let PhoneNumber = $('#phonenum').val();
    let EMailAddress = $('#email').val();
    let Userpw = $('#userpw').val();
    let Username = $('#username').val();

    /*Check if all required inputs are typed in*/
    if(PhoneNumber != "" && EMailAddress != "" && Userpw != "" && Username != ""){
        /*Validate the input*/
        if (validationForSignUp(document.forms["signUp"])){

            /*Using ajax to dynamically showing the message*/
            $.ajax({
                type:"POST",
                url:"/Toolman/php/signup.php",
                data: {'PhoneNumber':PhoneNumber, 'EMailAddress':EMailAddress, 'Userpw':Userpw, 'Username':Username},
                success:function(response){
                    var data = JSON.parse(response);
                    if (data.response_status == '1'){
                        $("#alrt").fadeIn("slow").delay(1500).fadeOut(700);
                        $('#alrt .title').html(data.response_mess);
                        setTimeout(function(){window.open("/Toolman/logIn.php", "_self")}, 3000);
                    }
                    else{
                        $("#alrtdanger").fadeIn("slow").delay(1500).fadeOut(700);
                        $('#alrtdanger .title').html(data.response_mess);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    if (XMLHttpRequest.readyState == 4) {
                      // HTTP error (can be checked by XMLHttpRequest.status and XMLHttpRequest.statusText)
                      if(textStatus === 'timeout'){     
                        console.log("uns: Failed from timeout.");
                      } else {
                        console.log("uns: HTTP error.");
                      }
 
                    } else if (XMLHttpRequest.readyState == 0) {
                      // Network error (i.e. connection refused, access denied due to CORS, etc.)
                      if(textStatus === 'timeout'){     
                        console.log("uns: Failed from timeout.");
                      } else {
                        console.log("uns: A network error occurred. Please try again.");
                      }
 
                    } else {
                      // something weird is happening
                      if(textStatus === 'timeout'){     
                        console.log("uns: Failed from timeout.");
                      } else {
                        console.log("uns: Something weird is happening.");
                      }
                    }
                  },
                  timeout: 20000,

            }).fail(function(jqXHR, textStatus){
            });;
        }
        
    }
    else{
        return validationForSignUp(document.forms["signUp"]);
    }
}