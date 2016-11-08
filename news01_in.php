<?php

  session_start();

  require_once("config.php");

  if (empty($_SESSION['id']))
  {
    header('Location:index.php?check=error');
    exit;
  }


  $input_date = date("Y年n月j日",time());
  $input_time = time();
  $in_data = $input_time."\t".$input_date."\t".$_POST['year']."\t".$_POST['month']."\t".$_POST['day']."\t".$_POST['title']."\t".N_BR($_POST['info'])."\t".$_POST['link']."\t".$_POST['url']."\t".$_POST['url_text']."\t".$_POST['disp']."\n";
  $fp = fopen($news_data,"r");
  $size = filesize($news_data);
  if($size != 0)
  {
    $read = fread($fp,$size);
  }
  fclose($fp);
  $in_data = $in_data.$read;
  $fp = fopen($news_data,"w");
  flock($fp,LOCK_EX);
  fwrite($fp,$in_data);
  flock($fp,LOCK_UN);
  fclose($fp);
  $get_data = file($news_data);
  $data = explode("\t",$get_data[0]);
?>

<!doctype html>
<html class="no-js" lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>登録｜新着情報CMS</title>
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

<body id="input">
  <!-- HEADER -->
  <header id="header">
    <div class="header-container clearfix">
      <h1>新着情報CMS</h1>
      <nav class="header-navigation clearfix">
        <a href="./logout.php"><i class="fa fa-home"></i>ログアウト</a>
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
      <div class="general-container">
        <h2>新着情報登録</h2>
        <p class="notification success"><i class="fa fa-check-circle" aria-hidden="true"></i>下記の内容で登録しました。</p>
        <table class="general-form">
          <tr>
            <th>日付</th>
            <td><?=$data[2]?>年　<?=$data[3]?>月　<?=$data[4]?>日</td>
          </tr>
          <tr>
            <th>タイトル</th>
            <td><?=$data[5]?></td>
          </tr>
          <tr>
            <th>掲載情報</th>
            <td><?=$data[6]?></td>
          </tr>
          <tr>
            <th>リンクの有無</th>
            <td>
              <?php
                if($data[7] == "0"){
              ?>
              リンクしない
              <?php
                }elseif($data[7] == "1"){
              ?>
              現在のタブでリンクを開く
              <?php
                }elseif($data[7] == "2"){
              ?>
              新規のタブでリンクを開く
              <?php
                }
              ?>
            </td>
          </tr>
          <tr>
            <th>リンク先URL</th>
            <td>
              <a href="<?=$_POST['url']?>" target="_blank">
                <?php
                  if($data[9] == "")
                  {
                  echo $data[8];
                  }else{
                  echo $data[9];
                  }
                ?>
              </a>
            </td>
          </tr>
          <tr>
            <th>表示・非表示</th>
            <td>
              <?php if($data[10] == 1): ?>
              表示
              <?php else: ?>
              非表示
              <?php endif ?>
            </td>
          </tr>
        </table>
      </div>
    </section>
    <!-- END MAIN CONTENTS -->
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
