<?php

/**
 * 商品データクラス
 *
 */
class ItemsModel
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

}

