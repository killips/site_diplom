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
      $result=0;
      if (!empty($_POST["btn_stop"])) {
        $optionsRadios = ($_POST["optionsRadios"]);
        for($i=1; $i<=count($optionsRadios); $i++){
          if($optionsRadios[$i]!=$argQuestion[$i-1]["num_true_answer"]){

          }else{
            $result++;
          }
        }
        $alltrue=count($optionsRadios);
        $proc = (100*$result)/$alltrue;
        if($proc<60){
          echo "<div class='container'>
          <div class='alert alert-dismissible alert-danger'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <h4>Внимание! Результат не удовлетворитен!!</h4>
                <p>Вы ответили на ".$proc."% вопросов верно. Учите предмет лучше.</p>
              </div>
              </div>";
        }else{
          if($proc>=60 & $proc<=74){
            echo "<div class='container'>
            <div class='alert alert-dismissible alert-danger'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <h4>Внимание! Набран проходной бал</h4>
                  <p>Вы ответили на ".$proc."% вопросов верно. Учите предмет лучше.</p>
                </div>
                </div>";
          }else{
            if($proc>74 & $proc<=90){
              echo "<div class='container'>
              <div class='alert alert-dismissible alert-info'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <h4>Внимание! Нормальные результат</h4>
                    <p>Вы ответили на ".$proc."% вопросов верно. Можно лучше;) </p>
                  </div>
                  </div>";
            }else{
              if($proc>90){
                echo "<div class='container'>
                <div class='alert alert-dismissible alert-success'>
                      <button type='button' class='close' data-dismiss='alert'>&times;</button>
                      <h4>Внимание! Великолепный результат.</h4>
                      <p>Вы ответили на ".$proc."% вопросов верно. Повторите предмет перед экзаменом и вперёд:) </p>
                    </div>
                    </div>";
              }
            }
          }
        }
      }
    ?>
    <form class="form1" method="post">
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
          <input type="submit" name="btn_stop" value="Завершить"  class="btn btn-primary">
      </div>
    </form>
    <?php require_once "../block/footer.php"; ?>
  </body>
</html>
