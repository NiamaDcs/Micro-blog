<?php 
include("includes/connexion.inc.php"); 
session_start();
setcookie('email', 'mdp', time() +10*365);
require("vendor/autoload.php"); 

if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp']))
{
    $pseudo = $_POST['pseudo']; 
    $email = $_POST['email'];
    $password = $_POST['mdp'];
    $sid = md5($email.time()+10);
    /*var_dump($pseudo); 
    var_dump($email); 
    var_dump($password);*/

    $sql = "INSERT INTO utilisateurs (email,mdp,sid,username) VALUES (?,?,?,?)";
    $prep = $pdo->prepare($sql);
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $prep->execute([$email, $password,$sid,$pseudo]);
    setcookie("sid", $sid, time()+10);
    header("location: index.php");
    
}


$smarty = new Smarty(); 
$smarty->display("tpls/inscription.tpl");

?>