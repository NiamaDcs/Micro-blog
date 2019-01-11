<?php 
session_start();

 include("../includes/connexion.inc.php");

 //requete qui permet d'inserer un message
if (isset($_POST['message'])){
		$message = $_POST['message'];
		$requete = $pdo->prepare("INSERT INTO messages (contenu, date_ajout) Values(:message, NOW())");
		$requete->bindvalue(':message', $message);
		$requete->execute();
			$_SESSION['message'] = "Succès!";
			$_SESSION['msg_type'] = "success";
}

header("location: ../index.php");
?>