<?php
session_start();
if (isset($_POST['logout'])) {
	session_destroy();
	unset($_SESSION['admin']);
	header('Location: connexion.php?err=3');
	exit(0);
} else header('Location: erreur.php?err=4');
?>