<?php 
    require '../Toolman/php/connect.php';
    $email = $_POST["EMailAddress"];
    $password = $_POST["Userpw"];

    try {
        $query = "select * from user where email='$email' and password = '$password'";
        $request = $conn->prepare($query);
        $res = $request->execute();
        $res = $request->fetchAll(PDO::FETCH_ASSOC); 
        if(!empty($res)){
            echo "<a href = '../index.html'>Log in successed, back to main page</a>";
        }        
        } catch (Exception $e) {
         die("something went wrong".$e->getMessage());
     }
?>