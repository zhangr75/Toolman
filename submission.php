<?php
    session_start();
?>

<!--Author: Run Zhang, Boming Jin -->
<!DOCTYPE html>
<html lang = "en">

    <head>
        <!--Title that showed in the title bar-->
        <title>Submission</title> 
        
        <meta charset="UTF-8">
        <!--let the website look good on all devices-->
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        
        <!--link to the external css file-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <!--Google fonts-->
        <link href="//fonts.googleapis.com/css?family=Ubuntu+Mono:400italic,400,700italic,700" rel="stylesheet" type="text/css">
        <!--Animation Library-->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />


        <!--External JavaScript file-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="javascript/submissionpage.js"></script>

        <!--Set where the window should been opened when clicking hyperlink. Open the document in the same window-->
        <base target = "_self">
    </head>

    <body>
        <div class = "header">
            <div class = "navBar"> 
                <a href = "index.php">To Main Page</a>
                <a href = "index.php">Link2</a>
                <a href = "index.php">Link3</a>
                <a href = "index.php">Link4</a>
            </div>
        </div>

        <div class = "leftside">
            <div id = "submission">
                <div class = "captionForInoutBoxes">
                    <h1><span class = "TitleSize">Submission</span></h1>
                </div>

                <!--For future to post information to server sides-->
                <div class = "InputBox">
                    <form method = "post" onsubmit= "return ">
                        <label for = "restaurantname">Restaurant Name</label>
                        <br/>
                        <input id = "restaurantname" type = "text" name = "restaurant name" pattern = "[0-9a-zA-Z ]+" required>
                        <br/>

                        <label for = "description">Description</label>
                        <br/>
                        <textarea id = "description" name = "description" rows = "1" cols = "25"></textarea>
                        <br/>

                        <label for = "latitude">Coordinates</label>
                        <br/>
                        <!--range from -90-90-->
                        <input id = "latitude" name = "latitude" placeholder = "latitude" pattern = "-?([0-9](\.\d+)?|[1-8][0-9](\.\d+)?|90)" required>
                        <!--range from -180-80-->
                        <input id = "longitude" name = "longitude" placeholder = "longitude" pattern = "-?([0-9](\.\d+)?|[1-9][0-9](\.\d+)?|1[0-7][0-9](\.\d+)?|180)" required>
                        <br/>
                        <br/>
                        <label for = "file">Select files: </label>
                        <input type="file" id="file" name="myfile" multiple>
                        <br/>
                        <br/>
                        <input id = "submitButton" type = "submit" value = "submit">
                    </form>
                </div>
                
            </div>

            <div class = "footer">
                <p>Author: Run Zhang, Boming Jin &copy; 2021-10-08</p>
            </div>
        </div>

        <div class = "rightside">
            <div id="map"></div>
            <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALMSVQoum8gtfksfpEQ4QcZvMqUt8Vez0&callback=initMap&libraries=&v=weekly"></script>
        </div>
    </body>


</html>
<!--Author: Run Zhang, Boming Jin -->
