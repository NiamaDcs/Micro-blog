<?php
session_start();
require("vendor/autoload.php");
 include("includes/connexion.inc.php");
 $smarty = new Smarty();

if(isset($_POST['message'])) {

  if(isset($_POST['id']) || $_POST['id']=="") {
        
  $prep = $pdo->prepare('INSERT INTO messages (contenu) VALUES(?)'); 
  $prep->bindValue(1, $_POST['message']); 
  $prep->execute();
  $id = $pdo->lastInsertId();

  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

  $_FILES['image']['tmp_name'];
  move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__)."/data/images/$id.jpg");
  $name = $id.'.jpg';
  $prepe = $pdo->prepare('INSERT INTO messages (img) VALUES(?)');
  $prepe->execute([$name]);
  }
  $_SESSION['message'] = "Insérer!";
  $_SESSION['msg_type'] = "success";
}      
else {
  $requete = $pdo->prepare('UPDATE messages SET contenu = :contenu where id =:id'); 
  $requete->execute(array('contenu' => $_POST['message'], 'id' => $_GET['id']));
  $_SESSION['message'] = "Modifier!";
  $_SESSION['msg_type'] = "success";
 

 }
}
header('Location: index.php');
    exit();
  $smarty->display("tpls/index.tpl");
?>