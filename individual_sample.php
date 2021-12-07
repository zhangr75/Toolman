<?php
    session_start();
?>

<!DOCTYPE html>
<!--Author: Run Zhang, Boming Jin -->
<html lang = "en">
    <head>
        <title>Object Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <!--Google fonts-->
        <link href="//fonts.googleapis.com/css?family=Ubuntu+Mono:400italic,400,700italic,700" rel="stylesheet" type="text/css">
        <!--Animation Library-->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />

        <meta name="keywords" content="Sample object information, Rate, Review">
        <meta name="description" content="Sample object information">
        <!--Facebook’s-->
        <meta property="og:title" content="Sample object information" />
        <meta property="og:type" content="review" />
        <meta property="og:description" content="Sample object information" />
        <!--Twitter’s Cards validator-->
        <meta name="twitter:card" content="Sample object information">
        <meta property="og:description" content="Sample object information" />
        <!--save page on moblie screeen-->
        <link rel="shortcut icon" sizes="196x196" href="/images/mobileicon.jpg">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <!--External JavaScript file-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="javascript/index.js"></script>
        <script src="javascript/individualMap.js"></script>

        <!--Set where the window should been opened when clicking hyperlink. Open the document in the same window-->
        <base target = "_self">
    </head>

    <body>
        <!--navigation menu temporarily set to navigate to main page-->
        <div class = "header">
            <div class = "navBar"> 
                <a href = "index.html">To Main Page</a>
                <a href = "index.html">Link2</a>
                <a href = "index.html">Link3</a>
                <a href = "index.html">Link4</a>
                <a href = "index.html">Link5</a>
            </div>
        </div>

        <!--should be a side bar later but for now just reviews-->
        <div class = "leftside">
            <h2>Sample object information</h2>
            <p>address here</p>
            <p>average stars here</p>
            <!--Lists of sample reviews-->
            <h3><em>Sample object reviews</em></h3>
            <h2>Overall:</h2>
                <div class="ratestar">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </div>
            <ul>
                
                <li><strong>4stars</strong>
                    <p>Excellent service, great foods and good services. Only reason for stars 4 is because a food was served with a cold conditoin.</p>
                </li>
                <li><strong>5stars</strong>
                    <p>Love all foods in this places! Friendly customer service. So good!</p>
                </li>
                <li><strong>3stars</strong>
                    <p>Services was good but do not really like the flavour of those foods.</p>
                </li>
                <li><strong>1stars</strong>
                    <p>Great foods but dishes are not cleaned well XD</p>
                </li>
                <li><strong>2stars</strong>
                    <p>Customer did not leave any comments.</p>
                </li>
            </ul>

            <video controls
                width="250"
                height="200"
                muted>
                <source src="images/video.webm"
                        type="video/webm">
                <source src="images/video.mp4"
                        type="video/mp4">
                This browser does not support the HTML5 video element.
            </video>

            <div class = "footer">
                <p>Author: Run Zhang, Boming Jin &copy; 2021-10-08</p>
            </div>

        </div>

        <div class = "rightside">
            <div id="individualMap"></div>
            <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALMSVQoum8gtfksfpEQ4QcZvMqUt8Vez0&callback=initMap&libraries=&v=weekly"></script>
        </div>

        
    </body>
</html>
