<?php 
session_start();

 include("includes/connexion.inc.php");


 //requete qui permet d'inserer un message
if(isset($_POST['message'])){
	$message = $_POST['message'];
	$requete = $pdo->prepare("INSERT INTO messages (contenue, date) Values(:message, NOW())");
	$requete->bindvalue(':message', $message);
	$requete->execute();

	$_SESSION['message'] = "Succès!";
	$_SESSION['msg_type'] = "success";
	} 
//modification
	if (isset($_POST['message'])){
		$message=$_POST['message'];
		if($message !=""){
			$id= $_POST['id'];
			$requete = $pdo->prepare("UPDATE messages SET contenue = :contenue WHERE id = :id");
			$requete->bindvalue(':contenue', $message);
			$requete->bindvalue(':id', $id);
			$requete->execute();
		}
	
	//header("location: index.php");
}


// requete qui permetde supprimer un message
if (isset($_GET['supp'])){
	$id= $_GET['supp'];
	$requete = $pdo->prepare("DELETE FROM messages WHERE id = :id");
	$requete->bindvalue(':id', $id);
	$requete->execute();

	$_SESSION['message'] = "Supprimer!";
	$_SESSION['msg_type'] = "danger";

	header("location: index.php");
}
?>