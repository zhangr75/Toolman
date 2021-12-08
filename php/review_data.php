<?php 
    //Database class for connect to the database
    include_once 'database.php';
    
    $review = $_GET["review"];
    $restaurant_name = $_GET["restaurant_name"];
    $rest_id = $_GET["rest_id"];

    $i = 0;
    //Connect to database by using PDO
    $database = new Database();
    $db = $database->getConnection();
    if($db['status'] == '0'){
        echo "Connection to database failed: " . $db['message'];
    }else{
        try {
            $query = "insert into review(id,restaurant_name,review,rest_id) VALUES (null, '$restaurant_name','$review','$rest_id')";
            $conn = $db['connection'];
            $request = $conn->prepare($query);
            $request->execute();
            while($row =$request->fetch(PDO::FETCH_ASSOC)){
                $arrays[$i]=$row;
                $i++;
            }
            echo json_encode($arrays);
        }
        catch (Exception $e) {
            die("something went wrong".$e->getMessage());
        }
    }
?>