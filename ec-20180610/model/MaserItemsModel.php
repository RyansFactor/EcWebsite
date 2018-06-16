<?php

// 商品クラス
require_once 'model/Items.php';
require_once 'model/StockModel.php';




/**
 * master テーブルのモデル
 */
class MasterItemsModel
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
     * @return boolean|string
     */
    public function insert(Items $items)
    {
        // SQL文を作成
        $sql = 'INSERT INTO items (name,price,img1,img2,status,size,color,item_comment,create_datetime,update_datetime)
VALUES (?,?,?,?,?,?,?,?,NOW(),NOW())';
            try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(1, $items->getName(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(2, $items->getPrice(), PDO::PARAM_INT);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(3, $items->getImg1(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(4, $items->getImg2(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(5, $items->getStatus(), PDO::PARAM_INT);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(6, $items->getSize(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(7, $items->getColor(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(8, $items->getComment(), PDO::PARAM_STR);
            // SQLを実行
            $stmt->execute();
            // 追加できたのでIDを取得
            $item_id = $this->dbh->lastInsertId('item_id');
            // drink_idを保存
            $items->setItem_id($item_id);
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
            return false;
        }
        // 正常終了
        return $item_id;
    }



    /**
     * 商品をすべて取得する
     *
     * @return Items[]
     */
    public function findAll()
    {
        $result = array();
        // すべての商品を取得
        $sql = 'SELECT items.item_id, name, price, img1, img2, status, size, color, item_comment, stock.stock FROM items LEFT JOIN stock ON items.item_id = stock.item_id';

        try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // SQLを実行
            $stmt->execute();
            // レコードの取得
            $rows = $stmt->fetchAll();
            // 取得したデータを商品として保存する
            foreach ($rows as $row) {
                //データベースから取得した値をいれたインスタンスを作成
                $items = new Items();
                $items->setItem_id($row['item_id']);
                $items->setName($row['name']);
                $items->setPrice($row['price']);
                $items->setImg1($row['img1']);
                $items->setImg2($row['img2']);
                $items->setStatus($row['status']);
                $items->setSize($row['size']);
                $items->setColor($row['color']);
                $items->setComment($row['item_comment']);
                $items->setStock($row['stock']);
                // 結果を返す配列に保存
                $result[] = $items;
            }
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
        }
        return $result;
    }

    /**
     * 公開状態の商品を取得する
     * @return
     */
    public function findStatusOn()
    {
        $result = array();
        // すべての商品を取得 公開のものだけ
        $sql = 'SELECT items.item_id, name, price, img1, img2, status, size, color, item_comment, stock.stock FROM items LEFT JOIN stock ON items.item_id = stock.item_id WHERE items.status=1';

        try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // SQLを実行
            $stmt->execute();
            // レコードの取得
            $rows = $stmt->fetchAll();
            // 取得したデータを商品として保存する
            foreach ($rows as $row) {
                $items = new Items();
                $items->setItem_id($row['item_id']);
                $items->setName($row['name']);
                $items->setPrice($row['price']);
                $items->setImg1($row['img1']);
                $items->setImg2($row['img2']);
                $items->setStatus($row['status']);
                $items->setSize($row['size']);
                $items->setColor($row['color']);
                $items->setComment($row['item_comment']);
                $items->setStock($row['stock']);
                // 結果を返す配列に保存
                $result[] = $items;
            }
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
        }
        return $result;
    }

    /**
     * 状態を更新する
     *
     * @param string $drink_id
     * @param number $status
     * @return boolean
     */
    public function updateStatus($item_id, $status)
    {
        // SQL文
        $sql = 'UPDATE drink_master SET status = ? , update_datetime = NOW() WHERE drink_id = ? ';
        try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(1, $status, PDO::PARAM_INT);
            // プレースホルダに drink_id をバインド
            $stmt->bindValue(2, $drink_id, PDO::PARAM_STR);
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


    /**
     * 商品をIDで検索する
     *
     * @param string $item_id
     * @return Items[]
     */
    public function findById($item_id)
    {
        $result = array();
        // 指定するIDの商品を取得
        $sql = 'SELECT items.item_id, name, price, img1, img2, status, size, color, item_comment, stock.stock AS stock ' .
            'FROM items LEFT JOIN stock ON ( items.item_id = stock.item_id ) ' .
            'WHERE items.item_id = ? ';

        try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // プレースホルダに drink_id をバインド
            $stmt->bindValue(1, $item_id, PDO::PARAM_STR);
            // SQLを実行
            $stmt->execute();
            // レコードの取得
            $rows = $stmt->fetchAll();
            // 取得したデータを商品として保存する
            foreach ($rows as $row) {
                $items = new Items();
                $items->setItem_id($row['item_id']);
                $items->setName($row['name']);
                $items->setPrice($row['price']);
                $items->setImg1($row['img1']);
                $items->setImg2($row['img2']);
                $items->setStatus($row['status']);
                $items->setSize($row['size']);
                $items->setColor($row['color']);
                $items->setComment($row['item_comment']);
                $items->setStock($row['stock']);
                // 結果を返す配列に保存
                $result[] = $items;
            }
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
        }
        return $result;
    }

    /**
     * 商品を追加する
     *
     * @param Items $items
     * @return boolean
     */
    public function insertItems(Items $items)
    {
        // トランザクション開始　itemsのテーブルとstockのテーブル両方同時に情報が追加されるようにする
        $this->dbh->beginTransaction();
        // 上記のitemsテーブルに商品を追加するinsertが正常であれば、items テーブルに在庫を追加する
        if ($this->insert($items) !== false) {
            //新しく在庫追加するようのインスタンスをつくる
            $ds = new StockModel($this->dbh);
            // 上のStockModelクラスのinsertが正常であればstock テーブルに追加する
            if ($ds->insert($items) !== false) {
                // コミット処理
                $this->dbh->commit();

                return true;
            }
            // ロールバック処理 うまくいかなかったらどちらのテーブルにも商品を追加しない
            $this->dbh->rollback();
        }
        return false;
    }

}
