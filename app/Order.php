<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 2016-11-29
 * Time: 20:07
 */

namespace App;


class Order
{

    protected $products = [];

    public function add(Product $product) {
        array_push($this->products, $product);
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function getTotal(): int {
       $total = 0;

        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }

        return $total;
    }
}