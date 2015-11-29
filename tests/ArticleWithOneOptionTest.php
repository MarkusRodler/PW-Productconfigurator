<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

/**
 * @covers \Dark\PW\Productconfigurator\ArticleWithOneOption
 * @covers \Dark\PW\Productconfigurator\Article
 * @uses \Dark\PW\Productconfigurator\Money
 * @uses \Dark\PW\Productconfigurator\Currency
 */
class ArticleWithOneOptionTest extends \PHPUnit_Framework_TestCase
{
    use CreateMoneyTrait;

    public function testBasePriceCanBeRetrieved()
    {
        $price = new Money(1, new Currency('EUR'));
        $article = new ArticleWithOneOption($price);

        $this->assertTrue($price->equals($article->basePrice()));
    }

    public function testOptionCanBeSet()
    {
        $price = new Money(1, new Currency('EUR'));

        $option = $this->createOption();

        $article = new ArticleWithOneOption($price);
        $article->setOption($option);

        $this->assertSame($option, $article->getOption());
    }

    public function testTotalPriceWithOptionCanBeRetrieved()
    {
        $optionPrice = $this->createMoney();
        $basePrice = $this->createMoney();

        $option = $this->createOption();
        $option->method('price')->willReturn($optionPrice);

        $article = new ArticleWithOneOption($basePrice);
        $article->setOption($option);

        $this->assertTrue($basePrice->addTo($optionPrice)->equals($article->totalPrice()));
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject|Option
     */
    private function createOption()
    {
        return $this->getMockBuilder(Option::class)
                       ->disableOriginalConstructor()
                       ->getMock();
    }
}
