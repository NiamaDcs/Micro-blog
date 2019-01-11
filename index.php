<!DOCTYPE html>
<html lang="fr">
<body id="page-top" class="index">
	<?php $title="CONNEXION"; 
            $link ="connexion.php";
    include("includes/haut.inc.php"); ?>

	<!-- About Section -->
    <section>
        <?php require_once 'message.php'; ?>
        <?php 

            if (isset($_SESSION['message'])):

        ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">

            <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
<?php endif ?>
        <div class="container">
                <div class="row">
                <form action="message.php" method="post">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" value="" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-lg" >Envoyer</button> 
                    </div>
                </form>
            </div>
            </div>
            <div class="row">
                <div class="col-sm-11 justify-content-center">
            	<?php 
            		include("includes/connexion.inc.php");

            		//recuperation et affichage du contenue
            		$query="SELECT * FROM messages";
            		$result = $pdo->prepare($query);
            		$result->execute();
            		while($row = $result->fetch())
            		 {
            			$message = $row['contenu'];
                        $id = $row['id'];
            			echo "<blockquote><p>".$row['contenu']."</p>";
                    	echo gmdate("Y-m-d H:i:s", $row['date']);
        				 ?>
        				 <span class="flex">
 								<a href="#"
                                    class="btn btn-info"> Modifier</a>
 							<a href="#" 
                                class="btn btn-danger">Supprimer</a>
                                <a href="#" 
                                class="btn btn-danger">Vote</a>
 						</span>
                	 
                <?php echo "</blockquote>"; } ?>
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
            $.ajax({
                url: 'vote.php'
                method: 'POST'
                data: {id: }
                   }).done(function(retour){
                    nombre de vote.html()
            });
            });
    
    </script>
</body>
</html>