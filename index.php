<!DOCTYPE html>
<html lang="fr">
<body id="page-top" class="index">
	<?php $title="CONNEXION"; include("includes/haut.inc.php"); ?>

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
            	<form action="message.php" method="POST">
                    <div class="col-sm-10 form-group">
                    <?php 
                    include("includes/connexion.inc.php");

                         if(isset($_GET['edit'])){
                        $requete="SELECT * FROM messages where id = :id";
                        $prep = $pdo->prepare($requete);
                        $prep->bindValue(':id', $_GET['edit']);
                        $prep->execute();
                        while($data = $prep->fetch()){
                        ?>
                         <textarea id="message" name="message" class="form-control" 
                        value="<?php echo $data['contenue']; ?>"></textarea>
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                       <div class="col-sm-2 form-group">
                             <button type="submit" name="envoyer" class="btn btn-success btn-lg">Envoyer</button>
            	       </div>  
                    <?php  } }?>
            	</form>
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
            			$message = $row['contenue'];
                        $id = $row['id'];
            			echo "<blockquote><p>".$row['contenue']."</p>";
                    	echo gmdate("Y-m-d H:i:s", $row['date']);
        				 ?>
        				 <span class="flex">
 								<a href="index.php?edit=<?php echo $row['id']; ?>"
                                    class="btn btn-info"> Modifier</a>
 							<a href="message.php?supp=<?php echo $row['id']; ?>" 
                                class="btn btn-danger">Supprimer</a>
 						</span>
                	 
                <?php echo "</blockquote>"; } ?>
      </div>

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

</body>
</html>