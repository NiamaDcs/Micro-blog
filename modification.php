<?php
session_start();

include("includes/connexion.inc.php");
//
@$id = $_GET['id'];
		if (isset($id)) {
		$requete = $pdo->prepare("UPDATE message SET contenue = :contenue where id = :id");
		$requete->bindvalue(':contenue', $message);
			$requete->bindvalue(':id', $id);
			$requete->execute();

			$_SESSION['message'] = "Succès!";
			$_SESSION['msg_type'] = "success";
            
			}

?>