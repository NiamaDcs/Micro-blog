<?php 
include("includes/connexion.inc.php");
//recuperer l'adresse ip du visiteur 
$ip = $_SERVER['REMOTE_ADDR'];
// je recupere l'id que j'ai mis dans data-id
$id= $_GET['id'];
// la req qui permet de recupere l'id du msg
$prep=$pdo->prepare("SELECT * FROM messages Where id= $id");
$prep->bindvalue(":id", $id);
$prep->execute();
//je recupère le resultat ensuite faire une comparaison 
while ($recup=$prep->fetch()){
    $derniereip= recup['derniere_ip'];
    $vote= recup['vote'];
    if ($ip!=$derniereip){
    $reqt=("UPDATE messages SET derniere_ip where id= $id");
    $prep=$pdo->prepare($reqt); 
    $prep->execute($dernierip, $id);
}else {
    echo" vous avez déjà voté"; 
}
  
}
  


?>

