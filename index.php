<!DOCTYPE html>
<!--Author: Run Zhang, Boming Jin -->
<html lang = "en">
<head>
	<title>CS4WW4 Project</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    
    <!--Animation Library-->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <!--External JavaScript file-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="javascript/index.js"></script>
    
    

    <!--Set where the window should been opened when clicking hyperlink. Open the document in the same window-->
    <base target = "_self">
</head>
<body>

        <!--navBar, bottom. left side are for define different parts of web page-->
    <div class="header">

        <div id="regpart">
            <!--make buttons as the hyperlink to another page for log in or sign up-->
            <form>        
            <button formaction = "logIn.php" type="submit" class="reg">Log In</button>
            <button formaction = "signUp.php" type="submit" class="reg">Sign Up</button>
            </form>

        </div>

        <div id="searchbox">
        <form method = "post" action="../Toolman/php/searchbox.php">
            <input type="text" class ="tosearch" placeholder="Restaurant..." name = "search">
            <select name="rating" class="todrop">
                <option selected disabled>Rating</option>
                <option value="1star">1 star</option>
                <option value="2star">2 star</option>
                <option value="3star">3 star</option>
                <option value="4star">4 star</option>
                <option value="5star">5 star</option>
            </select>
            <img id = "currentlocation" src = "images/gps_btn.png" alt = "GPS button" onclick= "showposition()" title = "Find your location">
            <button type="submit" class="searchbutton" name = "searchbtn" onclick="showresult()">Search</button>
        </form>
        </div>
    </div>
    
    <div class="bottom">
        <div class="leftside">
            <div class="movingbtn"> 
                <form action="submission.html" method="get"><button type="submit" class="newobj">Add</button></form>
            </div>

            <h3>Top 10 restaurant near you!</h3> 
            
            <a href = "individual_sample.html">
                <div id="yummy">
                    <img src="images/yummy.jpeg" id="yummyimg" alt = "Yummy Image" title = "Link to Object Page!">
                    <div class="ratestar">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>  
            </a>

            <br/>

            <p>Sorry, there are no more restaurants nearby...</p>   
                
                
                <div class="footer" style="bottom: 0;">
                    <p>Author: Run Zhang, Boming Jin &copy; 2021-10-08</p>
                </div>

        </div>


        <div class = "rightside">
            <div id="map"></div>
            <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALMSVQoum8gtfksfpEQ4QcZvMqUt8Vez0&callback=initMap&libraries=&v=weekly"></script>
        </div>
        
    </div>

</body>
</html>