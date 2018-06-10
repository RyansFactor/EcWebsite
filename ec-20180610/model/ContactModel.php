<?php
require_once 'Contact.php';

class ContactModel
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

    public function insert(Contact $contact) {

        $sql = 'INSERT INTO contact (name, mail, tel, comment, create_datetime) VALUES (?,?,?,?, NOW())';

        try {
            $stmt = $this->dbh->prepare($sql);

            // プレースホルダに ステータス をバインド
            $stmt->bindValue(1, $contact->getName(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(2, $contact->getEmail(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(3, $contact->getTel(), PDO::PARAM_STR);
            // プレースホルダに ステータス をバインド
            $stmt->bindValue(4, $contact->getComment(), PDO::PARAM_STR);

            // SQLを実行
            $stmt->execute();
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
            return false;
        }
    }

}

