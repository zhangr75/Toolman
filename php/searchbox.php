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

            $echo "<table border='1' >
            <tr>
            <td align=center><b>Name</b></td>
            <td align=center><b>Address</b></td>";

            while($row =$res->fetch(PDO::FETCH_ASSOC)){
            $name = $row['name'];
            $address = $row['address'];

                echo "<tr>";
                echo "<td align=center>$name</td>";
                echo "<td align=center>$address</td>";
                echo "</tr>";
            }
            echo "</table>";
?>