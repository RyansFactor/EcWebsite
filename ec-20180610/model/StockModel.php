<?php

// 商品クラス
require_once 'Items.php';

/**
 * stock テーブルのモデル
 *
 */
class StockModel
{

    private $dbh;

    public $error;

    /**
     * コンストラクタ
     *
     * @param PDO $dbh
     */
    public function __construct(PDO $dbh)
    {
        $this->dbh = $dbh;

        $this->error = '';
    }

    /**
     * 在庫を追加する
     * @param Items $items
     * @return boolean|number
     */
    public function insert(Items $items)
    {
        // SQL文を作成
        $sql = 'INSERT INTO stock (item_id, stock, create_datetime,update_datetime ) VALUES ( ?,?,NOW(),NOW())';
        try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(1, $items->getItem_id(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(2, $items->getStock(), PDO::PARAM_INT);
            // SQLを実行
            $stmt->execute();
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
            return false;
        }
        // 正常終了
        return $items->getItem_id();
    }

    /**
     * 在庫数を更新する
     *
     * @param string $item_id
     * @param number $stock
     * @return boolean
     */
    public function updateStock($item_id, $stock)
    {

        // SQL文
        $sql = 'UPDATE stock SET stock = ? , update_datetime = NOW() WHERE item_id = ? ';
        try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // プレースホルダに 在庫数 をバインド
            $stmt->bindValue(1, $stock, PDO::PARAM_INT);
            // プレースホルダに drink_id をバインド
            $stmt->bindValue(2, $item_id, PDO::PARAM_STR);
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

