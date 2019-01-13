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
                    //déclaration de la page limite
                        $nbPageLimit = 5;
                    /**
                    *   Count le nombre d'occurrence de la table messages 
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
            		$query="SELECT * FROM messages ORDER BY date_ajout DESC LIMIT $debut, $nbPageLimit";
            		$result = $pdo->prepare($query);
            		$result->execute();
            		while($row = $result->fetch())
                        {
            			$message = $row['contenu'];
                        $id = $row['id'];
                        $date = $row['date_ajout'];
                    	//echo gmdate("Y-m-d H:i:s", $row['date_ajout']);
        				 ?>
                        <div class="col-md-12">
                        <blockquote>
                            <p><?php echo $message; ?></p>
        				        <a href="modification.php?id=<?= $id ?>" class="btn btn-info"> Modifier</a>
 							    <a href="suppression.php?id=<?= $id ?>" class="btn btn-danger">Supprimer</a>
                                <a href="#" data-id="<?= $data['id'] ?>" class="btn btn-primary buttonVote">Vote</a><small class="text-muted nbreVote"> Nombre de vote : <?php echo "12" ?><p><?php echo $date; ?></p></small>
                    </blockquote>
                            </div>
                <?php  } ?>
            </div>
                
                <!--Pagination -->
                <nav>
                    <ul class="pagination pagination-lg">
                        <li class="<?= ($pageAnt <= 1)? 'disabled' : '' ?>"><a href="?p=<?= $pageAnt ?>">&laquo;</a></li>
                        <?php 
                            for ($i = 1; $i <= $nbpage; $i++) {
                            ?><li class="<?= ($i == $pageCourant)? 'disabled' : '' ?>"><a href="?p=<?= $i ?>"><?= $i ?></a></li><?php
                            }
                        ?>
                        <li class="<?= ($pageSuiv >= $nbpage) ? 'disabled' : '' ?>"><a href="?p=<?= $pageSuiv ?>">&raquo;</a></li>
                    </ul>
                </nav>
        </div>
    
    </section>
    
    <?php include("includes/bas.inc.php"); ?>

     <script type="text/javascript">
         $(".buttonVote").click(function(){
                console.log( $.ajax({
                url: 'vote.php'
                method: 'POST'
                data: {id: $(this).attr('data-id')}
                   }).done(function(data){
                    $(".nbreVote").html();
            });
            );
            });
           
    
    </script>
