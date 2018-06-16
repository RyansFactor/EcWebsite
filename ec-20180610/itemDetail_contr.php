<?php
require_once 'model/function.php';
require_once 'model/Items.php';
require_once 'model/MaserItemsModel.php';
require_once 'model/Cart.php';
require_once 'model/CartModel.php';


//空にする
$items = new Items();

$message = "";

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql_kind = isParam('sql_kind');
    switch($sql_kind) {

        case 'insert':

            $cart = new Cart();

            $cart->setUser_id($userId);
            $itemId = $_POST['itemId'];
            $cart->setItem_id($itemId);

            $model = new CartModel($dbh);
            $model->insert($cart);

            $message = '商品をカートに追加しました';

            //インスタンスsさくせい
            $model = new MasterItemsModel($dbh);

            $datas = $model->findById($itemId);

            if(count($datas) > 0) {
                $items = $datas[0];
            }

            break;

    }

}


// ポストされてるかチェック
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $itemId = $_GET['item_id'];

    //インスタンスsさくせい
    $model = new MasterItemsModel($dbh);

    $datas = $model->findById($itemId);

    if(count($datas) > 0) {
        $items = $datas[0];
    }
}


include './view/itemDetail_view.php' ;