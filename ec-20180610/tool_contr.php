<?php


require_once 'model/function.php';
require_once 'model/Items.php';
require_once 'model/MaserItemsModel.php';

// 変数初期化
$sql_kind = "";
$result_msg = "";
$name = "";
$email = "";
$tel = "";
$comment = "";
// はじめにインスタンス作る
$items = new Items();

// エラーメッセージ配列
$err_msg = array();


// データベースの接続
$dbh = getDbConnect();
if (! isset($dbh)) {
    // 接続できない致命的エラー
    http_response_code(500);
    exit();
}

// ポストされてるかチェック
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $sql_kind = isParam('sql_kind');
        switch($sql_kind) {

            case 'itemInsert';

            //取得と検査
            $name = stringParam($_POST['name'], 1, 1, 20);
            $items->setName($name);
            $price = stringParam($_POST['price'], 2, 1, 100);
            $items->setPrice($price);
            $img1 = stringParam($_POST['img1'], 1, 1, 100);
            $items->setImg1($img1);
            $img2 = stringParam($_POST['img2'], 1, 1, 100);
            $items->setImg2($img2);
            $status = stringParam($_POST['status'], 0, 1, 100);
            $items->setStatus($status);
            $size = stringParam($_POST['size'], 1, 1, 100);
            $items->setSize($size);
            $color = stringParam($_POST['color'], 1, 1, 100);
            $items->setColor($color);
            $comment = stringParam($_POST['comment'], 1, 1, 100);
            $items->setComment($comment);



            //モデルの生成　MuSQLの
            $model = new MasterItemsModel($dbh);

            //テーブルに追加する
            $model->insert($items);

            $result_msg = '商品を追加しました';
            break;

            default:
                http_response_code(400);
                exit();
        }
    } catch (LengthException $e) {
        switch($e->getCode()) {
            case 0:
                $err_msg[] = $e->getMessage();

            case 1:
                $err_msg[] ='名前は'.$e->getMessage();

            case 2:
                $err_msg[] ='メールアドレスは'.$e->getMessage();

            case 3:
                $err_msg[] ='電話番号は'.$e->getMessage();

            case 4:
                $err_msg[] ='お問い合わせは'.$e->getMessage();
                break;
        }
    }
}




include './view/tool_view.php' ;