<?php
// creation de session
session_start();

            $title="CONNEXION"; 
            $link ="connexion.php";
// inclure le haut 
    include("includes/haut.inc.php"); 

    if (isset($_SESSION['message'])):

        ?>
        <!--alert-->
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            
        <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']); 
        ?>
        </div>

        <?php 
            endif; 
                include("includes/connexion.inc.php");

             // verification si id existe 
                if (!isset($_GET['id'])) {
                header('Location: index.php');
                exit();
            } 
	               $id= $_GET['id'];

	               $requete = $pdo->prepare("SELECT contenu FROM messages WHERE id =:id");
	               
	               $requete->execute([
                       'id' => $id
                   ]);
                   $row = $requete->fetch();
                       
                    $message = $row['contenu'];
            
                 ?>

        <!-- About Section -->
    <section>
        <div class="container">
                <div class="row">
                <form action="process/modif.php" method="POST">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" value="<?= $message ?>" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" class="btn btn-success btn-lg">Modifier</button>
                    </div>
                </form>
            </div>
            </div>
</section>
<?php include("includes/bas.inc.php"); ?>
