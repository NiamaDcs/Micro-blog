<?php 
require("vendor/autoload.php");
include("includes/connexion.inc.php");

  function resize_image($imageNom) 
  {
      $nouveauNom = "image-". $imageNom; 

      // les dimensions de la vignette affichée
      $imageh = 150; 
      $imagew = 150;

      // Dimensions de la vignette intermédiare 
      $nh = $imageh; 
      $nw = $imagew; 

      $size = getImageSize($imageNom); 
      $w = $size[0];
      $h = $size[1];

      //calcul du ratio

      $ratio = $h / $w;
      $nratio = $nh / $nw;

      if($ratio > $nratio) 
        {
          $x = intval($w * $nh / $h);
          if($x < $nw) {
              $nh = intval($h * $nw / $w);
          }
          else 
          {
              $nw = $x; 
          }
        }
        else
        {
            $x = intval($h * $nw / $w);
            if($x < $nh)
            {
                $nw = intval($w * $nh / $h);
            }
            else 
            {
                $nh = $x;
            }
        }
        echo "$imageNom est $w x $h";
        echo "$nouveauNom est $nw x $nh, $imagew x $imageh \n";

        // resize
        $resimage = imagecreatefromjpeg($imageNom);
        $nouvImage = imagecreatetruecolor($nw, $nh);
        imageCopyResampled($nouvImage, $resimage,0,0,0,0, $nw, $nh, $w, $h);

        $voirimage = imagecreatetruecolor($imagew, $imageh);
  imagecopy($voirimage, $nouvimage, 0, 0, 0, 0, $nw, $nh);
  
  // saving
  imageJpeg($voirimage, $nouveauNom, 85);
  }
   
 // list des image demo

 $sql = "SELECT imag FROM messages";
    $requete = $pdo->prepare($sql);
    $requete->execute();
    $data = $requete->fetch();

 foreach ($data as $iname)
 {
    resize_image($iname);
 }



?>