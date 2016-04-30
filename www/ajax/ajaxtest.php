<?php
  require_once "../lib/function.php";

  connectDB();

  $data = (int)$_POST["data"];

  $stmt = $mysqli->prepare("SELECT id_subject AS id, name_subject AS title FROM subject WHERE id_specialty=?");
  $stmt->bind_param("i", $data);
  $stmt->execute();

  $result = $stmt->get_result();

  $data = $result->fetch_all(MYSQLI_ASSOC);

  disconnectDB();

  echo json_encode($data);
?>
