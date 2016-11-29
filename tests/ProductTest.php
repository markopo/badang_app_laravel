<?php


use App\Product;

class ProductTest extends PHPUnit_Framework_TestCase {

    protected $product;


    public function setUp() {
        $this->product = new \App\Product('Fallout 4', 12);
    }


    /**
     * @test
     */
    public function AProductHasName() {
        $this->assertEquals('Fallout 4', $this->product->getName(), 'Name is set!');
    }

    /**
     * @test
     */
    public function AProductHasPrice(){
        $this->assertEquals(12, $this->product->getPrice(), 'Price is set!');
    }

}