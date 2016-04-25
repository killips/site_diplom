<?php
  $mysql = false;
  function connectDB(){
    //Соединение с БД
    global $mysqli;
    //mysqli_report(MYSQLI_REPORT_ALL | MYSQLI_REPORT_STRICT);
		$mysqli = new mysqli("localhost","root","","proverka");
    $mysqli->set_charset("utf8");
  }
  function disconnectDB(){
    //Отсоединение от БД
    global $mysqli;
    $mysqli->close();
  }
  function newUser($email, $nick_name, $password, $name, $surname){
    //создание новой учётной записи
    global $mysqli;
    $success = $mysqli->query("INSERT INTO `user`(`nick_name`, `email`, `password`, `name`, `surname`) VALUES ('$nick_name','$email','$password','$name','$surname') ");
		return $success;
  }
  function resultSetToArray($result_set){
    //Вспомогательная функция для возвпращении массива нумерованного с записями.
    $array = array();
    while (($row = $result_set->fetch_assoc()) != false)
      $array[]=$row;
    return $array;
  }
  function getAllUser($id_user){
    //Возвпращает массив, всю информацию о пользователи из таблиц user и teacher.
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM user WHERE `id_user`='$id_user' ");
    $row=$result->fetch_assoc();
    return $row;
  }
  function getTeacherChair($id_user){
    //Возвращает массив из таблицы teacher_chair по id юзера
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM teacher_chair WHERE `id_teacher`='$id_user' ");
    $row = $result->fetch_assoc();
    return $row;
  }
  function getChair($id_chair){
    //Возвращает массив из таблицы chair по id кафедры
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM chair WHERE `id_chair`='$id_chair' ");
    $row = $result->fetch_assoc();
    return $row;
  }
  function getUniversityFrom($id_faculty){
    //Возвращает массив из таблицы institute по id факультету
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM institute WHERE `id_chair`='$id_faculty' ");
    $row = $result->fetch_assoc();
    return $row;
  }
  function getAllUniversity(){
    //Возвпращает массив, всю информацию о институте из таблиц institute.
    global $mysqli;
    $result_set = $mysqli->query("SELECT * FROM institute");
    return resultSetToArray($result_set);
  }
  function isUser($nick_name,$password){
    //Проверка является ли он юзером. Аутификация пользователя по факту.
    global $mysqli;
    $result_set=$mysqli->query("SELECT * FROM `user` WHERE (`email`='$nick_name' OR `nick_name`='$nick_name') AND `password`='$password'");
    if($result_set->fetch_assoc()) return true;
    else return false;
  }
  function allData($id_user, $name, $lastname, $surname, $science_degree, $academic_rank, $id_chair, $position, $Chair){
    //Обновление всех данные и внесение оставшихся на сайт.
    global $mysqli;
    $success_first = $mysqli->query("UPDATE `user` SET `name`='$name',`lastname`='$lastname',`surname`='$surname',`science_degree`='$science_degree',`academic_rank`='$academic_rank' WHERE `id_user`='$id_user' ");
    if(isset($Chair)){
      $success_second = $mysqli->query("UPDATE `teacher_chair` SET `id_chair`='$id_chair',`position`='$position' WHERE `id_teacher`='$id_user' ");
    }else{
      $success_second = $mysqli->query("INSERT INTO `teacher_chair`(`id_chair`, `id_teacher`, `position`) VALUES ('$id_chair','$id_user','$position')");
    }
    return $success_first && $success_second;
  }
  function addTest(){
    global $mysqli;
    $success = $mysqli->query("INSERT INTO `teacher` (`id_teacher` `name`, `lastname`, `surname`, `science_degree`, `academic_rank`) VALUES ('$id_user', '$name', '$lastname','$surname','$science_degree', '$academic_rank') ");
    $success = $mysqli->query("INSERT INTO `teache_chair` (`id_chair`, `id_teacher`, `position`) VALUES ('$id_chair', '$id_user', '$position') ");
    return $success;
  }
  function selectTest(){
    //Возвращает массив из таблицы chair по id кафедры
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM `subject`,`theme`,`specialty` WHERE subject.id_subject=theme.id_subject AND subject.id_specialty=specialty.id_specialty ");
    return resultSetToArray($result);
  //  SELECT * FROM `subject`,`theme`,`specialty` WHERE subject.id_subject=theme.id_subject AND subject.id_specialty=specialty.id_specialty
  //SELECT * FROM `subject`,`theme`,`specialty`,`teacher_subject`,`teacher` WHERE subject.id_subject=theme.id_subject AND subject.id_specialty=specialty.id_specialty=teacher_subject.id_specialty AND teacher.id_teacher=teacher_subject.id_teacher
  }
  function selectTestAuthor($id_author){
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM `subject`,`theme`,`specialty` WHERE subject.id_subject=theme.id_subject AND subject.id_specialty=specialty.id_specialty AND theme.id_author='$id_author' ");
    return resultSetToArray($result);
  }
  /*INSERT INTO chair VALUES ('2','2','Информационные техналогии и компьютерные системы', 'ИТиКС', 'кафедра ИТиКС СГУ') это запрос к таблице с кафедрами*/
?>
