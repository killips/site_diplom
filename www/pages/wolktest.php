<?php require_once "../block/start.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="shortcut icon" href=".ico">
  <link rel="stylesheet" href="../css/font-awesome.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="../css/bootstrap.css" media="screen" title="no title" charset="utf-8">
  <title>Тест</title>
</head>
  <body>
    <?php
      $id_test=($_GET["id"]-1);
      $id_table=($_GET["id_table"]);
      require_once "../block/header.php";
      $argTest = selectTest();
      //echo $argTest[$id_test]["id_author"];
      $argQuestion = selectAllTestAndQuestion($_GET["id"]);
    ?>
    <div class="container">
      <div class="panel panel-danger">
        <div class="panel-body">
          <?php echo $argTest[$id_table-1]["name_theme"];?>
        </div>
      </div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs">
      <?php
      for ($i=0; $i<count($argQuestion); $i++){
        echo "<li><a href='#".($i+1)."' data-toggle='tab'>Вопрос №".($i+1)."</a></li>";
      }
      ?>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
          <?php
          for ($i=0; $i<count($argQuestion); $i++){
            $argAnswer = selectAllAnswerInQuestion($argQuestion[$i]['id_question']);
            echo "<div class='tab-pane fade' id='".($i+1)."'>".$argQuestion[$i]['text_question'];
            include "radio.php";
            echo "</div>";
          }
          ?>
      </div>
    </div>
    <div class="container">
        <button type="reset" class="btn btn-primary" data-dismiss="modal" onclick="alert('hello')">Завершить</button>
    </div>
    <?php require_once "../block/footer.php"; ?>
  </body>
</html>
