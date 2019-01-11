<?php 
session_start();

include("includes/connexion.inc.php");

  // requete qui permetde supprimer un message
if (isset($_GET['id'])){
	$id= $_GET['id'];
	$requete = $pdo->prepare("DELETE FROM messages WHERE id = :id");
	$requete->bindvalue(':id', $id);
	$requete->execute();

	$_SESSION['message'] = "Supprimer!";
	$_SESSION['msg_type'] = "danger";
	
}
header("location: index.php");

?>