<?php

  session_start();

  require_once("config.php");

  if (empty($_SESSION['id']))
  {
    header('Location:index.php?check=error');
    exit;
  }

  $input_date = date("Y年n月j日",time());
  $corr_data = $_POST['time']."\t".$input_date."\t".$_POST['year']."\t".$_POST['month']."\t".$_POST['day']."\t".$_POST['title']."\t".N_BR($_POST['info'])."\t".$_POST['link']."\t".$_POST['url']."\t".$_POST['url_text']."\t".$_POST['disp']."\n";
  $fp = fopen($news_data,"r");
  $size = filesize($news_data);

  if($size != 0)
  {
    $read = fread($fp,$size);
  }
  fclose($fp);
  if($_POST['rank'] == 1)
  {
    $in_data = $corr_data;
    $file = file($news_data);
    $count = 0;
    while($file[$count] != false)
    {
      $aya = explode("\t",$file[$count]);
      if($aya[0] == $_POST['time'])
      {
        $in_data = $in_data;
      }else{
        $in_data = $in_data.$file[$count];
      }
      $count++;
    }
  }elseif($_POST['rank'] == 2)
  {
    $file = file($news_data);
    $count = 0;
    while($file[$count] != false)
    {
      $aya = explode("\t",$file[$count]);
      if($aya[0] == $_POST['time'])
      {
        $in_data = $in_data.$corr_data;
      }else{
        $in_data = $in_data.$file[$count];
      }
      $count++;
    }
  }
  $fp = fopen($news_data,"w");
  flock($fp,LOCK_EX);
  fwrite($fp,$in_data);
  flock($fp,LOCK_UN);
  fclose($fp);
  $get_data = file($news_data);
  $count = 0;
  while($get_data[$count] != false)
  {
    $disp_data = explode("\t",$get_data[$count]);
    if($disp_data[0] == $_POST['time'])
    {
      $fin = $disp_data;
    }
    $count++;
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
      <!-- INPUT -->
      <div class="general-container">
        <h2>新着情報修正</h2>
        <p class="notification success"><i class="fa fa-check-circle" aria-hidden="true"></i>下記の内容で登録しました。</p>
        <table class="general-form">
          <tr>
            <th abbr="com">日付</th>
            <td><?=$fin[2]?>年　<?=$fin[3]?>月　<?=$fin[4]?>日</td>
          </tr>
          <tr>
            <th abbr="ttl">タイトル</th>
            <td><?=$fin[5]?></td>
          </tr>
          <tr>
            <th abbr="add">掲載情報</th>
            <td><?=$fin[6]?></td>
          </tr>
          <tr>
            <th abbr="start1">リンクの有無</th>
            <td>
              <?php if($fin[7] == "0"): ?>
              リンクしない
              <?php elseif($fin[7] == "1"): ?>
              現在のタブでリンクを開く
              <?php elseif($fin[7] == "2"): ?>
              新規のタブでリンクを開く
              <?php endif ?>
            </td>
          </tr>
          <tr>
            <th abbr="start2">リンク先URL</th>
            <td>
              <a href="<?=$_POST['url']?>" target="_blank">
                <?php
                  if($fin[9] == "")
                  {
                  echo $fin[8];
                  }else{
                  echo $fin[9];
                  }
                ?>
              </a>
            </td>
          </tr>
          <tr>
            <th abbr="mon">表示・非表示</th>
            <td>
              <?php if($fin[10] == 1): ?>
              表示
              <?php elseif($fin[10] == 0): ?>
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
