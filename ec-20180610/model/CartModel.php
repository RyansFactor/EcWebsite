<?php

// 商品クラス
require_once 'model/Items.php';
require_once 'model/MaserItemsModel.php';
require_once 'model/StockModel.php';


class CartModel
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

    public function findCart($user_id)
    {
        $result = array();
        // すべての商品を取得 公開のものだけ
        $sql = 'SELECT cart.cart_id, cart.item_id, cart.user_id, items.name, items.price, items.img1, items.size FROM ec.cart AS cart LEFT JOIN ec.items AS items ON ( cart.item_id = items.item_id ) WHERE cart.user_id =?';

        try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);

            // プレースホルダに ステータス をバインド
            $stmt->bindValue(1, $user_id, PDO::PARAM_STR);
            // SQLを実行
            $stmt->execute();
            // レコードの取得
            $rows = $stmt->fetchAll();
            // 取得したデータを商品として保存する
            foreach ($rows as $row) {
                $cart = new Cart();
                $cart->setCart_id($row['cart_id']);
                $cart->setItem_id($row['item_id']);
                $cart->setUser_id($row['user_id']);
                $cart->setName($row['name']);
                $cart->setImg1($row['img1']);
                $cart->setPrice($row['price']);
                $cart->setSize($row['size']);

                // 結果を返す配列に保存
                $result[] = $cart;
            }
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
        }
        return $result;
    }

    public function deleteCart($cart_id)
    {
        $sql = 'DELETE FROM cart WHERE cart_id = ?';

        try {
            $stmt = $this->dbh->prepare($sql);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(1, $cart_id, PDO::PARAM_INT);
            // SQLを実行
            $stmt->execute();
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
            return false;
        }
        return true;
    }

    public function history(Cart $cart)
    {
        $sql = 'INSERT INTO history ( cart_id, item_id, user_id, price, amount, create_datetime
) VALUES ( ? , ?, ?, ?, ?, NOW() )';

        try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // プレースホルダに バインド
            $stmt->bindValue(1, $cart->getCart_id(), PDO::PARAM_INT);
            $stmt->bindValue(2, $cart->getItem_id(), PDO::PARAM_INT);
            $stmt->bindValue(3, $cart->getUser_id(), PDO::PARAM_STR);
            $stmt->bindValue(4, $cart->getPrice(), PDO::PARAM_INT);
            $stmt->bindValue(5, $cart->getAmount(), PDO::PARAM_INT);

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

    public function buy($userId)
    {
        $stock = new StockModel($this->dbh);
        $itemModel = new MasterItemsModel($this->dbh);

        // トランザクション開始 cartのテーブル削除、stockの在庫ひく、historyに情報が追加、同時にやる
        $this->dbh->beginTransaction();

        try {
            // カートの中身の商品一覧を取得
            $data = $this->findCart($userId);
            foreach ($data as $cart) {
                // カートの中身消す
                $this->deleteCart($cart->getCart_id());
                //今の在庫数を調べる
                $item = $itemModel->findById($cart->getItem_id());
                // 在庫数
                $s = $item[0]->getStock();
                $stock->updateStock($cart->getItem_id(), $s - 1);

                $this->history($cart);
            }

            // コミット処理
            $this->dbh->commit();
            return true;
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();

            // ロールバック処理 うまくいかなかったらどちらのテーブルにも商品を追加しない
            $this->dbh->rollback();
            return false;
        }
    }
}
