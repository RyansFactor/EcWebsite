<?php
require_once 'model/function.php';
require_once 'model/Items.php';
require_once 'model/MaserItemsModel.php';
require_once 'model/StockModel.php';

// ポストされてるかチェック
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}


include './view/itemDetail_view.php' ;