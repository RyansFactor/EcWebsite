<?php

/**
 * 商品データクラス
 *
 */
class Items
{

    /**
     * 商品ID
     *
     * @var number
     */
    private $item_id;

    /**
     * 商品名
     *
     * @var string
     */
    private $name;

    /**
     * 価格
     *
     * @var number
     */
    private $price;


    /**
     * 商品画像のファイル名
     *
     * @var string
     */
    private $img1;


    /**
     * 商品画像のファイル名2
     *
     * @var string
     */
    private $img2;


    /**
     * 商品の状態
     *
     * @var number
     */
    private $status;



    /**
     * サイズ
     *
     * @var number
     */
    private $size;


    /**
     * 色
     *
     * @var number
     */
    private $color;

    /**
     * コメント
     *
     * @var string
     */
    private $comment;




    /**
     * 在庫数
     *
     * @var number
     */
    private $stock;


    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->item_id = 0;

        $this->name = '';

        $this->price = 0;

        $this->img1 = '';

        $this->img2 = '';

        $this->status = 0;

        $this->size = 0;

        $this->color = 0;

        $this->stock = 0;
    }
    /**
     * @return number
     */
    public function getItem_id()
    {
        return $this->item_id;
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
    public function getImg2()
    {
        return $this->img2;
    }

    /**
     * @return number
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return number
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return number
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return number
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param number $item_id
     */
    public function setItem_id($item_id)
    {
        $this->item_id = $item_id;
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
     * @param string $img2
     */
    public function setImg2($img2)
    {
        $this->img2 = $img2;
    }

    /**
     * @param number $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param number $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @param number $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param number $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }




}

