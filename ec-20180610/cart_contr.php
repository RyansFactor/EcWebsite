<?php
require_once 'model/function.php';
require_once 'model/Items.php';
require_once 'model/MaserItemsModel.php';
require_once 'model/Cart.php';
require_once 'model/CartModel.php';


//空にする
$items = new Items();
$cart = new Cart();

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

// ポストされてるかチェック
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $itemId = $_GET['item_id'];




    $cart->setUser_id($userId);


    $cart->setItem_id($itemId);

    //インスタンスsさくせい
    $model = new MasterItemsModel($dbh);
    $datas = $model->findById($itemId);





    if(count($datas) > 0) {
        $items = $datas[0];
    }

    $model = new CartModel($dbh);
    $model->insert($cart);


}


include './view/cart_view.php' ;