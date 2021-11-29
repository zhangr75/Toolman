<?php
$servername = "localhost";
$username = "root";
$password = "Nicksuper1!";
 
try {
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    echo "success"; 
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>