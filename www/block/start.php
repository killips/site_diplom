<?php
  session_start();
  if($_SERVER['SCRIPT_NAME']=="/index.php"){
    require_once "lib/function.php";
  }else{
    require_once "../lib/function.php";
  }
  connectDB();
?>
