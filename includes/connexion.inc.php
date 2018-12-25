<?php 
$serv="localhost";
$user="root";
$pass="";
$db="micro_blog";

$pdo = new PDO("mysql:host=$serv;dbname=$db", $user, $pass)
or die(connect_error($pdo));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>