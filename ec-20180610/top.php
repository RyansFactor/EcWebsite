<?php

// セッション開始
session_start();
// セッション変数からuser_id取得
$userId = (isset($_SESSION['userId'])) ? $_SESSION['userId'] : '';
$userName = (isset($_SESSION['name'])) ? $_SESSION['name'] : '';

if (isset($_POST['submit']) === true) {
    // セッション変数を全て削除
    $_SESSION = array();

    // セッションIDを無効化
    session_destroy();
    header("Location: user_login_contr.php"); // メイン画面へ遷移
    exsit;
}


include 'view/top_view.php';