<?php
  session_start();
  include("config.php");
  if($_SESSION['id'] != $id or $_SESSION['pw'] != $pw)
  {
    header("Location:index.php");
    exit();
  }
  $title = 0;
  $info = 0;
  $link = 0;
  if($_POST['title'] == "")
  {
    $title = 1;
  }
  if($_POST['info'] == "")
  {
    $info = 1;
  }
  if($_POST['link'] == 1 and $_POST['url'] == "")
  {
    $link = 1;
  }elseif($_POST['link'] == 2 and $_POST['url'] == "")
  {
    $link = 1;
  }
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
      <?php
        if($info == 0 and $link == 0)
        {
      ?>
      <form method="post" action="news02_in.php">
      <?php
        }else{
      ?>
      <form method="post" action="news02_conf.php">
      <?php
        }
      ?>
        <div class="general-container clearfix">
          <h2>新着情報修正</h2>
          <input type="hidden" name="time" value="<?=$_POST['time']?>">
          <?php
            if($info == 0 and $link == 0)
            {
          ?>
          <p class="notification notice"><i class="fa fa-question-circle" aria-hidden="true"></i>下記の内容で登録してもよろしいですか？</p>
          <?php
            }else{
          ?>
          <p class="notification error"><i class="fa fa-times-circle" aria-hidden="true"></i>必要な内容が入力されていません。</p>
          <?php
            }
          ?>
          <table class="general-form">
            <tr>
              <th abbr="com">日付</th>
              <td>
                <?=$_POST['year']?>年　<?=$_POST['month']?>月　<?=$_POST['day']?>日
                <input name="year" type="hidden" value="<?=$_POST['year']?>">
                <input name="month" type="hidden" value="<?=$_POST['month']?>">
                <input name="day" type="hidden" value="<?=$_POST['day']?>">
              </td>
            </tr>
            <tr>
              <th abbr="ttl">タイトル</th>
              <?php
                if($title == 0)
                {
              ?>
              <td><?=N_BR($_POST['title'])?><input name="title" type="hidden" value="<?=$_POST['title']?>"></td>
              <?php
                }else{
              ?>
              <td>
                <p class="error-message"><i class="fa fa-times-circle" aria-hidden="true"></i>タイトルを入力してください。</p>
                <input class="input-general" name="title" type="text">
                <?php
                  }
                ?>
              </td>
            </tr>
            <tr>
              <th abbr="add">掲載情報</th>
              <?php
                if($info == 0)
                {
              ?>
              <td><?=N_BR($_POST['info'])?><input name="info" type="hidden" value="<?=$_POST['info']?>"></td>
              <?php
                }else{
              ?>
              <td>
                <p class="error-message"><i class="fa fa-times-circle" aria-hidden="true"></i>掲載情報を入力してください。</p>
                <textarea name="info"></textarea>
                <?php
                  }
                ?>
              </td>
            </tr>
            <tr>
              <?php
                if($link == 0)
                {
              ?>
              <th abbr="start1">リンクの有無</th>
              <td>
                <?php
                  if($_POST['link'] == "0"){
                ?>
                リンクしない
                <?php
                  }elseif($_POST['link'] == "1"){
                ?>
                現在のタブでリンクを開く
                <?php
                  }elseif($_POST['link'] == "2"){
                ?>
                新規のタブでリンクを開く
                <?php
                  }
                ?>
                <input name="link" type="hidden" value="<?=$_POST['link']?>">
              </td>
            </tr>
            <tr>
              <th abbr="start2">リンク先URL</th>
              <td>
                <a href="<?=$_POST['url']?>" target="_blank">
                <?php
                  if($_POST['url_text'] == "")
                  {
                  echo $_POST['url'];
                  }else{
                  echo $_POST['url_text'];
                  }
                ?>
              </a><input type="hidden" name="url" value="<?=$_POST['url']?>"><input type="hidden" name="url_text" value="<?=$_POST['url_text']?>">
              </td>
            </tr>
            <?php
              }else{
            ?>
            <tr>
              <th abbr="start1">リンクの有無</th>
              <td>
                <?php
                  if($_POST['link'] == 0)
                  {
                  $checked1 = " checked";
                  }elseif($_POST['link'] == 1){
                  $checked2 = " checked";
                  }elseif($_POST['link'] == 2){
                  $checked3 = " checked";
                  }
                ?>
                <input id="link-01" class="input-radio" name="link" type="radio" value="0"<?=$checked1?>>
                <label for="link-01">リンクしない</label><br>
                <input id="link-02" class="input-radio" name="link" type="radio" value="1"<?=$checked2?>>
                <label for="link-02">現在のタブでリンクを開く</label><br>
                <input id="link-03" class="input-radio" name="link" type="radio" value="2"<?=$checked3?>>
                <label for="link-03">新規のタブでリンクを開く</label>
              </td>
            </tr>
            <tr>
              <th abbr="start2">リンク先URL</th>
              <td>
                <p class="error-message"><i class="fa fa-times-circle" aria-hidden="true"></i>リンク先URLを入力してください。</p>
                <input id="url" class="input-general" name="url" type="text">
                <input id="url" name="url_text" type="hidden">
              </td>
            </tr>
            <?php
            }
            ?>
            <tr>
              <th abbr="mon">表示・非表示</th>
              <td>
                <?php
                  if($_POST['disp'] == "1"){
                ?>
                表示
                <?php
                  }elseif($_POST['disp'] == "0"){
                ?>
                非表示
                <?php
                  }
                ?>
                <input name="disp" type="hidden" value="<?=$_POST['disp']?>">
              </td>
            </tr>
            <tr>
              <th abbr="mon">表示順位</th>
              <td>
                <?php
                  if($_POST['rank'] == 1){
                ?>
                表示順位を一番上に変更する
                <?php
                  }elseif($_POST['rank'] == 2){
                ?>
                表示順位はそのままにする
                <?php
                  }
                ?>
                <input name="rank" type="hidden" value="<?=$_POST['rank']?>">
              </td>
            </tr>
          </table>
          <p class="notification warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>管理画面より登録する情報は、「表示」が選択されている場合、登録と同時にホームページに情報が反映されますので、情報に誤りのないように十分ご確認の上ご登録ください。</p>
          <?php
            if($info == 0 and $link == 0){
          ?>
          <button class="return-button-alt" type="button" onClick="history.back()">戻って修正する</button>
          <button class="submit-button-alt" name="submit" type="submit">以上の内容で登録する</button>
          <?php
            }else{
          ?>
          <button class="return-button" type="button" onClick="history.back()">戻って修正する</button>
          <?php
            }
          ?>
        </div>
      </form>
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
