<?php 
 include("includes/connexion.inc.php");

if(isset($_POST['message'])){
	$message = $_POST['message'];
	$requete = $pdo->prepare("INSERT INTO messages (contenue, date) Values(:message, NOW())");
	$requete->bindvalue(':message', $message);
	$requete->execute();

}

?>