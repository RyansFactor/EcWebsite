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
        //$userId = stringParam($_POST['userId'], 1, 1, 20);
        //$userLogin->setUserId($userId);
        //$password = stringParam($_POST['password'], 2, 1, 100);
        //$userLogin->setPassword($password);
        // パラメータを取得
        $userId = (isset($_POST['userId'])) ? $_POST['userId']: '';
        $userLogin->setUserId($userId);
        $password = (isset($_POST['password'])) ? $_POST['userId']: '';
        $userLogin->setPassword($password);
        // パラメータを検査
        $userLogin->validate($_POST,1);
        // モデルの生成 MuSQLの
        $model = new UserLoginModel($dbh);
        // セレクトでとりだし
        $rows = $model->select($userLogin);
        // ろぐいんできたか検査
        if ($rows !== FALSE) {
        	// ログイン成功
            session_start();
            $_SESSION["userId"] = $userId;
            $_SESSION["name"] = $rows[0]->getName();
            header("Location: top.php"); // メイン画面へ遷移
        } else {
            // 認証失敗
        	$err_msg[] = "ユーザIDあるいはパスワードに誤りがあります。";
        }
        
/*    } catch (LengthException $e) {
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
    }*/
    } catch (InvalidArgumentException $e) {
    	if( $e->getCode() === 1 ) {
    		$err_msg = $userLogin->getErrorMessage();
    	}
    }
}
// Viewを表示する
include './view/user_login_view.php';