<?php

require_once 'model/function.php';
require_once 'model/User.php';
require_once 'model/UserModel.php';

$data = array();

// データベースの接続
$dbh = getDbConnect();
if (! isset($dbh)) {
    // 接続できない致命的エラー
    http_response_code(500);
    exit();
}
$model = new UserModel($dbh);

$data = $model->findAll();


include './view/user_tool_view.php' ;