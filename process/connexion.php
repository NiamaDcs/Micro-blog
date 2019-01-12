 <?php 
session_start();

include("../includes/connexion.inc.php");
    include('../includes/verif.inc.php');
    

        if (isset($_POST['email'])){
						$email = $_POST['email'];
            
						if(!empty($email)){
						$query = "SELECT * FROM utilisateurs where email = :email";
						$prep = $pdo->prepare($query);
						$prep->bindvalue(':email', $email);
						$prep->execute();
                            
						if ($prep->rowCount() > 0){
							$data = $prep->fetch();

							$password = $_POST['mdp'];
							$hash = password_hash($password, PASSWORD_DEFAULT);
                            
							if(password_verify($password, $hash)){
                                $sid = md5($_POST['email'].time()+10);
							     $requete = $pdo->prepare("UPDATE utilisateurs SET sid=? where email=?");
							     $requete->execute([$sid, $email]);
							     setcookie("sid", $sid, time()+10);
                                header("location: ../index.php");
                                exit();
                            }
							else 
                                $_SESSION['message'] = ["danger", "Le mot de passe associé à ce compte est incorrect."];
                            header('Location: ../connexion.php');
                            exit();
						} 
                    }
        }
						

?>
                    