<?php
require_once 'model/Cart.php';
require_once 'model/CartModel.php';
require_once 'model/function.php';
require_once 'model/StockModel.php';
require_once 'model/MaserItemsModel.php';

// データベースの接続
$dbh = getDbConnect();
if (! isset($dbh)) {
    // 接続できない致命的エラー
    http_response_code(500);
    exit();
}


// セッション開始
session_start();
// セッション変数からuser_id取得
$userId = (isset($_SESSION['userId'])) ? $_SESSION['userId'] : '';
$userName = (isset($_SESSION['name'])) ? $_SESSION['name'] : '';

// カート モデルの呼び出し
$model = new CartModel($dbh);

// 購入ボタンが押されたら
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // これいるかな？
    if ($userId == '') {
        header("Location: user_login_contr.php"); // ログイン画面へ遷移
        exit();
    } else {

        $sql_kind = isParam('sql_kind');
        switch ($sql_kind) {

            case 'buy':

                $model->buy($userId);
                $message = '商品を購入しました';
                break;
        }
    }
}

include 'view/result_view.php';