<?php 
    //Database class for connect to the database
    include_once 'database.php';
    
    $searchbox = $_GET["searchcontent"];

    //Connect to database by using PDO
    $database = new Database();
    $db = $database->getConnection();
    if($db['status'] == '0'){
        echo "Connection to database failed: " . $db['message'];
    }else{
        try {
            $query = "select * from restaurants where name ='$searchbox' ";
            $request = $conn->prepare($query);
            $res = $request->execute();
            $res = $request->fetchAll(PDO::FETCH_ASSOC); 
            if(!empty($res)){
                echo json_encode($res);
            }        
            } catch (Exception $e) {
            die("something went wrong".$e->getMessage());
        }
    }
?>