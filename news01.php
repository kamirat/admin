<?php
  session_start();

  require_once("config.php");

  if(($_POST['id'] == "" or $_POST['pw'] == "") and ($_SESSION['id'] == "" or $_SESSION['pw'] == ""))
  {
    header("Location:index.php?check=error");
    exit();
  }

  elseif(($_POST['id'] != "" and $_POST['pw'] != "") and ($_POST['id'] != $id or $_POST['pw'] != $pw))
  {
    header("Location:index.php?check=error");
    exit();

  }elseif(($_SESSION['id'] != "" and $_SESSION['pw'] != "") and ($_SESSION['id'] != $id or $_SESSION['pw'] != $pw))
  {
    header("Location:index.php?check=error");
    exit();
  }else{
    if(($_POST['id'] != "" or $_POST['pw'] != "") and ($_POST['id'] == $id or $_POST['pw'] == $pw))
    {
      $_SESSION['id'] = $_POST['id'];
      $_SESSION['pw'] = $_POST['pw'];
    }
  }

  $year = date("Y",time());
  $month = date("n",time());
  $day = date("j",time());

  $count = 1;


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
        <form method="post" action="news01_conf.php">
          <table class="general-form">
            <tr>
              <th abbr="com">日付</th>
              <td>
                <select name="year">
                  <option value="<?=$year-1?>"><?=$year-1?></option>
                  <option value="<?=$year?>" selected="selected"><?=$year?></option>
                  <option value="<?=$year+1?>"><?=$year+1?></option>
                </select>年
                <select name="month">
                  <?php
                    while($count != 13)
                    {
                    if($count == $month)
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
                    while($count != 32)
                    {
                    if($count == $day)
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
              <td><input class="input-general" name="title" type="text"></td>
            </tr>
            <tr>
              <th abbr="add">掲載情報</th>
              <td><textarea name="info"></textarea></td>
            </tr>
            <tr>
              <th abbr="start1">リンクの有無</th>
              <td>
                <input id="link-01" class="input-radio" name="link" type="radio" value="0" checked><label for="link-01">リンクしない</label><br>
                <input id="link-02" class="input-radio" name="link" type="radio" value="1"><label for="link-02">現在のタブでリンクを開く</label><br>
                <input id="link-03" class="input-radio" name="link" type="radio" value="2"><label for="link-03">新規のタブでリンクを開く</label>
              </td>
            </tr>
            <tr>
              <th abbr="start2">リンク先URL</th>
              <td><input class="input-general" name="url" type="text"><input class="input-general" name="url_text" type="hidden"></td>
            </tr>
            <tr>
              <th abbr="mon">表示・非表示</th>
              <td>
                <input id="disp-01" class="input-radio" name="disp" type="radio" value="1" checked><label for="disp-01">表示</label><br>
                <input id="disp-02" class="input-radio" name="disp" type="radio" value="0"><label for="disp-02">非表示</label>
              </td>
            </tr>
          </table>
          <p class="notification warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>管理画面より登録する情報は、「表示」が選択されている場合、登録と同時にホームページに情報が反映されますので、情報に誤りのないように十分ご確認の上ご登録ください。</p>
          <button class="submit-button" name="submit" type="submit">登録情報の確認画面へ</button>
        </form>
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
