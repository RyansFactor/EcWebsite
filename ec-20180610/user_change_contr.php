<?php
require_once './model/function.php';
require_once './model/UserModel.php';

$message = '';

// セッション開始
session_start();
// セッション変数からuser_id取得
$userId = (isset($_SESSION['userId'])) ? $_SESSION['userId'] : '';
$userName = (isset($_SESSION['name'])) ? $_SESSION['name'] : '';

// データベースの接続
$dbh = getDbConnect();
if (! isset($dbh)) {
    // 接続できない致命的エラー
    http_response_code(500);
    exit();
}

// ログインされていない状態であれば
if ($userId == '') {
    header("Location: user_login_contr.php"); // ログイン画面へ遷移
    exit();
}

$userModel = new UserModel($dbh);
// user_idで情報を検索
$data = $userModel->findByUserId($userId);

$user = new User();

// ポストされてるかチェック
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $sql_kind = isParam('sql_kind');
        switch ($sql_kind) {
            case 'updateUser':

                $userId = $_POST['updateUserId'];
                $user->setUserId($userId);

                $password = $_POST['updatePassword'];
                $user->setPassword($password);

                $name = $_POST['updateName'];
                $user->setName($name);

                $tel = $_POST['updateTel'];
                $user->setTel($tel);

                $postalCode = $_POST['updatePostalCode'];
                $user->setPostalCode($postalCode);

                $prefecture = $_POST['updatePre'];
                $user->setPrefecture($prefecture);

                $adress1 = $_POST['updateAdress1'];
                $user->setAdress1($adress1);

                $adress2 = $_POST['updateAdress2'];
                $user->setAdress2($adress2);


                $userModel->updateUser($user);

                $message = '登録の情報を変更しました';

                break;

            case 'updateUserStatud':

                $userModel->updateUserStatus($userId);

        }
    } catch (PDOException $e) {
        // エラーが発生
        $this->error = $e->getMessage();
    }
}

include './view/user_change_view.php';