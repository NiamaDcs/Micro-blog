<?php 
session_start();
setcookie('email', 'mdp', time() +10*365);
var_dump($_COOKIE);
?>

	<?php 
            $title="DECONNEXION"; 
            $link ="deconnexion.php";
        include("includes/haut.inc.php"); 

        if (isset($_SESSION['message'])):

        ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']); ?>
        </div>
    <?php endif ?>

	<!-- About Section -->
	<section>
		<div class="container">
			<div class="row">
				
				<form id="form-login"action="process/connexion.php" method="POST" class="col-md-6 center" >
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
			</div>
		</div>
	</section>
	<?php include("includes/bas.inc.php"); ?>
    <script type="text/javascript">
        
        $(document).ready(function(){
             
            $("#form-login").submit(function(e){
                   
        if ($("#mail").val() === ""){
                $("#notif").removeClass("hide");
           return true;
        }else {
            $("#notif").addClass("hide");
             return false;
           }
           
      });
            e.preventDefault();
        });
    
    
    </script>

