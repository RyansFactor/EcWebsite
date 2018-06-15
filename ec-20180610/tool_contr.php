<?php


require_once 'model/function.php';
require_once 'model/Items.php';
require_once 'model/MaserItemsModel.php';
require_once 'model/StockModel.php';


// 変数初期化
$sql_kind = "";
$result_msg = "";

//アップロードした画像ファイルの保存場所
$img_dir = './img2/';

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
            $price = numberParam($price, 1, 1, 10);
            $items->setPrice($price);

            $img1 = upLoadFile('img1', $img_dir, 100);
            $items->setImg1($img1);

            $img2 = uploadFile('img2', $img_dir, 100);
            $items->setImg2($img2);

            $status = stringParam($_POST['status'], 0, 1, 100);
            $items->setStatus($status);

            $size = stringParam($_POST['size'], 1, 1, 100);
            $items->setSize($size);

            $stock = stringParam($_POST['stock'], 1, 1, 10000);
            $stock = numberParam($stock, 1, 1, 1000);
            $items->setStock($stock);

            $color = stringParam($_POST['color'], 1, 1, 100);
            $items->setColor($color);

            $comment = stringParam($_POST['comment'], 1, 1, 100);
            $items->setComment($comment);





            //モデルの生成
            $model = new MasterItemsModel($dbh);

            //テーブルに追加する　これはitemテーブル、stockテーブル両方に情報が追加されるようにトランザクションがかいてあるメソッド
            $model->insertItems($items);

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

// 商品一覧を取得
$model = new MasterItemsModel($dbh);
$data = $model->findAll();


include './view/tool_view.php' ;