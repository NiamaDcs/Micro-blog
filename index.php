<?php
include ("includes/connexion.inc.php");
include ("includes/verif.inc.php");

session_start();
require("vendor/autoload.php");

    $smarty = new Smarty();
           
    $title="CONNEXION"; 
    $link ="connexion.php";

    if (isset($_SESSION['message'])):

    ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']); ?>
    </div>
    <?php endif ?>

   <?php         
if(isset($_GET['id']))
{
    $sql = "SELECT * FROM messages where id=:id";
    $requete = $pdo->prepare($sql);
    $requete->bindValue(':id', $_GET['id']);
    $requete->execute();
    $data = $requete->fetch();
    $message = $data['contenu']; 
    $id = $_GET['id']; 
    $smarty->assign("id", $id);
    $smarty->assign("message", $message); 
}
//déclaration de la page limite
    $nbPageLimit = 5;
 /**
 * Count le nombre d'occurrence de la table messages 
*/
    $nbreMessage = $pdo->query("SELECT COUNT(id) as nombre FROM messages");
    $nbreMessage = $nbreMessage->fetch()['nombre'];
            		
//nombre de page
    $nbpage = ceil($nbreMessage / $nbPageLimit);
                        
// la page courrant 
    $pageCourant = (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbpage) ? $_GET['p'] : 1;
// page d'acceuil
    $debut = ($pageCourant - 1) * $nbPageLimit;
//page antérieur
    $pageAnt = $pageCourant - 1;
// page suivante
    $pageSuiv = $pageCourant + 1;
//recuperation et affichage du contenue
    $query="SELECT * FROM messages ORDER BY id DESC LIMIT $debut, $nbPageLimit";
    $result = $pdo->prepare($query);
    $result->execute();
     $all_data =  array();
//pour recuperer les donnees dans une variable et les passer a smarty
    while($row = $result->fetch()) { 
// voir si le fichier existe
        $row['img'] = file_exists(1);
        $all_data[] = $row;
}

 //les variables passer en parametre pour donnees a smarty
$smarty->assign("all_data", $all_data);
$smarty->assign("pageAnt", $pageAnt);
$smarty->assign("nbpage", $nbpage);
$smarty->assign("pageCourant", $pageCourant);
$smarty->assign("pageSuiv", $pageSuiv);
// $smarty->assign("connecte", $connecte);
                              
$smarty->display("tpls/index.tpl"); ?>