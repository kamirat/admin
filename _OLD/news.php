<!doctype html>
<html class="no-js" lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>新着情報</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <style>
    body{
      background-color: transparent;
    }
    #news{
      background-color: #f5f5f5;
    }
    #news .news-inner {
      width: 100%;
/*      height: 500px;*/
      overflow: auto;
    }
    #news .news-inner-alt {
      width: 100%;
/*      padding: 25px;*/
      color: #666;
      font-family: "Hiragino Kaku Gothic ProN", Meiryo, Roboto, sans-serif;
      font-size: 12px;
      line-height: 1.5;
    }
    #news .news-inner-alt:not(:last-child) {
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px dotted #c8c8c8;
    }
    #news .news-title {
      margin-bottom: 5px;
      font-size: 14px;
      font-weight: normal;
      text-align: left;
    }
    #news .news-date {
      margin-right: 10px;
      margin-bottom: 10px;
      color: #969696;
      font-weight: bold;
    }

    #news .news-contents {
      text-align: justify;
    }
    #news .news-contents a {
      color: #000;
    }
    #news .news-contents a:hover {
      text-decoration: underline;
    }
    #news .news-empty {
      width: 100%;
      text-align: center;
    }
    /*----- CLEARFIX -----*/
    .clearfix:after {
      content: "";
      clear: both;
      display: block;
    }
  </style>
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
