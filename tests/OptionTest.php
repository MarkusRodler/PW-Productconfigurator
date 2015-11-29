<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

/**
 * @covers \Dark\PW\Productconfigurator\Option
 * @uses \Dark\PW\Productconfigurator\Money
 * @uses \Dark\PW\Productconfigurator\Currency
 */
class OptionTest extends \PHPUnit_Framework_TestCase
{
    use CreateMoneyTrait;

    public function testPriceCanBeRetrieved()
    {
        $price = $this->createMoney();

        $option = new Option($price);

        $this->assertTrue($price->equals($option->price()));
    }
}
