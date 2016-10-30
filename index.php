<!doctype html>
<html class="no-js" lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>新着情報CMS</title>
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

<body id="top">
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
  <article class="contents-container">
    <!-- LOGIN -->
    <section class="login-container">
      <h2>新着情報CMSログイン</h2>
      <form action="news01.php" method="post">
        <?php
          if($_GET['check'] == "error")
          {
        ?>
        <p class="notification error"><i class="fa fa-times-circle" aria-hidden="true"></i>ログインIDまたはパスワードが違います。</p>
        <?php
          }else{
        ?>
        <p class="notification notice"><i class="fa fa-info-circle"></i>情報を更新するためには、下記よりログインが必要です。</p>
        <?php
          }
        ?>
        <input name="id" type="text" placeholder="ログインID">
        <input name="pw" type="password" placeholder="パスワード">
        <button type="submit">ログイン</button>
      </form>
    </section>
    <!-- END LOGIN -->
  </article>
  <!-- END CONTENTS -->

  <!-- FOOTER -->
  <footer id="footer">
    <p>Copyright (c) 2016 ___ All Rights Reserved.</p>
  </footer>
  <!-- END FOOTER -->

  <!-- SCRIPTS -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
  <script src="js/jquery.footerFixed.js"></script>
  <!-- END SCRIPTS -->
</body>

</html>
