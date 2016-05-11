<?php require_once "../block/start.php";
	if(isset($_SESSION['id_user'])==false){
		header("Location: /index.php");
		exit;
	}else{
		$inspection = getTeacherChair($_SESSION["id_user"]);
		if(!isset($inspection["position"]) & !isset($inspection["id_chair"]) & !isset($inspection["id_teacher"]) & !isset($inspection["id_teacher_chair"])){
			header("Location: /pages/office.php");
			exit;
		}
	}
	global $arg;
	$arg = selectTestAuthor($_SESSION["id_user"]);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href=".ico">
    <link rel="stylesheet" href="/css/font-awesome.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.css" media="screen" title="no title" charset="utf-8">
		<script src="/js/addanswertoform.js"></script><!--Перенести вниз-->
    <title>Тесты созданные <?php global $workline; $workline = getAllUser($_SESSION['id_user']); echo $workline['surname']." ".$workline['name']; ?></title>
  </head>
  <body>
    <?php require_once "../block/header.php"; ?>
    <div class="col-md-2 pull-right">
      <div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
          <ul class="nav nav-pills nav-stacked" style=" border:1px solid #eb6864; border-radius:4px;"> <!--Исправить!!!-->
            <li><a href="/pages/minetest.php">Моих тестов:<span class="badge"><?php echo count($arg);?></span></a></li>
            <li><a href="/pages/newtest.php">Создать новый тест</a></li>
						<li class="active"><a href="/pages/newquestiontest.php">Добавить вопрос к тесту</a></li>
            <li class=""><a href="/pages/deletetest.php">Удалить тест</a></li>
          </ul>
      </div>
    </div>
    <div class="container">
			<ul class="breadcrumb">
			  <li><a href="#"><?php echo $workline['surname']." ".$workline['name'];?></a></li>
			  <li><a href="/pages/minetest.php">Мои тесты</a></li>
        <li class="active">Добавить вопрос к тесту</li>
			</ul>
			<form role="form" method="post">
				<?php
				if (!empty($_POST["new_question"])) {
					$id_theme=htmlspecialchars($_POST["id_theme"]);
					$text_question=htmlspecialchars($_POST["text_question"]);
					$text_answer = ($_POST["text_answer"]);
					$trueAnswer = htmlspecialchars($_POST["trueAnswer"]);
					$successfirst = setAllQuestion($id_theme,$text_question,$trueAnswer);
					$id_question = selectId_Question($id_theme,$text_question);
					for($i=0; $i<count($text_answer); $i++){
						$successsecond = setAllAnswer($id_question["id_question"],$text_answer[$i],($i+1));
					}
					if (!$successfirst && !$successsecond) $alert="Ошибка при добавлении нового вопроса к тесту";
						else $alert="Вы успешно добавили вопрос к тесту!";
						include "../block/alert.php";
				}
				?>
				<div class="form-group">
						<div class="input-group">
					    <span class="input-group-addon">Тема теста:</span>
							<select class="form-control" id="select_but_new_test" name="id_theme">
								<?php
									$selectTest = selectTestAuthor($_SESSION["id_user"]);
									for ($i=0; $i<count($selectTest); $i++){
										$id_theme = $selectTest[$i]["id_theme"];
										$name = $selectTest[$i]["name_theme"];
										echo "<option value='".$id_theme."'>".$name."</option>\n";
									}
								?>
							</select>
					  </div>
				</div>

					<div class="form-group">
			      <label for="nameQuestion" class="control-label"></label>
						<div class="input-group">
					    <span class="input-group-addon">Текст вопроса:</span>
					    <textarea class="form-control" rows="3" id="nameQuestion" name="text_question"></textarea>
					  </div>
			    </div>


					<div class="form-group">
					  <label class="control-label"></label>
					  <div class="input-group">
					    <span class="input-group-addon">1)</span>
					    <input type="text" class="form-control" name="text_answer[0]">
					    <span class="input-group-addon">
								<input type="radio" name="trueAnswer" id="trueAnswer" value="1" checked>
					    </span>
					  </div>
					</div>

					<span id="addtoform"></span>

					<div class="form-group">
	      		<div class="input-group">
							<span class="input-group-btn">
								<input type="submit" name="new_question" value="Создать вопрос" class="btn btn-primary">
								<input type="button" onclick="AddToForm()" value="Добавить ответ.." class="btn btn-success">
								<input type="button" onclick="DeleteToForm()" value="Удалить ответ.." class="btn btn-defualt">
							</span>
						</div>
					</div>
			</form>
    </div>
    <?php require_once "../block/footer.php"; ?>
  </body>
</html>
