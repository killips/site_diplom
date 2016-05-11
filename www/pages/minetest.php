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
            <li class="active"><a href="#">Моих тестов:<span class="badge"><?php echo count($arg);?></span></a></li>
            <li><a href="/pages/newtest.php">Создать новый тест</a></li>
						<li><a href="/pages/newquestiontest.php">Добавить вопрос к тесту</a></li>
            <li><a href="/pages/deletetest.php">Удалить тест</a></li>
          </ul>
      </div>
    </div>
    <div class="container">

			<ul class="breadcrumb">
			  <li><a href="#"><?php echo $workline['surname']." ".$workline['name'];?></a></li>
			  <li class="active">Мои тесты</li>
			</ul>

			<table class="table table-responsive table-striped ">
				<thead>
					<tr>
						<th>Название</th>
						<th width="120px">Направление</th>
						<th>Дисциплина</th>
						<th>Автор</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for ($i=0; $i<count($arg); $i++){
						$name_author=getAllUser($arg[$i]["id_author"]);
						include "tableTest.php";
					}
					?>
					<!--<tr id_test="1">
						<td class="click_test">Тестовые задания для комплекстной контрольной</td>
						<td class="click_test">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae rerum voluptatem magnam dolore animi sunt ut sequi molestiae, commodi, inventore quidem aliquid labore eligendi similique explicabo aspernatur unde voluptates fuga!</td>
						<td class="click_test tdcenter">09.03.01</td>
						<td class="click_test">Архитектура вычислительных машин</td>
						<td class="click_test">Волкова Т.В.</td>
						<td class="click_test tdcenter">20</td>
					</tr>
					<tr id_test="2">
						<td class="click_test">Тестовые задания для комплекстной контрольной</td>
						<td class="click_test">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae rerum voluptatem magnam dolore animi sunt ut sequi molestiae, commodi, inventore quidem aliquid labore eligendi similique explicabo aspernatur unde voluptates fuga!</td>
						<td class="click_test tdcenter">09.03.01</td>
						<td class="click_test">Архитектура вычислительных машин</td>
						<td class="click_test">Волкова Т.В.</td>
						<td class="click_test tdcenter">20</td>
					</tr>-->
				</tbody>
			</table>


    </div>
    <?php require_once "../block/footer.php"; ?>
  </body>
</html>
