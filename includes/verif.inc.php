<?php 
include("connexion.inc.php");
if(isset($_COOKIE['sid'])){
    $req= $pdo->prepare("SELECT sid FROM utilisateurs sid = :sid");
    $req->execute([
        "sid" => $_COOKIE['sid']
    ]);
    if ($req->rowCount() >0 ){
        return true;
    }
}
?>