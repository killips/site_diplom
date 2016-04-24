<?php
	session_start();
	unset($_SESSION['id_user']);
	unset($_SESSION['name']);
	unset($_SESSION['surname']);
	unset($_SESSION['lastname']);
	session_destroy();
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	exit;
?>
