<?php
	require_once "start.php";
	$nick=htmlspecialchars($_POST["nick"]);
	$password=htmlspecialchars($_POST["password"]);
	$password=md5($password);
	if(isUser($nick, $password)){
	$result=$mysqli->query("SELECT id_user, name, surname FROM user,teacher WHERE ((`email`='$nick' OR `nick_name`='$nick') AND `password`='$password') AND user.id_user=teacher.id_teacher ");
	$row=$result->fetch_assoc();
	//$req=$row['id_user'];
	//$result=$mysqli->query("SELECT DISTINCT name FROM teacher WHERE `id_teacher`='$req' ");
	//$row1=$result->fetch_assoc();
	//$result=$mysqli->query("SELECT DISTINCT surname FROM teacher WHERE `id_teacher`='$req' ");
	//$row2=$result->fetch_assoc();
	$_SESSION["id_user"]=$row["id_user"];
	$_SESSION["name"]=$row["name"];
	$_SESSION["surname"]=$row["surname"];
  }else{
		$_SESSION["error_auth"]=1;
  }
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	exit;
?>
