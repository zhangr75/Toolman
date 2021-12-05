<?php 
//Database class for connect to the database
include_once 'database.php';

class hashPassword
{
    public function hashPass($passInserted){
        $hashedPass = password_hash($passInserted, PASSWORD_BCRYPT);
        return $hashedPass;
    }

    public function verifyPass($passInserted, $hashedPass){
        return password_verify($passInserted, $hashedPass);
    }
}
?>