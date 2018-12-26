<?php 
 include("includes/connexion.inc.php");
//requete qui permet d'inserer un message
if(isset($_POST['message'])){
	$message = $_POST['message'];
	$requete = $pdo->prepare("INSERT INTO messages (contenue, date) Values(:message, date)");
	$requete->bindvalue(':message', $message);
	$requete->bindvalue(':date', time());
	$requete->execute();

}
// requete qui permetde supprimer un message
if (isset($_GET['supp'])){
	$id= $_GET['supp'];
	$requete = $pdo->prepare("DELETE FROM messages WHERE id = :id");
	$requete->bindvalue(':id', $id);
	$requete->execute();
}

?>