<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 2016-11-26
 * Time: 12:05
 */

namespace App;




class Product
{
    protected $name;
    protected $price;

    public function __construct($name, $price)
    {
       $this->name = $name;
       $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }





}