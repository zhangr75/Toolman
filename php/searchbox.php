<?php 
    //Database class for connect to the database
    include_once 'database.php';
    
    $searchbox = $_GET["search"];

    //Connect to database by using PDO
    $database = new Database();
    $db = $database->getConnection();
    if($db['status'] == '0'){
        echo "Connection to database failed: " . $db['message'];
    }else{
        try {
            $query = "select * from restaurants where name ='$searchbox' ";
            $conn = $db['connection'];
            $request = $conn->prepare($query);
            $request->execute();
            while($row =$request->fetch(PDO::FETCH_ASSOC)){
            $name = $row['name'];
            $address = $row['address'];

                echo "<tr>";
                echo "<td align=center>$name</td>";
                echo "<td align=center>$address</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        catch (Exception $e) {
            die("something went wrong".$e->getMessage());
        }
    }
?>