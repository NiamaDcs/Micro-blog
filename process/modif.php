<?php
session_start();

include("../includes/connexion.inc.php");
//
		if (isset($_POST['id'])) {
            $message = $_POST['message'];
            $id = $_POST['id'];
		    $requete = $pdo->prepare("UPDATE messages SET contenu = :contenu where id = :id");
			$requete->execute([
                'id' => $id,
                'contenu' => $message
            ]);

			$_SESSION['message'] = "Succès Update!";
			$_SESSION['msg_type'] = "success";
            
			}
header("location: index.php");
?>

