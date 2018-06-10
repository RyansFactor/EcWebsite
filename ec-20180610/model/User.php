<?php

class User
{
    private $userId;

    private $password;

    private $name;

    private $tel;

    private $postalCode;

    private $prefecture;

    private $adress1;

    private $adress2;

    private $status;

    private $createDatetime;

    private $updateDatetime;

    public function __construct()
    {

        $this->userId = '';

        $this->password = '';

        $this->name = '';

        $this->tel = '';

        $this->postalCode = '';

        $this->prefecture = '';

        $this->adress1 = '';

        $this->adress2 = '';

        $this->status = '';

        $this->createDatetime = '';

        $this->updateDatetime = '';

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getPrefecture()
    {
        return $this->prefecture;
    }

    /**
     * @return string
     */
    public function getAdress1()
    {
        return $this->adress1;
    }

    /**
     * @return string
     */
    public function getAdress2()
    {
        return $this->adress2;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getCreateDatetime()
    {
        return $this->createDatetime;
    }

    /**
     * @return string
     */
    public function getUpdateDatetime()
    {
        return $this->updateDatetime;
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

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @param string $prefecture
     */
    public function setPrefecture($prefecture)
    {
        $this->prefecture = $prefecture;
    }

    /**
     * @param string $adress1
     */
    public function setAdress1($adress1)
    {
        $this->adress1 = $adress1;
    }

    /**
     * @param string $adress2
     */
    public function setAdress2($adress2)
    {
        $this->adress2 = $adress2;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param string $createDatetime
     */
    public function setCreateDatetime($createDatetime)
    {
        $this->createDatetime = $createDatetime;
    }

    /**
     * @param string $updateDatetime
     */
    public function setUpdateDatetime($updateDatetime)
    {
        $this->updateDatetime = $updateDatetime;
    }



}