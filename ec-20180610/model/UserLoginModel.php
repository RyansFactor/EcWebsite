<?php

class UserLogin
{
    private $userId;

    private $password;


    public function __construct()
    {

        $this->userId = '';

        $this->password = '';

    }
    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }




}


class UserLoginModel
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

    public function select(UserLogin $userLogin) {
        $result = array();

        $sql = 'SELECT user_id, password FROM users WHERE user_id = $userId AND password = $password';

        try {
            $stmt = $this->dbh->prepare($sql);

            // SQLを実行
            $stmt->execute();
            //レコードの取得
            $rows = $stmt->fetchAll();
            // 取得したデータを保存する
            foreach ($rows as $row) {
                $userLogin = new UserLogin();
                $userLogin->setUserId($row['user_id']);
                $userLogin->setPassword($row['password']);

                // 結果を返す配列に保存
                $result[] = $userLogin;




            }
        return $result;


        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
            return false;
        }


    }

}

