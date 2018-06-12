<?php

// セッション開始
session_start();
// セッション変数からuser_id取得
$userId = ( isset($_SESSION['userId']) ) ? $_SESSION['userId'] : '';
$userName = ( isset($_SESSION['name']) ) ? $_SESSION['name'] : '';


if(isset($_POST['submit']) === true) {
// セッション開始
session_start();
// セッション名取得 ※デフォルトはPHPSESSID
$session_name = session_name();
// セッション変数を全て削除
$_SESSION = array();



// セッションIDを無効化
session_destroy();
header("Location: user_login_contr.php");  // メイン画面へ遷移


}

include 'view/top_view.php' ;