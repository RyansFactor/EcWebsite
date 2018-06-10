<?php
require_once 'User.php';

class UserModel
{
    private $dbh;

    public $error;

    /**
     * コンストラクタ
     * @param PDO $dbh
     */
    public function __construct(PDO $dbh)
    {
        $this->dbh = $dbh;

        $this->error = '';
    }

    public function insert(User $user) {

        $sql = 'INSERT INTO users (user_id, password, name, tel, postal_code, prefecture, adress1, adress2, status, create_datetime, update_datetime) VALUES (?,?,?,?,?,?,?,?,?, NOW(),NOW())';

        try {
            $stmt = $this->dbh->prepare($sql);

            // プレースホルダに ステータス をバインド
            $stmt->bindValue(1, $user->getUserId(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(2, $user->getPassword(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(3, $user->getName(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(4, $user->getTel(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(5, $user->getPostalCode(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(6, $user->getPrefecture(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(7, $user->getAdress1(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(8, $user->getAdress2(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(9, $user->getStatus(), PDO::PARAM_INT);

            // SQLを実行
            $stmt->execute();
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function findAll() {

       $result = array();

       $sql = 'SELECT user_id,password, name, tel, postal_code, prefecture, adress1, adress2, status, create_datetime, update_datetime FROM users';

       try {
           // SQL文を実行する準備
           $stmt = $this->dbh->prepare($sql);
           // SQLを実行
           $stmt->execute();
           // レコードの取得
           $rows = $stmt->fetchAll();
           // 取得したデータを商品として保存する
           foreach ($rows as $row) {
               $user = new User();
               $user->setUserId($row['user_id']);
               $user->setPassword($row['password']);
               $user->setName($row['name']);
               $user->setTel($row['tel']);
               $user->setPostalCode($row['postal_code']);
               $user->setPrefecture($row['prefecture']);
               $user->setAdress1($row['adress1']);
               $user->setAdress2($row['adress2']);
               $user->setStatus($row['status']);
               $user->setCreateDatetime($row['create_datetime']);
               $user->setUpdateDatetime($row['update_datetime']);


               // 結果を返す配列に保存
               $result[] = $user;
           }
       } catch (PDOException $e) {
           // エラーが発生
           $this->error = $e->getMessage();
       }
       return $result;
    }

}

