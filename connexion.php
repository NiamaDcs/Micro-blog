<?php 
session_start();
setcookie('email', 'mdp', time() +10*365);
var_dump($_COOKIE);
?>

<!DOCTYPE html>
<html lang="fr">
<body id="page-top" class="index">
	<?php $title="DECONNEXION"; 
            //$link ="deconnexion.php";
    include("includes/haut.inc.php"); ?>

	<!-- About Section -->
	<section>
		<div class="container">
			<div class="row">
				 <?php include('includes/verif.inc.php') ?>
				<?php 
					include("includes/connexion.inc.php");
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
							password_verify($password, $hash);
							$sid = md5($_POST['email'].time()+10);
							$requete = $pdo->prepare("UPDATE utilisateurs SET sid=? where email=?");
							$requete->execute([$sid, $email]);
							setcookie("sid", $sid, time()+10);
						} else{
						?>
                    
				<form id="form-login"action="index.php" method="POST" class="col-md-6 center" >
					 <div class="alert alert-danger hide" id="notif">Erreur.....</div>
				<div class="form-group">
							<label for="mail">Adresse e-mail</label>
							<input type="text" name="email" id="mail" value="" class="form-control">
						</div>
						<div class="form-group">
							<label for="pwd">Mot de passe</label>
							<input type="password" name="mdp" id="pwd" value="" class="form-control">
						</div>
						<div class="form-group">
							<button type="submit" name="connexion" class="btn btn-primary">Se connecter</button>
					 	</div>
				</form>
				 <?php }
					
			}  //header("location: index.php"); } ?>
			</div>
		</div>
	</section>
	<?php include("includes/bas.inc.php"); ?>
    

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>
    <script type="text/javascript">
        
        $(document).ready(function(){
             
            $("#form-login").submit(function(e){
                   
        if ($("mail").val() != ""){
                $("#notif").removeClass("hide");
           return true;
        }else {
            $("#notif").addClass("hide");
             return false;
           }
           e.preventDefault();
      });
        });
    
    
    </script>

</body>
</html>