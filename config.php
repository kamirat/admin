<?php
  //NOTICEレベルは警告しない
  error_reporting(E_ALL & ~E_NOTICE);

  $news_data = "data/news.dat";                //新着情報データファイル
  //$profile_data = "data/profile_data.dat";   //会社概要データファイル
  //$recruit_data = "data/recruit_data.dat";   //採用情報データファイル
  $id = "admin";
  $pw = "test";


  //エスケープ
  function h($s)
  {
    return htmlspecialchars($s, ENT_QUOTES,"UTF-8");
  }

  //<br /> - \n
  function BR_N($n)
  {
    $br_n = str_replace("<br />","\r\n",$n);
    return $br_n;
  }

  //<br /> - ""
  function BR_Null($n)
  {
    $br_null = str_replace("<br />","",$n);
    return $br_null;
  }

  //\n - <br />
  function N_BR($n)
  {
    $n_br = nl2br($n);
    $n_br = preg_replace("/[\r\n]/","",$n_br);
    return $n_br;
  }

  //\n - ""
  function N_Null($n)
  {
    $n_null = preg_replace("/[\r\n]/","",$n);
    return $n_null;
  }
?>
