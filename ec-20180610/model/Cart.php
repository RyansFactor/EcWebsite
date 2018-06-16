<?php

/**
 * カートデータクラス
 *
 */
class Cart
{
    private $cart_id;
    private $user_id;
    private $item_id;
    private $amount;
    private $name;
    private $price;
    private $img1;
    private $size;

    public function __construct(){
        $this->cart_id = 0;
        $this->user_id = '';
        $this->item_id = 0;
        $this->amount = 1;
        $this->name = '';
        $this->price = 0;
        $this->img1 = '';
        $this->size = '';
    }
    /**
     * @return number
     */
    public function getCart_id()
    {
        return $this->cart_id;
    }

    /**
     * @return string
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @return number
     */
    public function getItem_id()
    {
        return $this->item_id;
    }

    /**
     * @return number
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return number
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getImg1()
    {
        return $this->img1;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param number $cart_id
     */
    public function setCart_id($cart_id)
    {
        $this->cart_id = $cart_id;
    }

    /**
     * @param string $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param number $item_id
     */
    public function setItem_id($item_id)
    {
        $this->item_id = $item_id;
    }

    /**
     * @param number $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param number $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param string $img1
     */
    public function setImg1($img1)
    {
        $this->img1 = $img1;
    }

    /**
     * @param string $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }



}


