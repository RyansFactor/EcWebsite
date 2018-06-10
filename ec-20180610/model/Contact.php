<?php

class Contact
{
    private $name;

    private $email;

    private $tel;

    private $comment;

    public function __construct()
    {

        $this->name = '';

        $this->email = '';

        $this->tel = '';

        $this->comment = '';
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
    public function getEmail()
    {
        return $this->email;
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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }




}

