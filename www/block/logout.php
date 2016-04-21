<?php
	session_start();
	unset($_SESSION["id_user"]);
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	exit;
?>
