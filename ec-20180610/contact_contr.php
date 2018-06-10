<?php

require_once 'model/function.php';
require_once 'model/Contact.php';
require_once 'model/ContactModel.php';

// 変数初期化
$sql_kind = "";
$result_msg = "";
$name = "";
$email = "";
$tel = "";
$comment = "";
// はじめにインスタンス作る
$contact = new Contact();

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

        case 'ask';

        //取得と検査
        $name = stringParam($_POST['name'], 1, 1, 20);
        $contact->setName($name);
        $email = stringParam($_POST['email'], 2, 1, 100);
        $contact->setEmail($email);
        $tel = stringParam($_POST['tel'], 3, 11, 15);
        $contact->setTel($tel);
        $comment = stringParam($_POST['comment'], 4, 5, 100);
        $contact->setComment($comment);



        //モデルの生成　MuSQLの
        $model = new ContactModel($dbh);

        //テーブルに追加する
        $model->insert($contact);

        $result_msg = 'メッセージを送信しました';
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



include './view/contact_view.php' ;


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
