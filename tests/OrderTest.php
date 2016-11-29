<?php

/**
 * Created by PhpStorm.
 * User: marko
 * Date: 2016-11-29
 * Time: 19:55
 */
use App\Order;
use App\Product;

/**
 * Class OrderTest
 * php vendor/bin/phpunit
 */
class OrderTest extends PHPUnit_Framework_TestCase
{

    private function getOrder():App\Order {
        $order = new Order;

        $prod1 = new \App\Product('Fallout 4', 59);
        $prod2 = new \App\Product('Pillowcase', 7);

        $order->add($prod1);
        $order->add($prod2);

        return $order;
    }

    /** @test */
    public function an_order_consists_of_products() {

        $order = $this->getOrder();

        $this->assertCount(2, $order->getProducts());
    }

    /** @test */
    public function an_order_can_determine_the_total_cost_of_all_its_products() {

        $order = $this->getOrder();


        $this->assertEquals(66, $order->getTotal());
    }

}