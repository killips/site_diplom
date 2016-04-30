<?php require_once "../block/start.php";
	if(isset($_SESSION['id_user'])==false){
		header("Location: /index.php");
		exit;
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
            <li class="active"><a href="/pages/newtest.php">Создать новый тест</a></li>
						<li><a href="/pages/newquestiontest.php">Добавить вопрос к тесту</a></li>
            <li class=""><a href="/pages/deletetest.php">Удалить тест</a></li>
          </ul>
      </div>
    </div>
    <div class="container">
			<ul class="breadcrumb">
			  <li><a href="#"><?php echo $workline['surname']." ".$workline['name'];?></a></li>
			  <li><a href="/pages/minetest.php">Мои тесты</a></li>
        <li class="active">Создать новый тест</li>
			</ul>
			<form role="form" method="post">
				<?php
				if (!empty($_POST["new_test"])) {
					$name_test=htmlspecialchars($_POST["name_test"]);
					$id_specialty=htmlspecialchars($_POST["id_specialty"]);
					$id_subject=htmlspecialchars($_POST["id_subject"]);
					$num_theme=htmlspecialchars($_POST["num_theme"]);
					$success = addThemeTest($id_subject,$name_test,$num_theme,$_SESSION["id_user"]);
					if (!$success) $alert="Ошибка при добавлении нового теста!";
						else $alert="Вы успешно добавили тест!";
						include "../block/alert.php";
				}
				?>
				  <div class="form-group">
				    <label for="nameTest"  class="col-lg-2 control-label">Тема теста</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="nameTest" placeholder="Введите название темы" name="name_test">
							</div>
					</div>
					<div class="form-group">
				    <label for="numTest"  class="col-lg-2 control-label">Номер темы</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="numTest" placeholder="Введите номер темы(числовое значение)" name="num_theme">
							</div>
					</div>
					<div class="form-group">
						<label for="select_but_new_test" class="col-lg-2 control-label">Специальность</label>
						<div class="col-lg-10">
							<select class="form-control" id="select_but_new_test" name="id_specialty">
								<?php
									$argTaacherChair = getAllTeacher_chair($_SESSION["id_user"]);
									$argSpecialty = getAllSpecialty($argTaacherChair["id_chair"]);
									for ($i=0; $i<count($argSpecialty); $i++){
										$id_institute = $argSpecialty[$i]["id_specialty"];
										$name = $argSpecialty[$i]["name_specialty"];
										echo "<option value='".$id_institute."'>".$name."</option>\n";
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="select_subject" class="col-lg-2 control-label">Предмет</label>
						<div class="col-lg-10">
							<select class="form-control" id="select_subject" name="id_subject">
							</select>
						</div>
					</div>
					<div class="form-group">
	      		<div class="col-lg-10 col-lg-offset-2">
							<input type="submit" name="new_test" value="Создать" class="btn btn-default">
						</div>
					</div>
			</form>
    </div>
    <?php require_once "../block/footer.php"; ?>
  </body>
</html>
