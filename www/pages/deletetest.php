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
    <title>Тесты созданные <?php global $workline; $workline = getAllUser($_SESSION['id_user']); echo $workline['surname']." ".$workline['name']; ?></title>
  </head>
  <body>
    <?php require_once "../block/header.php"; ?>
    <div class="col-md-2 pull-right">
      <div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
          <ul class="nav nav-pills nav-stacked" style=" border:1px solid #eb6864; border-radius:4px;"> <!--Исправить!!!-->
            <li><a href="/pages/minetest.php">Моих тестов:<span class="badge"><?php echo count($arg);?></span></a></li>
            <li><a href="/pages/newtest.php">Создать новый тест</a></li>
						<li><a href="/pages/newquestiontest.php">Добавить вопрос к тесту</a></li>
            <li class="active"><a href="/pages/deletetest.php">Удалить тест</a></li>
          </ul>
      </div>
    </div>
    <div class="container">
			<ul class="breadcrumb">
			  <li><a href="#"><?php echo $workline['surname']." ".$workline['name'];?></a></li>
			  <li><a href="/pages/minetest.php">Мои тесты</a></li>
        <li class="active">Удалить тест</li>
			</ul>
			<form role="form" method="post">
				<?php
				if (!empty($_POST["delete_test"])) {
					$id_theme=htmlspecialchars($_POST["id_theme"]);
          $success = deleteTest($id_theme);
          if (!$success) $alert="Ошибка при удалении теста";
						else $alert="Вы успешно удалили тест!";
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
	      		<div class="input-group">
							<span class="input-group-btn">
								<input type="submit" name="delete_test" value="Удалить тест" class="btn btn-primary">
							</span>
						</div>
					</div>
			</form>
    </div>
    <?php require_once "../block/footer.php"; ?>
  </body>
</html>
