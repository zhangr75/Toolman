<?php 
    //Database class for connect to the database
    include_once 'database.php';

    //Get values from $_POST super global variable
    $phone_number = $_POST["PhoneNumber"];
    $email = $_POST["EMailAddress"];
    $password = $_POST["Userpw"];
    $sec_q = $_POST["answer"];

    //Connect to database by using PDO
    $database = new Database();
    $db = $database->getConnection();
    if($db['status'] == '0'){
        echo "Connection to database failed: " . $db['message'];
    }else{
        //Inserting data into the database
        try {
            $conn = $db['connection'];
            $query = "select `email` from `user` where `email` = '$email'";
            $statement = $conn->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result)){
                echo "You have already Signed Up, Please Log In!";
            } else{
                $query = "insert into user(email,password,phone_number,sec_q,id) VALUES ('$email','$password','$phone_number','$sec_q',null)";
                $statement = $conn->prepare($query);
                $res = $statement->execute();
                if(!empty($res)){
                    echo "<a href = '../index.html'>Back to main page</a>";
                }        
            }
                  
            } catch (Exception $e) {
                die("something went wrong".$e->getMessage());
     }
    }
    
?>