<?php
require_once 'model/function.php';
require_once 'model/UserLoginModel.php';

// 変数初期化
$sql_kind = "";
$result_msg = "";
$email = "";
$password = "";
$errorMessage = "";
$row = array();

// エラーメッセージ配列
$err_msg = array();

// データベースの接続
$dbh = getDbConnect();
if (! isset($dbh)) {
    // 接続できない致命的エラー
    http_response_code(500);
    exit();
}

// はじめにインスタンス作る
$userLogin = new UserLogin();

// ポストされてるかチェック
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        // 取得と検査
        $userId = stringParam($_POST['userId'], 1, 1, 20);
        $userLogin->setUserId($userId);
        $password = stringParam($_POST['password'], 2, 1, 100);
        $userLogin->setPassword($password);

        // モデルの生成 MuSQLの
        $model = new UserLoginModel($dbh);

        // セレクトでとりだし
        $rows = $model->select($userLogin);

        // ろぐいんできた
        if ($rows !== FALSE) {
            session_start();
            $_SESSION["userId"] = $userId;
            $_SESSION["name"] = $rows[0]->getName();
            header("Location: top.php"); // メイン画面へ遷移
        } else {
            // 認証失敗
            $errorMessage = "ユーザIDあるいはパスワードに誤りがあります。";
        }

        // default:
        // http_response_code(400);
        // exit();
    } catch (LengthException $e) {
        switch ($e->getCode()) {
            case 0:
                $err_msg[] = $e->getMessage();

            case 1:
                $err_msg[] = '名前は' . $e->getMessage();

            case 2:
                $err_msg[] = 'メールアドレスは' . $e->getMessage();

            case 3:
                $err_msg[] = '電話番号は' . $e->getMessage();

            case 4:
                $err_msg[] = 'お問い合わせは' . $e->getMessage();
                break;
        }
    }
}

include './view/user_login_view.php';


// ■メールアドレスを入力してください
// ■パスワードを入力してください

// ■メールアドレスが間違っています
// ■パスワードが間違っています