<?php 
    require '../php/connect.php';
    $phone_number = $_POST["PhoneNumber"];
    $email = $_POST["EMailAddress"];
    $password = $_POST["Userpw"];
    $sec_q = $_POST["answer"];

    try {
        $query = "insert into user(email,password,phone_number,sec_q,id) VALUES ('$email','$password','$phone_number','$sec_q',null)";
        $request = $conn->prepare($query);
        $res = $request->execute();
        if(!empty($res)){
            echo "<a href = '../index.html'>Back to main page</a>";
        }        
        } catch (Exception $e) {
         die("something went wrong".$e->getMessage());
     }
?>