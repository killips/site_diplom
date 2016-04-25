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
      require_once "../block/header.php";
      global $arg;
      $arg = selectTest();
    ?>
    <section>
      <div class="content">
        <div class="container">
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
      </div>
    </section>
    <?php require_once "../block/footer.php"; ?>
  </body>
</html>
