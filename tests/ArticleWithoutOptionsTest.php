<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

/**
 * @covers \Dark\PW\Productconfigurator\ArticleWithoutOptions
 * @covers \Dark\PW\Productconfigurator\Article
 * @uses \Dark\PW\Productconfigurator\ArticleName
 * @uses \Dark\PW\Productconfigurator\Money
 * @uses \Dark\PW\Productconfigurator\Currency
 */
class ArticleWithoutOptionsTest extends \PHPUnit_Framework_TestCase
{
    public function testTotalPriceCanBeRetrieved()
    {
        $name = new ArticleName('Test Article');

        $price = new Money(1, new Currency('EUR'));

        $article = new ArticleWithoutOptions($name, $price);

        $this->assertSame($price, $article->getTotalPrice());
    }
}