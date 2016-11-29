<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class ExampleTest
 * command: php vendor/bin/phpunit
 */
class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        // 1.
        $this->visit('/');

        // 2.
        $this->click('Click me');

        // 3.
        $this->see('You\'ve been clicked, punk.');

        // 4.


        //     ->see('Welcome everybody');
    }
}
