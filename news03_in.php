<?php
  session_start();
  include("config.php");
  if($_SESSION['id'] != $id or $_SESSION['pw'] != $pw)
  {
    header("Location:index.php");
    exit();
  }
  $file = file($news_data);
  $count = 0;
  while($file[$count] != false)
  {
    $die = explode("\t",$file[$count]);
    if($die[0] == $_POST['select'])
    {
      $in_data = $in_data;
      $aya = $die;

    }else{
      $in_data = $in_data.$file[$count];
    }
    $count++;
  }
  $fp = fopen($news_data,"w");
  flock($fp,LOCK_EX);
  fwrite($fp,$in_data);
  flock($fp,LOCK_UN);
  fclose($fp);
?>

<!doctype html>
<html class="no-js" lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>削除｜新着情報CMS</title>
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

<body id="delete">
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
        <h2>新着情報削除</h2>
        <p class="notification success"><i class="fa fa-check-circle" aria-hidden="true"></i>以下の内容を削除しました。</p>
        <table class="general-form">
          <tr>
            <th abbr="com">日付</th>
            <td><?=$aya[2]?>年　<?=$aya[3]?>月　<?=$aya[4]?>日</td>
          </tr>
          <tr>
            <th abbr="ttl">タイトル</th>
            <td><?=$aya[5]?></td>
          </tr>
          <tr>
            <th abbr="add">掲載情報</th>
            <td><?=$aya[6]?></td>
          </tr>
          <tr>
            <th abbr="start1">リンクの有無</th>
            <td>
              <?php
                if($aya[7] == "0"){
              ?>
              リンクしない
              <?php
                }elseif($aya[7] == "1"){
              ?>
              現在のタブでリンクを開く
              <?php
                }elseif($aya[7] == "2"){
              ?>
              新規のタブでリンクを開く
              <?php
                }
              ?>
            </td>
          </tr>
          <tr>
            <th abbr="start2">リンク先URL</th>
            <td>
              <a href="<?=$_POST['url']?>" target="_blank">
              <?php
                if($aya[9] == "")
                {
                echo $aya[8];
                }else{
                echo $aya[9];
                }
              ?>
              </a>
            </td>
          </tr>
          <tr>
            <th abbr="mon">表示・非表示</th>
            <td>
            <?php
              if($aya[10] == 1){
            ?>
            表示
            <?php
              }elseif($aya[10] == 0){
            ?>
            非表示
            <?php
              }
            ?>
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
