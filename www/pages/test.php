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
            //  if (isset($_GET['id'])) {
            //    $article = getArticle((int)$_GET["id"]);
            //    require_once "../blocks/full_article.php";
            //  }else require_once "../blocks/list_articles.php";s
              ?>

              <?php
              for ($i=0; $i<count($arg); $i++){
                $name_author=getAllUser($arg[$i]["id_author"]);
                include "tableTest.php";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <?php require_once "../block/footer.php"; ?>
  </body>
</html>
