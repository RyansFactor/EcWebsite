<?php

require_once 'model/function.php';
require_once 'model/Items.php';
require_once 'model/MaserItemsModel.php';
require_once 'model/StockModel.php';


// データベースの接続
$dbh = getDbConnect();
if (! isset($dbh)) {
    // 接続できない致命的エラー
    http_response_code(500);
    exit();
}


// 公開中のものだけ　モデルの呼び出し
$model = new MasterItemsModel($dbh);
// 商品一覧を取得
$data = $model->findStatusOn();


include './view/item_view.php' ;