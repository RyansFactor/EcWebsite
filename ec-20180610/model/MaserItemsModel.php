<?php

// 商品クラス
require_once 'ItemsModel.php';



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
    public function insert(ItemsModel $itemsModel)
    {
        // SQL文を作成
        $sql = 'INSERT INTO items (name,price,img1,img2,status,size,color,comment,create_datetime,update_datetime ) VALUES ( ?,?,?,?,?,?,?,?,NOW(),NOW())';
        try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(1, $itemsModel->getName(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(2, $itemsModel->getPrice(), PDO::PARAM_INT);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(3, $itemsModel->getImg1(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(4, $itemsModel->getImg2(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(5, $itemsModel->getStatus(), PDO::PARAM_INT);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(6, $itemsModel->getSize(), PDO::PARAM_INT);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(7, $itemsModel->getColor(), PDO::PARAM_INT);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(8, $itemsModel->getComment(), PDO::PARAM_INT);
            // SQLを実行
            $stmt->execute();
            // 追加できたのでIDを取得
            $item_id = $this->dbh->lastInsertId('item_id');
            // drink_idを保存
            $itemsModel->setId($item_id);
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
        $sql = 'SELECT items.item_id, name, price, img1, img2, status, size, color, comment, stock.stock AS stock ' .
            'FROM items LEFT JOIN stock ON ( items.item_id = stock.item_id ) ';

        try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // SQLを実行
            $stmt->execute();
            // レコードの取得
            $rows = $stmt->fetchAll();
            // 取得したデータを商品として保存する
            foreach ($rows as $row) {
                $itemsModel = new ItemsModel();
                $itemsModel->setId($row['item_id']);
                $itemsModel->setName($row['name']);
                $itemsModel->setPrice($row['price']);
                $itemsModel->setImg1($row['img1']);
                $itemsModel->setImg2($row['img2']);
                $itemsModel->setStatus($row['status']);
                $itemsModel->setSize($row['size']);
                $itemsModel->setColor($row['color']);
                $itemsModel->setComment($row['comment']);
                $itemsModel->setStock($row['stock']);
                // 結果を返す配列に保存
                $result[] = $itemsModel;
            }
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
        }
        return $result;
    }

    /**
     * 公開状態の商品を取得する
     * @return ItemsModel[]
     */
    public function findStatusOn()
    {
        $result = array();
        // すべての商品を取得 公開のものだけ
        $sql = 'SELECT items.item_id, name, price, img1, img2, status, size, color, comment, stock.stock AS stock ' .
            'FROM items LEFT JOIN stock ON ( items.item_id = stock.item_id ) '.
            'WHERE items.status = 1 ';

        try {
            // SQL文を実行する準備
            $stmt = $this->dbh->prepare($sql);
            // SQLを実行
            $stmt->execute();
            // レコードの取得
            $rows = $stmt->fetchAll();
            // 取得したデータを商品として保存する
            foreach ($rows as $row) {
                $itemsModel = new ItemsModel();
                $itemsModel->setId($row['item_id']);
                $itemsModel->setName($row['name']);
                $itemsModel->setPrice($row['price']);
                $itemsModel->setImg1($row['img1']);
                $itemsModel->setImg2($row['img2']);
                $itemsModel->setStatus($row['status']);
                $itemsModel->setSize($row['size']);
                $itemsModel->setColor($row['color']);
                $itemsModel->setComment($row['comment']);
                $itemsModel->setStock($row['stock']);
                // 結果を返す配列に保存
                $result[] = $itemsModel;
            }
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
        }
        return $result;
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
        $sql = 'SELECT items.item_id, name, price, img1, img2, status, size, color, comment, stock.stock AS stock ' .
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
                $itemsModel = new ItemsModel();
                $itemsModel->setId($row['item_id']);
                $itemsModel->setName($row['name']);
                $itemsModel->setPrice($row['price']);
                $itemsModel->setImg1($row['img1']);
                $itemsModel->setImg2($row['img2']);
                $itemsModel->setStatus($row['status']);
                $itemsModel->setSize($row['size']);
                $itemsModel->setColor($row['color']);
                $itemsModel->setComment($row['comment']);
                $itemsModel->setStock($row['stock']);
                // 結果を返す配列に保存
                $result[] = $itemsModel;
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
//     public function insertItem(Items $items)
//     {
//         // トランザクション開始
//         $this->dbh->beginTransaction();
//         // drink_master テーブルに追加する
//         if ($this->insert($items) !== false) {
//             $ds = new DrinkStockModel($this->dbh);
//             // drink_stock テーブルに追加する
//             if ($ds->insert($items) !== false) {
//                 // コミット処理
//                 $this->dbh->commit();

//                 return true;
//             }
//             // ロールバック処理
//             $this->dbh->rollback();
//         }
//         return false;
//     }

 }

