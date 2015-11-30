<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

/**
 * @covers \Dark\PW\Productconfigurator\ArticleWithMultipleOptions
 * @covers \Dark\PW\Productconfigurator\Article
 * @uses \Dark\PW\Productconfigurator\ArticleName
 * @uses \Dark\PW\Productconfigurator\Money
 * @uses \Dark\PW\Productconfigurator\Currency
 */
class ArticleWithMultipleOptionsTest extends \PHPUnit_Framework_TestCase
{
    use CreateMoneyTrait;

    public function testBasePriceCanBeRetrieved()
    {
        $name = new ArticleName('Test Article');

        $price = $this->createMoney();

        $article = new ArticleWithMultipleOptions($name, $price, $this->createOption());

        $this->assertTrue($price->equals($article->getBasePrice()));
    }

    /*
    public function testOptionCanBeSet()
    {
        $price = new Money(1, new Currency('EUR'));

        $option = $this->createOption();

        $article = new ArticleWithOneOption($price);
        $article->setOption($option);

        $this->assertSame($option, $article->getOption());
    }
    */

    public function testTotalPriceWithOneOptionCanBeRetrieved()
    {
        $name = new ArticleName('Test Article');

        $optionPrice = $this->createMoney();
        $basePrice = $this->createMoney();

        $option = $this->createOption();
        $option->method('getPrice')->willReturn($optionPrice);

        $article = new ArticleWithMultipleOptions($name, $basePrice, $option);

        $this->assertTrue($basePrice->addTo($optionPrice)->equals($article->getTotalPrice()));
    }

    public function testTotalPriceWithTwoOptionsCanBeRetrieved()
    {
        $name = new ArticleName('Test Article');

        $optionPrice1 = $this->createMoney();
        $optionPrice2 = $this->createMoney();
        $basePrice = $this->createMoney();

        $option1 = $this->createOption();
        $option1->method('getPrice')->willReturn($optionPrice1);

        $option2 = $this->createOption();
        $option2->method('getPrice')->willReturn($optionPrice2);

        $article = new ArticleWithMultipleOptions($name, $basePrice, $option1);
        $article->addOption($option2);

        $this->assertTrue($basePrice->addTo($optionPrice1)->addTo($optionPrice2)->equals($article->getTotalPrice()));
    }

    public function testTotalPriceWithThreeOptionsCanBeRetrieved()
    {
        $name = new ArticleName('Test Article');

        $optionPrice1 = $this->createMoney();
        $optionPrice2 = $this->createMoney();
        $optionPrice3 = $this->createMoney();
        $basePrice = $this->createMoney();

        $option1 = $this->createOption();
        $option1->method('getPrice')->willReturn($optionPrice1);

        $option2 = $this->createOption();
        $option2->method('getPrice')->willReturn($optionPrice2);

        $option3= $this->createOption();
        $option3->method('getPrice')->willReturn($optionPrice3);

        $article = new ArticleWithMultipleOptions($name, $basePrice, $option1);
        $article->addOption($option2);
        $article->addOption($option3);

        $this->assertTrue(
            $basePrice->addTo($optionPrice1)
                      ->addTo($optionPrice2)
                      ->addTo($optionPrice3)
                      ->equals($article->getTotalPrice())
        );
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Maximum of three options exceeded
     */
    public function testFourthOptionsCanNotBeAdded()
    {
        $name = new ArticleName('Test Article');

        $optionPrice1 = $this->createMoney();
        $optionPrice2 = $this->createMoney();
        $optionPrice3 = $this->createMoney();
        $basePrice = $this->createMoney();

        $option1 = $this->createOption();
        $option1->method('getPrice')->willReturn($optionPrice1);

        $option2 = $this->createOption();
        $option2->method('getPrice')->willReturn($optionPrice2);

        $option3 = $this->createOption();
        $option3->method('getPrice')->willReturn($optionPrice3);

        $option4 = $this->createOption();
        $option4->method('getPrice')->willReturn($optionPrice3);

        $article = new ArticleWithMultipleOptions($name, $basePrice, $option1);
        $article->addOption($option2);
        $article->addOption($option3);
        $article->addOption($option4);
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