<?php require_once "../block/start.php"; ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href=".ico">
    <link rel="stylesheet" href="/css/font-awesome.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.css" media="screen" title="no title" charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php require_once "../block/header.php"; ?>
    <div class="content">

      <div class="container callbackform">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <h3>Обратная связь</h3>
            <div class="contact-form">
              <form id="contact-form" class="form-validate form-horizontal">
                <fieldset>
                  <legend>Напишите нам</legend>
                  <div class="form-group">
                    <div class="col-md-6 contact-name">
                      <label class="sr-only" for="inputName">Имя</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Имя">
                    </div>
                    <div class="col-md-6 contact-email">
                      <label class="sr-only" for="inputEmail">E-mail</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="E-mail">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label class="sr-only" for="inputSubject">Тема</label>
                        <input type="text" class="form-control" id="inputSubject" placeholder="Тема">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label class="sr-only" for="inputWrite">Сообщение</label>
                      <textarea class="form-control" rows="10" id="inputWrite" placeholder="Ваше сообщение"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12 col-md-6">
                      <div class="checkbox">
                        <label><input type="checkbox">Отправить копию сообщение Вам</label>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <button type="submit" class="btn btn-info pull-right">Отправить</button>
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
