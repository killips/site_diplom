<?php require_once "../block/start.php";
	if(isset($_SESSION['id_user'])==false){
		header("Location: /index.php");
		exit;
	}
global $workarg;
$workarg = getTeacherChair($_SESSION["id_user"]);
global $argChair;
$argChair = getChair($workarg["id_chair"]);
global $workline;
$workline = getAllUser($_SESSION['id_user']);
if (!empty($_POST["btn_all_data"])) {
	$name=htmlspecialchars($_POST["name"]);
	$lastname=htmlspecialchars($_POST["lastname"]);
	$surname=htmlspecialchars($_POST["surname"]);
	$science_degree=htmlspecialchars($_POST["science_degree"]);
	$academic_rank=htmlspecialchars($_POST["academic_rank"]);
	$position=htmlspecialchars($_POST["position"]);
	$id_chair=htmlspecialchars($_POST["id_chair"]);
	$lol = allData($_SESSION["id_user"], $name, $lastname, $surname, $science_degree, $academic_rank, $id_chair, $position, $argChair["id_faculty"]);
}
$workarg = getTeacherChair($_SESSION["id_user"]);
$argChair = getChair($workarg["id_chair"]);
$workline = getAllUser($_SESSION['id_user']);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href=".ico">
    <link rel="stylesheet" href="/css/font-awesome.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.css" media="screen" title="no title" charset="utf-8">
    <title>Личный кабинет <?php echo $workline['surname']." ".$workline['name']; ?></title>
  </head>
  <body>
    <?php require_once "../block/header.php"; ?>
    <div class="container">

			<ul class="breadcrumb">
			  <li><a href="#"><?php echo $workline['surname']." ".$workline['name'];?></a></li>
			  <li class="active">Личный кабинет</li>
			</ul>

			<form class="form-horizontal" action="" method="POST">
				<fieldset>
					<legend>Здравствуйте <?php echo $workline['name']; ?></legend>
					<div class="form-group">
						<label for="inoutputName" class="col-lg-2 control-label">Имя</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="inoutputName" name="name" placeholder="Имя" value="<?php echo $workline['name'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inoutputSurname" class="col-lg-2 control-label">Фамилия</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="inoutputSurname" placeholder="Фамилия" name="surname" value="<?php echo $workline['surname'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inoutputLastname" class="col-lg-2 control-label">Отчество</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="inoutputLastname" placeholder="Отчество" name="lastname" value="<?php echo $workline['lastname'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inoutputScience_degree" class="col-lg-2 control-label">Научная степень</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="inoutputScience_degree" placeholder="Научная степень" name="science_degree" value="<?php echo $workline['science_degree'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inoutputAcademic_rank" class="col-lg-2 control-label">Ученое звание</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="inoutputAcademic_rank" placeholder="Ученое звание" name="academic_rank" value="<?php echo $workline['academic_rank'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inoutputPosition" class="col-lg-2 control-label">Должность</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="inoutputPosition" placeholder="Должность" name="position" value="<?php echo $workarg["position"]; ?>">
						</div>
					</div>


					<div class="form-group">
						<label for="select_but1" class="col-lg-2 control-label">Университет/Институт</label>
						<div class="col-lg-10">
							<select class="form-control" id="select_but1" name="id_institute">
								<?php $argUniversity = getAllUniversity();
									for ($i=0; $i<count($argUniversity); $i++){
										$id_institute = $argUniversity[$i]["id_institute"];
										$name = $argUniversity[$i]["name"];
										if($argChair["id_faculty"]!=$id_institute)
										echo "<option value='".$id_institute."'>".$name."</option>\n";
										else	echo "<option value='".$id_institute."' selected >".$name."</option>\n";
									}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="select_chair" class="col-lg-2 control-label">Кафедра/Факультет</label>
						<div class="col-lg-10">
							<select class="form-control" id="select_chair" name="id_chair">
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<input type="submit" class="btn btn-primary" value="Сохранить" name="btn_all_data">
						</div>
					</div>
				</fieldset>
			</form>
    </div>
    <?php require_once "../block/footer.php"; ?>
  </body>
</html>
