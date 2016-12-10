<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 2016-12-10
 * Time: 19:01
 */

namespace App\tests\Integration\Models;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Article;

/**
 * Class ArticleTest
 * @package App\tests\Integration\Models
 * test: php vendor/bin/phpunit
 */
class ArticleTest extends \TestCase
{
    use DatabaseTransactions;

    /** @test */
    function it_fetches_trending_articles() {

        // Given
        factory(Article::class, 2)->create();
        factory(Article::class)->create([ 'reads' => 10 ]);
        $mostPopular = factory(Article::class)->create([ 'reads' => 20 ]);

        // When
        $articles = Article::trending();

        // Then
        $this->assertEquals($mostPopular->id, $articles->first()->id, 'Trending articles');
        $this->assertCount(3, $articles);
    }

}