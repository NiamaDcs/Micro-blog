<?php 
$serv="localhost";
$user="root";
$pass="";
$db="micro_blog";

    try
{
    $pdo = new PDO("mysql:host=$serv;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
} catch (PDOException $e) {
        
        die($e->getMessage());
    }

?>