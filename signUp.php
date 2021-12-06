<!--Author: Run Zhang, Boming Jin -->
<!DOCTYPE html>
<html lang = "en">

    <head>
        <!--Title that showed in the title bar-->
        <title>Sign Up</title> 
        
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
        <script src="javascript/index.js"></script>

        <!--Set where the window should been opened when clicking hyperlink. Open the document in the same window-->
        <base target = "_self">
    </head>

    <body>
        <?php
        $emailErr;
        $phoneErr;
        $passErr;
        $userNameErr;

        function test_input($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
          }
        ?>
        <div class = "header">
            <div class = "navBar"> 
                <a href = "index.php">To Main Page</a>
                <a href = "index.php">Link2</a>
                <a href = "index.php">Link3</a>
                <a href = "index.php">Link4</a>
            </div>
        </div>
        <div class = "borderForInputs">
            <div class = "captionForInoutBoxes">
                <h1><span class = "TitleSize">Sign Up</span></h1>
            </div>

            <!--For future to post information to server sides-->
            <div class = "InputBox">
                <form method = "post" action="/Toolman/php/signup.php" onsubmit = "return validationForSignUp(this);">
                    <label for = "phonenum">Phone Number</label>
                    <br/>
                    <input id = "phonenum" type = "text" name = "PhoneNumber">
                    <br/>

                    <label for = "email">E-mail Address</label>
                    <br/>
                    <input id = "email" type = "text" name = "EMailAddress">
                    <br/>

                    <label for = "userpw">Password</label>
                    <br/>
                    <input id = "userpw" type = "password" name = "Userpw">
                    <br/>
                    <span class = "notice">*Text&numbers 8-32 long</span>
                    <br/>
                    
                    <!--For user to enter the customized answers-->
                    <label for = "username">Username</label>
                    <br/>
                    <input id = "username" name = "Username">
                    <br/>
                    <span class = "notice">*Only text 8-12 long</span>
                    <br/>

                    <!--Choose one of two genders-->
                    <label for="male">Male</label>
                    <input id="male" type="radio" name="gender" value="Male">
                    <label for="female">Female</label>
                    <input id="female" type="radio" name="gender" value="Female">
                    
                    <br/><br/>
                    <input id = "submitButton" type = "submit" value = "submit">
                    <input id = "resetButton" type = "reset" value = "reset">
                </form>
            </div>
            
        </div>

        <div class = "footer">
            <p>Author: Run Zhang, Boming Jin &copy; 2021-10-08</p>
        </div>

        <!--ajax for multiple using-->
        <script type = "text/javascript">
            function signUp(){
                let PhoneNumber = $('#phonenum').val();
                let EMailAddress = $('#email').val();
                let Userpw = $('#userpw').val();
                let Username = $('#username').val();
                if (PhoneNumber != "" && EMailAddress != "" && Userpw != "" && Username != ""){
                    
                }
            }
        </script>
    </body>


</html>
<!--Author: Run Zhang, Boming Jin -->