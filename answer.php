<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- ファビコン（サイトのアイコン）設定．-->
        <link rel="shortcut icon" href="images/hiokichi.ico" type="image/vnd.microsoft.icon">
        <!-- CSSフレームワーク：BULMA (https://bulma.io/documentation/) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
        <!-- markdown用のCSS -->
        <link rel="stylesheet" type="text/css" href="css/markdown.css">
        <!-- awesome font: アイコンのフォント -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <!-- marked.js: マークダウンのプレビュー表示用のスクリプト -->
        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

        <!-- カスタム用のCSS -->
        <link rel="stylesheet" type="text/css" href="css/customize_bulma.css">
        <link rel="stylesheet" type="text/css" href="css/headline.css">

        <title>HiComm</title>
    </head>

    <body>
    <!-- header -->

    <!-- navi -->
    <nav class="navbar">
        <div class="navbar-brand">
            <div class="navbar-menu">
                <a class="navbar-item">
                    <img src="images/hiokichi.ico" width="auto">
                </a>
                <a class="navbar-item" href="./index.html">
                    Home
                </a>
                <a class="navbar-item" href="./about.html">
                    About
                </a>
            </div>
        </div>
        <div class="navbar-end">
            <span class="navbar-item">
                <a href="#" class="fa fa-user fa-spin"> ログイン</a>
            </span>
        </div>
    </nav>

    <!-- title -->
    <!-- ================================================================================
     SimpleMDE
     @brief  質問のタイトル．
     @author tmt
     @date   2020/4/2
    ================================================================================= -->

    <style type="text/css">
    <!--
    #qtitle {width: 100%; font-family: メイリオ; font-size: 20px; /*全体のフォントサイズ*/}
    #qtitle dl {border: 1px solid #ccc;}
    #qtitle dt {font-weight: bold;	color: #111;background: #f4f4f4; /* 「Q」タイトルの背景色 */
    	padding: 8px;	border-top: 1px solid #ccc;	border-bottom: 1px solid #ccc;}
    #qtitle dt:first-child {border-top: none;}
    #qtitle dt:before {font-weight: bold;	margin-right: 8px;}
    #qtitle dd {padding: 16px 16px 24px 30px; margin: 0;	line-height: 140%;}
    #qtitle dd:first-line {font-weight: bold; color: #bf0000;}
    #ans{text-align: right;}
    -->
    </style>

<!-- 質問内容 -->
<div id="qtitle">
	<dl>
		<dt>
      <br><center>
      <?php
      	include("php/accessDB.php");
      	$id = $_GET["question_id"];
      	$qry = $pdo->prepare('select * from question where question_id = "'.$id.'"');
      	$qry->execute();
        $result = $qry->fetch();
      	print_r($result["title"]);
      ?><br>
      <font size="3">
      <?php
      	include("php/accessDB.php");
      	$id = $_GET["question_id"];
      	$qry = $pdo->prepare('select * from question where question_id = "'.$id.'"');
      	$qry->execute();
        $result = $qry->fetch();
      	print_r($result["datetime"]);
      ?></font></center>
      <table border="1" width="100" align="right">
      <td><font size="3">&ensp;評価&emsp;
      <?php
      	include("php/accessDB.php");
      	$id = $_GET["question_id"];
      	$qry = $pdo->prepare('select * from question where question_id = "'.$id.'"');
      	$qry->execute();
        $result = $qry->fetch();
      	print_r($result["iine"]);
      ?></font></td>
      </table>

      <br>
      </dt>
	</dl>
</div>
<div id="qtext">
  <br><br><center>
<?php
	include("php/accessDB.php");
  $id = $_GET["question_id"];
	$qry = $pdo->prepare('select * from question where question_id = "'.$id.'"');
	$qry->execute();
  $result = $qry->fetch();
	print_r($result["text"]);
?>
  </center><br><br>
</div>
<div id="ans">
    <a class="button is-primary" style="margin-right: 5px">
        <i class="fa fa-pencil-square"></i>回答する
    </a>
</div>
<br><br>

<style type="text/css">
<!--
ul, ol {
  color: #1e366a;
  border-top: solid #1e366a 1px;/*上のボーダー*/
  border-bottom: solid #1e366a 1px;/*下のボーダー*/
  padding: 0.5em 0 0.5em 1.5em;
}

ul li, ol li {
  line-height: 1.5;
  padding: 0.5em 0;
}
#respondent{text-align: right; font-size: 15px;}
html, body {
  height: 100%;
}

.button {
  width: 140px;
  height: 45px;
  font-family: 'Roboto', sans-serif;
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #fff;
  border: none;
  border-radius: 45px;
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
  }

.button:hover {
  background-color: #2EE59D;
  box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
  color: #fff;
  transform: translateY(-7px);
}
-->
</style>
<!-- 回答 -->
<div id="atitle">
  <font size="5"><center>回答</font><font color="red" size="5">&ensp;
  <?php
  	include("php/accessDB.php");
    $qry = $pdo->prepare('select count(*) from answer');
  	$qry->execute();
    $result = $qry->fetch();
  	print_r($result['count(*)']);
  ?>
  &ensp;</font><font size="5">件</center></font>
  <ul>
  <?php
  	include("php/accessDB.php");
    $id = $_GET["question_id"];
  	$qry = $pdo->prepare('select * from answer where question_id = "'.$id.'"');
  	$qry->execute();
    $result = $qry->fetch();
  	print_r($result["text"]);
  ?><br>
  <div id="respondent">
  2020/04/xx&ensp;アイコン&ensp;Name<br><br>
    <button class="button">＋　高評価</button>
    <button class="button">ー　低評価</button>
    <button class="button">コメント</button>
  </div>
  </ul>
