<?php

require_once 'model/function.php';
require_once 'model/Items.php';
require_once 'model/MaserItemsModel.php';
require_once 'model/StockModel.php';

$color = '';

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
// 公開中のものだけ　モデルの呼び出し
$model = new MasterItemsModel($dbh);
// // ゲットされてるかチェック
 if ($_SERVER['REQUEST_METHOD'] === 'GET') {
     if(isset($_GET['color'])) {
         //色が指定された
         $color = $_GET['color'];
         $data = $model->findColor($color);
     } else {
         //全てのアイテム
         // 商品一覧を取得
         $data = $model->findStatusOn();
     }
 }
include './view/item_view.php' ;