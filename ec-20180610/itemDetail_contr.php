<?php
require_once 'model/function.php';
require_once 'model/Items.php';
require_once 'model/MaserItemsModel.php';
require_once 'model/StockModel.php';

//空にする
$items = new Items();

// データベースの接続
$dbh = getDbConnect();
if (! isset($dbh)) {
    // 接続できない致命的エラー
    http_response_code(500);
    exit();
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