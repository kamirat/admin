<?php

  session_start();

  require_once("config.php");

  if (empty($_SESSION['id']))
  {
    header('Location:index.php?check=error');
    exit;
  }


  $get_data = file($news_data);
  $count = 0;
  while($get_data[$count] != false)
  {
    $data = explode("\t",$get_data[$count]);
    if($data[0] == $_POST['select'])
    {
      $select_data = $data;
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
      <div class="general-container clearfix">
        <h2>新着情報修正</h2>
        <form method="post" action="news02_conf.php">
          <table class="general-form">
            <tr>
              <th abbr="com">日付</th>
              <td>
                <input name="time" type="hidden" value="<?=$select_data[0]?>">
                <?php
                  $year = date("Y",time());
                  $month = date("n",time());
                  $day = date("j",time());
                ?>
                <select name="year">
                  <option value="<?=$year-1?>"<?php if($year-1 == $select_data[2]){ echo " selected"; } ?>><?=$year-1?></option>
                  <option value="<?=$year?>"<?php if($year == $select_data[2]){ echo " selected"; } ?>><?=$year?></option>
                  <option value="<?=$year+1?>"<?php if($year+1 == $select_data[2]){ echo " selected"; } ?>><?=$year+1?></option>
                </select>年
                <select name="month">
                  <?php
                    $count = 1;
                    while($count != 13)
                    {
                    if($count == $select_data[3])
                    {
                  ?>
                  <option value="<?=$count?>" selected="selected"><?=$count?></option>
                  <?php
                    }else{
                  ?>
                  <option value="<?=$count?>"><?=$count?></option>
                  <?php
                    }
                    $count++;
                    }
                  ?>
                </select>月
                <select name="day">
                  <?php
                    $count = 1;
                    while($count != 32)
                    {
                    if($count == $select_data[4])
                    {
                  ?>
                  <option value="<?=$count?>" selected="selected"><?=$count?></option>
                  <?php
                    }else{
                  ?>
                  <option value="<?=$count?>"><?=$count?></option>
                  <?php
                    }
                    $count++;
                    }
                  ?>
                </select>日
              </td>
            </tr>
            <tr>
              <th abbr="ttl">タイトル</th>
              <td><input class="input-general" name="title" type="text" value="<?=$select_data[5]?>"></td>
            </tr>
            <tr>
              <th abbr="add">掲載情報</th>
              <td><textarea name="info"><?=BR_N($select_data[6])?></textarea></td>
            </tr>
            <tr>
              <th abbr="start1">リンクの有無</th>
              <td>
                <input id="link-01" class="input-radio" name="link" type="radio" value="0"<?php if($select_data[7] == 0){ echo " checked"; } ?>><label for="link-01">リンクしない</label><br>
                <input id="link-02" class="input-radio" name="link" type="radio" value="1"<?php if($select_data[7] == 1){ echo " checked"; } ?>><label for="link-02">現在のタブでリンクを開く</label><br>
                <input id="link-03" class="input-radio" name="link" type="radio" value="2"<?php if($select_data[7] == 2){ echo " checked"; } ?>><label for="link-03">新規のタブでリンクを開く</label>
              </td>
            </tr>
            <tr>
              <th abbr="start2">リンク先URL</th>
              <td>
                <input class="input-general" name="url" type="text" id="url" value="<?=$select_data[8]?>">
                <input name="url_text" type="hidden" id="url" value="">
              </td>
            </tr>
            <tr>
              <th abbr="mon">表示・非表示</th>
              <td>
                <input id="disp-01" class="input-radio" type=radio value=1 name=disp<?php if($select_data[10] == 1){ echo " checked"; } ?>><label for="disp-01">表示</label><br>
                <input id="disp-02" class="input-radio" type=radio value=0 name=disp<?php if($select_data[10] == 0){ echo " checked"; } ?>><label for="disp-02">非表示</label>
              </td>
            </tr>
            <tr>
              <th abbr="mon">表示順位</th>
              <td>
                <input id="rank-01" class="input-radio" name="rank" type="radio" value="2" checked><label for="rank-01">表示順位はそのままにする</label><br>
                <input id="rank-02" class="input-radio" name="rank" type="radio" value="1"><label for="rank-02">表示順位を一番上に変更する</label>
              </td>
            </tr>
          </table>
          <p class="notification warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>管理画面より登録する情報は、「表示」が選択されている場合、登録と同時にホームページに情報が反映されますので、情報に誤りのないように十分ご確認の上ご登録ください。</p>
          <button class="return-button-alt" type="button" onClick="history.back()">戻って修正する</button>
          <button class="submit-button-alt" name="submit" type="submit">登録情報の確認画面へ</button>
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
