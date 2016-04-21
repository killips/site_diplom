<?php
	require_once "start.php";
	$nick=htmlspecialchars($_POST["nick"]);
	$password=htmlspecialchars($_POST["password"]);
	$password=md5($password);
	if(isUser($nick, $password)){
	$result=$mysqli->query("SELECT DISTINCT id_user FROM user WHERE (`email`='$nick' OR `nick_name`='$nick') AND `password`='$password' ");
	$row=$result->fetch_assoc();
	$_SESSION["id_user"]=$row["id_user"];
  }else{
		$_SESSION["error_auth"]=1;
  }
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	exit;
?>
