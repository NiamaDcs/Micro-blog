<?php
session_start();
            $title="CONNEXION"; 
            $link ="connexion.php";
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
                <form action="process/add.php" method="POST">
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
                <div class="col-sm-10">
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
            			//echo "<blockquote><p>".$row['contenu']."</p>";
                    	//echo gmdate("Y-m-d H:i:s", $row['date_ajout']);
        				 ?>
                        <blockquote class="center">
                            <p><?php echo $message; ?></p>
        				        <a href="modification.php?id=<?= $id ?>" class="btn btn-info"> Modifier</a>
 							    <a href="suppression.php?id=<?= $id ?>" class="btn btn-danger">Supprimer</a>
                                <a href="#" class="btn btn-primary">Vote</a>
                    </blockquote>
                <?php  } ?>
            </div>
        </div>
    
    </section>
    
    <?php include("includes/bas.inc.php"); ?>

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
