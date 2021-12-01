<?php
    $servername = "localhost";
    $dbName = "signin";
    $username = "root";
    $password = "Nicksuper1!";
    $dsn = "mysql:host=$servername;dbname=$dbName";
    $conn = new PDO($dsn, $username, $password);
?>