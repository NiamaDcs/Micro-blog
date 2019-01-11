<?php 
include("includes/connexion.inc.php");
$ip = $_SERVER['REMOTE_ADDR'];
$id= $_POST['id'];
$prep=$pdo->prepare("SELECT * FROM messages Where id= $id");
$prep->bindvalue(":id", $id);
$prep->execute();
//je recupère la donnée
while ($recup=$prep->fetch()){
    $derniereip= recup['derniere_ip'];
    $vote= recup['vote'];
}
    


?>