<?php
require_once 'model/function.php';
require_once 'model/Items.php';
require_once 'model/MaserItemsModel.php';
require_once 'model/Cart.php';
require_once 'model/CartModel.php';

// 空にする
$items = new Items();
$cart = new Cart();


$message = '';

// データベースの接続
$dbh = getDbConnect();
if (! isset($dbh)) {
    // 接続できない致命的エラー
    http_response_code(500);
    exit();
}

// カート モデルの呼び出し
$model = new CartModel($dbh);

// セッション開始
session_start();
// セッション変数からuser_id取得
$userId = (isset($_SESSION['userId'])) ? $_SESSION['userId'] : '';
$userName = (isset($_SESSION['name'])) ? $_SESSION['name'] : '';

if ($userId == '') {
    header("Location: user_login_contr.php"); // ログイン画面へ遷移
    exit();
}
// GETされてるかチェック
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['cart_id'])) {

        $cartId = $_GET['cart_id'];
        $model->deleteCart($cartId);

        $message = '商品をカートから削除しました';
    }
}

// 商品一覧を取得
$data = $model->findCart($userId);

//合計計算
$sum = 0;
$tax = 0;
$sumTax = 0;

foreach($data as $cart){
    $sum += $cart->getPrice();
}

$tax = $sum * 0.08;

$sumTax = $sum + $tax;


include './view/cart_view.php';