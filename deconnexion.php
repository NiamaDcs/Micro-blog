<?php
	session_start();
	setcookie('email', 'mdp', time()-1);
	header("Location:index.php");
?>