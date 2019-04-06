<?php
    if(preg_match("/@[a-z-_]/", " je joue à @mon_pseudola guitare.")) {
    
     preg_replace("/@[a-z-_]/", "/<a>@[a-z-_]</a>/")


     $str= preg_replace( 
        "/(?<!a href=\")(?<!src=\")((http|ftp)+(s)?:\/\/[^<>\s]+)/i", 
        "<a href=\"\\0\" target=\"blank\">\\0</a>", 
        $str
    );
    
    https://www.google.com/search?ei=Tr2jXIKNGY2jUNm9iZgN&q=comment+utiliser+les+vignettes+en+php&oq=comment+utiliser+les+vignettes+en+php&gs_l=psy-ab.3..35i39l2j0l8.4183.27533..28041...3.0..4.227.1996.9j6j2......0....1..gws-wiz.....6..0i71j0i131j0i67j0i22i10i30j0i22i30.0gUPoYwW6Xs
    https://www.scriptol.fr/comment/creer-vignette-image.php
    https://www.scriptol.fr/comment/vignette-image-dimensions-fixes.php

        echo "Vrai";
    }else
    {
        echo "FAUX";
    }

?>