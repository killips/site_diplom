<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Pass Test</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav mynav">
        <li><a href="/index.php">Главная<span class="sr-only">(current)</span></a></li>
        <li><a href="/pages/test.php">Тесты</a></li>
      <?php if(isset($_SESSION["id_user"])) echo "  <li class='dropdown'>
          <a href='' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>".$_SESSION["surname"]."  ".$_SESSION["name"]."<span class='caret'></span></a>
          <ul class='dropdown-menu' role='menu'>
            <li><a href='/pages/office.php'>Личный кабинет</a></li>
            <li class='divider'></li>
            <li><a href='/pages/minetest.php'>Мои тесты</a></li>
          </ul>
        </li>" ?>
        <li><a href="/pages/ourcontact.php">Контакты</a></li>
      </ul>
      <!--<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Название теста">
        </div>
        <button type="submit" class="btn btn-default">Поиск теста</button>
      </form>-->
      <?php if(!isset($_SESSION["id_user"])){
      echo "<ul class='nav navbar-nav navbar-right'>
              <li><a href='#' data-toggle='modal' data-target='#openModalAuth'><i class='fa fa-sign-in'></i></a></li>
              <li><a href='#' data-toggle='modal' data-target='#openModalReg'><i class='fa fa-plus-circle'></i></a></li>
            </ul>";
          }else{
            if($_SERVER['SCRIPT_NAME']=="/index.php")
      echo  "<ul class='nav navbar-nav navbar-right'>
                    <li><a href='block/logout.php'><i class='fa fa-sign-out'></i></a></li>
            </ul>";
            else
      echo "<ul class='nav navbar-nav navbar-right'>
                    <li><a href='../block/logout.php'><i class='fa fa-sign-out'></i></a></li>
            </ul>";
          }?>
    </div>
  </div>
</nav>


<div class="modal fade" id="openModalReg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Регистрация</h4>
      </div>
      <div class="modal-body">
        <?php
        if (!empty($_POST["button_reg"])) {
          //echo $_POST["email"]." ".$_POST["nick_name"]." ".$_POST["password_1"]." ".$_POST["password_2"];
          $email=htmlspecialchars($_POST["email"]);
          $nick_name=htmlspecialchars($_POST["nick_name"]);
          $password_1=htmlspecialchars($_POST["password_1"]);
          $password_2=htmlspecialchars($_POST["password_2"]);
          $name=htmlspecialchars($_POST["name"]);
          $surname=htmlspecialchars($_POST["surname"]);
          if (strlen($email)<3) $success=false;
            elseif (strlen($password_1) <3) $success=false;
            elseif ($password_1 != $password_2) $success=false;
            else $success=newUser($email,$nick_name,md5($password_1),$name,$surname);
          if (!$success) $alert="Ошибка при регистрации пользователя!";
            else $alert="Вы успешно зарегистрировались!";
          if($_SERVER['SCRIPT_NAME']=="/pages/test.php"){
            include "../block/alert.php";
          }else{
            include "/block/alert.php";
          }
        }
        ?>
        <form class="form-horizontal" method="POST" action="">
          <fieldset>
            <div class="form-group">
              <label for="inputNick" class="col-lg-2 control-label">Ник</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputNick" placeholder="Ник" name="nick_name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-lg-2 control-label">Имя</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputName" placeholder="Имя" name="name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputSurname" class="col-lg-2 control-label">Фамилия</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputEmail" placeholder="Фамилия" name="surname">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">Email</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label">Пароль</label>
              <div class="col-lg-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Пароль" name="password_1">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label">Повторите пароль</label>
              <div class="col-lg-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Повторите пароль" name="password_2">
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <input type="submit" class="btn btn-primary" value="Регистрация" name="button_reg">
              </div>
            </div>
          </fieldset>
        </form>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="openModalAuth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Вход</h4>
      </div>
      <div class="modal-body">

        <?php
          if($_SESSION["error_auth"]){
            unset($_SESSION["error_auth"]);
            $alert="Неверный e-mail и/или пароль:";
            include "../block/alert.php";
          }
          ?>

        <form class="form-horizontal" method="POST" action="<?php if($_SERVER['SCRIPT_NAME']=="/index.php") echo "block/auth.php"; else echo "../block/auth.php"; ?>">
          <fieldset>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">Логин</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputEmail" placeholder="Ник или email" name="nick">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label">Пароль</label>
              <div class="col-lg-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Пароль" name="password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <input type="submit" class="btn btn-primary" value="Вход" name="button_auth">
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
