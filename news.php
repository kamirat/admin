<!doctype html>
<html class="no-js" lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>新着情報</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/contents.css">
</head>

<body id="news">
  <div class="news-container">
    <?php
      include("config.php");
      $result = file("data/news.dat");
      if($result[0] != false)
      {
      $count = 0;
      while($result[$count] != false)
      {
      $disp = explode("\t",$result[$count]);
      if($disp[10] == 1)
      {
    ?>
    <?php
      if($disp[7] == 1)
      {
    ?>
    <div class="news-inner-alt clearfix">
      <p><span class="news-date"><?=$disp[2]?>.<?=$disp[3]?>.<?=$disp[4]?></span><span class="news-title"><?=$disp[5]?></span></p>
      <p class="news-contents">
        <a href="<?=$disp[8]?>" target="_top"><?=N_BR($disp[6])?></a>
      </p>
    </div>
    <?php
      }elseif($disp[7] == 2)
      {
    ?>
    <div class="news-inner-alt clearfix">
      <p><span class="news-date"><?=$disp[2]?>.<?=$disp[3]?>.<?=$disp[4]?></span><span class="news-title"><?=$disp[5]?></span></p>
      <p class="news-contents">
        <a href="<?=$disp[8]?>" target="_blank"><?=N_BR($disp[6])?></a>
      </p>
    </div>
    <?php
      }else{
    ?>
    <div class="news-inner-alt clearfix">
      <p><span class="news-date"><?=$disp[2]?>.<?=$disp[3]?>.<?=$disp[4]?></span><span class="news-title"><?=$disp[5]?></span></p>
      <p class="news-contents"><?=N_BR($disp[6])?></p>
    </div>
    <?php
      }
      }
      $count++;
      }
      }else{
    ?>
    <div class="news-inner-alt">
      <p class="news-empty">現在お知らせする情報はございません。</p>
    </div>
    <?php
      }
    ?>
  </div>
</body>

</html>
