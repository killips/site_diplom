<?php
  require_once "../lib/function.php";

  connectDB();

  $data = (int)$_POST["data"];

  $stmt = $mysqli->prepare("SELECT id_chair AS id, name AS title FROM chair WHERE id_faculty=?");
  $stmt->bind_param("i", $data);
  $stmt->execute();

  $result = $stmt->get_result();

  $data = $result->fetch_all(MYSQLI_ASSOC);

  disconnectDB();

  echo json_encode($data);
?>
