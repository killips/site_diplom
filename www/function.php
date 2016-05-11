<?php
  $mysql = false;
  function connectDB(){
    //Соединение с БД
    global $mysqli;
    //mysqli_report(MYSQLI_REPORT_ALL | MYSQLI_REPORT_STRICT);
		$mysqli = new mysqli("localhost","u0094549_admin","344635217ee007ee","u0094549_balaklava");
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
  function addThemeTest($id_subject,$name_theme,$num_theme,$id_user){
    //Добавляет новую тему теста
    global $mysqli;
    $success = $mysqli->query("INSERT INTO `theme`(`id_subject`, `name_theme`, `num_theme`, `id_author`) VALUES ('$id_subject','$name_theme','$num_theme','$id_user')");
    return $success;
  }
  function selectTest(){
    //Возвращает массив из таблицы chair по id кафедры
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM `subject`,`theme`,`specialty` WHERE subject.id_subject=theme.id_subject AND subject.id_specialty=specialty.id_specialty ");
    return resultSetToArray($result);
    }
  function selectTestAuthor($id_author){
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM `subject`,`theme`,`specialty` WHERE subject.id_subject=theme.id_subject AND subject.id_specialty=specialty.id_specialty AND theme.id_author='$id_author' ");
    return resultSetToArray($result);
  }
  function selectAllTestAndQuestion($id_theme){
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM `question` WHERE `id_theme`='$id_theme'");
    //$row = $result->fetch_assoc();
    return resultSetToArray($result);
  }
  function selectAllAnswerInQuestion($id_question){
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM `answer` WHERE `id_question`='$id_question'");
    //$result=$result->fetch_assoc();
    return resultSetToArray($result);
  }
  function getAllSpecialty($id_chair){
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM `specialty` WHERE `id_chair`='$id_chair'");
    //$result=$result->fetch_assoc();
    return resultSetToArray($result);
  }
  function getAllTeacher_chair($id_user){
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM `teacher_chair` WHERE `id_teacher`='$id_user'");
    $result=$result->fetch_assoc();
    return $result;
  }
  function setAllQuestion($id_theme,$text_question,$num_true_answer){
    global $mysqli;
    $num_question = $mysqli->query("SELECT MAX(`num_question`) FROM `question` WHERE `id_theme`='$id_theme'");
    $num_question = $num_question->fetch_assoc();
    if(isset($num_question)){
    $success = $mysqli->query("INSERT INTO `question`(`id_theme`, `text_question`, `num_question`, `num_true_answer`) VALUES ('$id_theme','$text_question','1','$num_true_answer')");
      }else{
    $success = $mysqli->query("INSERT INTO `question`(`id_theme`, `text_question`, `num_question`, `num_true_answer`) VALUES ('$id_theme','$text_question','($num_question+1)','$num_true_answer')");
    }
    return $success;
  }
  function selectId_Question($id_theme,$text_question){
    global $mysqli;
    $result = $mysqli->query("SELECT `id_question` FROM `question` WHERE `id_theme`='$id_theme' AND `text_question`='$text_question'");
    $result=$result->fetch_assoc();
    return $result;
  }
  function setAllAnswer($id_question,$text_answer,$num_answer){
    global $mysqli;
    $success = $mysqli->query("INSERT INTO `answer`(`id_question`, `text_answer`, `num_answer`) VALUES ('$id_question','$text_answer','$num_answer')");
    //$result=$result->fetch_assoc();
    return $success;
  }
  function deleteTest($id_theme){
    global $mysqli;
    //$sucessfirst = $mysqli->query("DELETE FROM `question` WHERE `id_theme`='$id_theme'");
    $successsecond = $mysqli->query("DELETE FROM `theme` WHERE `id_theme`='$id_theme'");
    return /*$sucessfirst &&*/ $successsecond;
  }
?>
