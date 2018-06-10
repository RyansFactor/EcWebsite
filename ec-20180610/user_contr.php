<?php

require_once 'model/function.php';
require_once 'model/User.php';
require_once 'model/UserModel.php';

// 変数初期化
$sql_kind = "";
$result_msg = "";
$userId     = "";
$password   = "";
$name       = "";
$tel        = "";
$postalCode = "";
$prefecture = "";
$adress1    = "";
$adress2    = "";

// はじめにインスタンス作る
$user = new User();

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

            case 'regist';

            //取得と検査
            $userId  = stringParam($_POST['userId'], 1, 5, 100);
            $user->setUserId($userId);

            $password   = stringParam($_POST['password'], 2, 8, 16);
            $user->setPassword($password);

            $name       = stringParam($_POST['name'], 3, 1, 20);
            $user->setName($name);

            $tel        = stringParam($_POST['tel'], 4, 10, 20);
            $user->setTel($tel);

            $postalCode = stringParam($_POST['postalCode'], 5, 7, 20);
            $user->setPostalCode($postalCode);

            $prefecture = stringParam($_POST['prefecture'], 6, 1, 20);
            $user->setPrefecture($prefecture);

            $adress1    = stringParam($_POST['adress1'], 7, 1, 100);
            $user->setAdress1($adress1);

            $adress2    = stringParam($_POST['adress2'], 0, 0, 100);
            $user->setAdress2($adress2);






            //モデルの生成　MuSQLの
            $model = new UserModel($dbh);

            //テーブルに追加する
            $model->insert($user);

            $result_msg = 'ユーザー登録が完了しました';
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
                $err_msg[] ='パスワードは'.$e->getMessage();

            case 3:
                $err_msg[] ='名前は'.$e->getMessage();

            case 4:
                $err_msg[] ='電話番号は'.$e->getMessage();

            case 5:
                $err_msg[] ='郵便番号は'.$e->getMessage();

            case 6:
                $err_msg[] ='都道府県を選択してください';

            case 7:
                $err_msg[] ='住所は'.$e->getMessage();
                break;
        }
    }
}


include './view/user_view.php' ;




// お問い合わせ
// ■名前を入力してください
// ■メールアドレスを入力してください
// ■電話番号を入力してください
// ■お問い合わせ内容を入力してください

// ■名前が長すぎます
// ■メールアドレスは半角英数字で入力してください
// ■メールアドレスが長すぎます
// ■電話番号は半角英数字で入力してください
// ■電話番号が長すぎます
// ■お問い合わせ内容は500文字以下で入力してください

// ■メッセージを送信しました


