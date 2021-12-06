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
            $response['response_status'] = '0';
            $response['response_mess'] = "Connection to database failed: " . $db['message'];
            echo json_encode($response);
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
                    $response['response_status'] = '0';
                    $response['response_mess'] = "You have already Signed Up, Please Log In!";
                    echo json_encode($response);
                } else{
                    $query = "insert into user(email,password,phone_number,sec_q,id) VALUES ('$email','$hashedPass','$phone_number','$sec_q',null)";
                    $statement = $conn->prepare($query);
                    $res = $statement->execute();
                    if(!empty($res)){
                        $response['response_status'] = '1';
                        $response['response_mess'] = 'Success!';
                        echo json_encode($response);
                        
                    }        
                }
                      
                } catch (Exception $e) {
                    die("something went wrong".$e->getMessage());
         }
        }
    }
    else{
        $response['response_status'] = '0';
        $response['response_mess'] = "Invalid method Please try again";
        echo $response;
    }
    
    
?>