<?php 
    //Database class for connect to the database
    include_once 'database.php';
    include_once 'hashPass.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $phone_number = $_POST["PhoneNumber"];
        $email = $_POST["EMailAddress"];
        $password = $_POST["Userpw"];
        $sec_q = $_POST["Username"];
    
        //Connect to database by using PDO
        $database = new Database();
        $db = $database->getConnection();
        if($db['status'] == '0'){
            echo "Connection to database failed: " . $db['message'];
        }else{
            //Inserting data into the database
            try {
                //Hash the password when we could connect to the database
                $hash = new hashPassword();
                $hashedPass = $hash->hashPass($password);

                $conn = $db['connection'];
                $query = "select `email` from `user` where `email` = '$email'";
                $statement = $conn->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                if(!empty($result)){
                    echo "You have already Signed Up, Please Log In!";
                } else{
                    $query = "insert into user(email,password,phone_number,sec_q,id) VALUES ('$email','$hashedPass','$phone_number','$sec_q',null)";
                    $statement = $conn->prepare($query);
                    $res = $statement->execute();
                    if(!empty($res)){
                        echo "<a href = '../index.php'>Back to main page</a>";
                        echo "<br/>";
                        echo "Or, <a href = '../logIn.html'>Log In</a> to tht account";
                    }        
                }
                      
                } catch (Exception $e) {
                    die("something went wrong".$e->getMessage());
         }
        }
    }
    else{
        echo "Invalid method Please <a href = '../signUp.html'>try again</a>";
    }
    //Get values from $_POST super global variable
    
    
?>