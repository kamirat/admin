<?php
  session_start();
  include("config.php");
  if($_SESSION['id'] != $id or $_SESSION['pw'] != $pw)
  {
    header("Location:index.php");
    exit();
  }
  $get_data = file($news_data);
?>

<!doctype html>
<html class="no-js" lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>修正｜新着情報CMS</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/contents.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Quicksand:300,400,700">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
  <![endif]-->
</head>

<body id="modify">
  <!-- HEADER -->
  <header id="header">
    <div class="header-container clearfix">
      <h1>新着情報CMS</h1>
      <nav class="header-navigation clearfix">
        <a href="./"><i class="fa fa-home"></i>新着情報CMSトップへ戻る</a>
        <a href="../"><i class="fa fa-building"></i>ウェブサイトへ戻る</a>
      </nav>
    </div>
  </header>
  <!-- END HEADER -->

  <!-- CONTENTS -->
  <article class="contents-container clearfix">
    <!-- SIDE NAVIGATION -->
    <aside class="side-navigation">
      <!-- NEWS NAVIGATION -->
      <div class="news-navigation">
        <h3><i class="fa fa-bullhorn" aria-hidden="true"></i>新着情報</h3>
        <ul>
          <li><a href="news01.php">登　録<span>Input</span></a></li>
          <li><a href="news02.php">修　正<span>Modify</span></a></li>
          <li><a href="news03.php">削　除<span>Delete</span></a></li>
        </ul>
      </div>
      <!-- END NEWS NAVIGATION -->
    </aside>
    <!-- END SIDE NAVIGATION -->

    <!-- MAIN CONTENTS -->
    <section class="contents-inner">
      <!-- INPUT -->
      <div class="general-container">
        <h2>新着情報修正</h2>
        <p class="notification notice"><i class="fa fa-info-circle"></i>一覧より修正する新着情報にチェックをして「登録情報の修正画面へ」ボタンを押してください。</p>
        <form method="post" action="news02_form.php">
          <table class="general-alt-form">
            <tr>
              <th></th>
              <th>日付</th>
              <th>タイトル</th>
            </tr>
            <?php
              $kara = 0;
              if($get_data[0] == false)
              {
              $kara = 1;
            ?>
            <tr>
              <td colspan="3">
                <p class="error-message-alt"><i class="fa fa-times-circle" aria-hidden="true"></i>現在情報は登録されていません</p>
              </td>
            </tr>
            <?php
              }else{
              $count = 0;
              while($get_data[$count] != false)
              {
              $data = explode("\t",$get_data[$count]);
            ?>
            <tr>
              <td><input class="input-general" name="select" type="radio" value="<?=$data[0]?>"></td>
              <td><?=$data[2]?>年　<?=$data[3]?>月　<?=$data[4]?>日</td>
              <td><?=$data[5]?></td>
            </tr>
            <?php
              $count++;
              }
              }
            ?>
          </table>
          <?php
            if($kara == 0)
            {
          ?>
          <button class="submit-button" name="submit" type="submit">登録情報の修正画面へ</button>
          <?php
            }
          ?>
        </form>
      </div>
    </section>
    <!-- END MAIN CONTENTS -->
  </article>
  <!-- END CONTENTS -->

  <!-- FOOTER -->
  <footer id="footer">
    <p>Copyright (c) 2016 一般社団法人 安寿 All Rights Reserved.</p>
  </footer>
  <!-- END FOOTER -->

  <!-- SCRIPTS -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
  <script src="js/jquery.footerFixed.js"></script>
  <!-- END SCRIPTS -->
</body>

</html>
