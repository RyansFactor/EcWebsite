<?php

require_once 'model/Valitron/Validator.php';

class UserLogin
{

    private $userId;

    private $password;

    private $name;
    
    private $errors;

    public function __construct()
    {
        $this->userId = '';

        $this->password = '';

        $this->name = '';
    }

    public function validate(array $param,$code = 0) {
    	
    	$v = new Validator($param,array(),'ja');
    	
    	$v->labels(array(
    			'userId' => 'メールアドレス',
    			'password' => 'パスワード'
    	));
    	$v->rule('required', ['userId', 'password'])->message('{field}を入力してください');
    	$v->rule('lengthMin','password', 8)->message('{field}を８文字以上で入力してください');
    	$v->rule('lengthMax','password', 16)->message('{field}を１６文字以内で入力してください');
    	
		// 検査を行う
    	if( $v->validate() === true ) {
    		return true;
    	} else {
    		// エラーが発生
    		$errors = $v->errors();
    		foreach ($errors AS $fe) {
    			foreach ($fe AS $message) {
    				$this->errors[] = $message;
    			}
    		}
    		throw new InvalidArgumentException('validate',$code);
    	}
    }
    
    public function getErrorMessage() {
    	return $this->errors;
    }
    
    /**
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     *
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     *
     * @param string $password
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}

class UserLoginModel
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

    public function select(UserLogin $userLogin)
    {
        $result = array();

        $sql = 'SELECT user_id, password, name FROM users WHERE user_id = ? AND password = ?';

        try {
            // 実行準備
            $stmt = $this->dbh->prepare($sql);

            // バインド
            $stmt->bindValue(1, $userLogin->getUserId(), PDO::PARAM_STR);
            $stmt->bindValue(2, $userLogin->getPassword(), PDO::PARAM_STR);

            // SQLを実行
            $stmt->execute();
            // レコードの取得
            $rows = $stmt->fetchAll();

            if (count($rows) > 0) {

                // 取得したデータを保存する
                foreach ($rows as $row) {
                    $userLogin = new UserLogin();
                    $userLogin->setUserId($row['user_id']);
                    $userLogin->setPassword($row['password']);
                    $userLogin->setName($row['name']);

                    // 結果を返す配列に保存
                    $result[] = $userLogin;
                }
                return $result;
            } else{
                return false;
            }
        } catch (PDOException $e) {
            // エラーが発生
            $this->error = $e->getMessage();
            return false;
        }
    }
}

