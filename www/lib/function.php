<?php
  $mysql = false;
  function connectDB(){
    global $mysqli;
		$mysqli = new mysqli("localhost","root","","site_diplom");
		$mysqli->query("SET NAMES 'utf-8'");
  }
  function newUser($email, $nick_name, $password){
    global $mysqli;
    $success = $mysqli->query("INSERT INTO `user` (`email`, `nick_name`, `password`) VALUES ('$email', '$nick_name', '$password') ");
		return $success;
  }
  function allData(){
    global $mysqli;
    $success = $mysqli->query("INSERT INTO `teacher` (`id_teacher` `name`, `lastname`, `surname`, `science_degree`, `academic_rank`) VALUES ('$id_user', '$name', '$lastname','$surname','$science_degree', '$academic_rank') ");
    $success = $mysqli->query("INSERT INTO `teache_chair` (`id_chair`, `id_teacher`, `position`) VALUES ('$id_chair', '$id_user', '$position') ");
    return $success;
  }
  function isUser($nick_name,$password){
    global $mysqli;
    //$password=md5($password);
		$result_set=$mysqli->query("SELECT * FROM `user` WHERE (`email`='$nick_name' OR `nick_name`='$nick_name') AND `password`='$password'");
		if($result_set->fetch_assoc()) return true;
		else return false;
  }
  function checkUser($id_user){
    //пока не используется
    global $mysqli;
    $result_set=$mysqli->query("SELECT * FROM `user` WHERE `id_user`='$id_user' ");
    if($result_set->fetch_assoc()) return true;
    else return false;
  }
  function addTest(){
    global $mysqli;
    $success = $mysqli->query("INSERT INTO `teacher` (`id_teacher` `name`, `lastname`, `surname`, `science_degree`, `academic_rank`) VALUES ('$id_user', '$name', '$lastname','$surname','$science_degree', '$academic_rank') ");
    $success = $mysqli->query("INSERT INTO `teache_chair` (`id_chair`, `id_teacher`, `position`) VALUES ('$id_chair', '$id_user', '$position') ");
    return $success;
  }
  function selectTest(){

  }
  function disconnectDB(){
    global $mysqli;
    $mysqli->close();
  }
  /*INSERT INTO chair VALUES ('2','2','Информационные техналогии и компьютерные системы', 'ИТиКС', 'кафедра ИТиКС СГУ') это запрос к таблице с кафедрами*/
?>
