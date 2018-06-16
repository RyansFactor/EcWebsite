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

    public function __construct(){
        $this->cart_id = 0;
        $this->user_id = '';
        $this->item_id = 0;
        $this->amount = 1;
    }
    /**
     * @return number
     */
    public function getCart_id()
    {
        return $this->cart_id;
    }

    /**
     * @return number
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
     * @param number $cart_id
     */
    public function setCart_id($cart_id)
    {
        $this->cart_id = $cart_id;
    }

    /**
     * @param number $user_id
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



}


