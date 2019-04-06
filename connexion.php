<?php 
include ("includes/connexion.inc.php");
include ("includes/verif.inc.php");

session_start();
setcookie('email', 'mdp', time() +10*365);
require("vendor/autoload.php");
$smarty = new Smarty();

//var_dump($_COOKIE);

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        if(!empty($email)){
            $query = "SELECT * FROM utilisateurs where email = :email";
            $prep = $pdo->prepare($query);
            $prep->bindValue(':email', $email);
            $prep->execute();

            if($prep->rowCount() > 0){
                //$data = $prep->fetch();
                $password = $_POST['mdp'];
                $hash = password_hash($password, PASSWORD_DEFAULT);

                if(password_verify($password, $hash)){
                    $sid = md5($_POST['email'].time()+10);
                    $requete = $pdo->prepare("UPDATE utilisateurs SET sid =? where email =?");
                    $requete->execute([$sid, $email]);
                    setcookie("sid", $sid, time()+10);
                    header("location: index.php");
                    exit();
                }
                else
                    $_SESSION['message'] = ["danger", "Le mot de passe est incorrect"];
                    header("location: connexion.php");
                    exit();
                }
        }
    }
$smarty->display("tpls/connexion.tpl");
?>




