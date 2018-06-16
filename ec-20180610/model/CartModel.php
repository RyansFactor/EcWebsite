<?php

// 商品クラス
require_once 'model/Items.php';


class CartModel
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

    /**
     * 商品を追加する
     *
     * @param Items $items
     * @return boolean
     */
    public function insert(Cart $cart)
    {
        // SQL文を作成
        $sql = 'INSERT INTO cart (user_id, item_id, amount, create_datetime)
VALUES (?,?,?,NOW())';
            try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(1, $cart->getUser_id(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(2, $cart->getItem_id(), PDO::PARAM_INT);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(3, $cart->getAmount(), PDO::PARAM_INT);


            // SQLを実行
            $stmt->execute();

        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
            return false;
        }
        // 正常終了
        return true;
    }
}