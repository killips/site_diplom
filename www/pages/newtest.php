<?php require_once "../block/start.php";
	if(isset($_SESSION['id_user'])==false){
		header("Location: /index.php");
		exit;
	}
	global $arg;
	$arg = selectTest();
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
            <li class="active"><a href="/pages/minetest.php">Моих тестов:<span class="badge"><?php echo count($arg);?></span></a></li>
            <li><a href="/pages/newtest.php">Создать новый тест</a></li>
            <li class=""><a href="#">Удалить тест</a></li>
          </ul>
      </div>
    </div>
    <div class="container">

			<ul class="breadcrumb">
			  <li><a href="#"><?php echo $workline['surname']." ".$workline['name'];?></a></li>
			  <li><a href="/pages/minetest.php">Мои тесты</a></li>
        <li class="active">Создать новый тест</li>
			</ul>


    </div>
    <?php require_once "../block/footer.php"; ?>
  </body>
</html>
