<?php require_once "../block/start.php"; ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href=".ico">
    <link rel="stylesheet" href="/css/font-awesome.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.css" media="screen" title="no title" charset="utf-8">
    <title>Обратная связь</title>
  </head>
  <body>
    <?php require_once "../block/header.php"; ?>
    <div class="content">

      <div class="container callbackform">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <h3>Обратная связь</h3>
            <div class="contact-form">
              <form id="contact-form" class="form-validate form-horizontal" method="post">
                <?php
                if (!empty($_POST["btn_mail"])) {
                	$name=htmlspecialchars($_POST["name"]);
                	$email=htmlspecialchars($_POST["email"]);
                	$theme=htmlspecialchars($_POST["theme"]);
                	$message=htmlspecialchars($_POST["message"]);
                	$copy=($_POST["copy"]);
                  $subject=$name.$theme;
                  $to;
                  if(!empty($copy)){
                    $to  = 'ivansmirnov63@gmail.com' . ', '; // обратите внимание на запятую
                    $to .= $email;
                  }else{
                    $to = $email;
                  }
                  $success = mail($to, $subject, $message);
                	if (!$success) $alert="Ошибка при отпраление письма, проверьте правильность написание данных!";
                		else $alert="Вы успешно отправили сообщение, мы вам обязательно ответим!";
                		include "../block/alert.php";
                } ?>
                <fieldset>
                  <legend>Напишите нам</legend>
                  <div class="form-group">
                    <div class="col-md-6 contact-name">
                      <label class="sr-only" for="inputName">Имя</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Имя" name="name">
                    </div>
                    <div class="col-md-6 contact-email">
                      <label class="sr-only" for="inputEmail">E-mail</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="E-mail" name="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label class="sr-only" for="inputSubject">Тема</label>
                        <input type="text" class="form-control" id="inputSubject" placeholder="Тема" name="theme">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label class="sr-only" for="inputWrite">Сообщение</label>
                      <textarea class="form-control" rows="10" id="inputWrite" placeholder="Ваше сообщение" name="message"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12 col-md-6">
                      <div class="checkbox">
                        <label><input type="checkbox" name="copy">Отправить копию сообщение Вам</label>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <input type="submit" name="btn_mail" value="Отправить" class="btn btn-info pull-right">
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>


    </div>
    <?php require_once "../block/footer.php"; ?>
  </body>
</html>
