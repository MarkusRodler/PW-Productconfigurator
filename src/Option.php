<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

class Option
{
    /**
     * @var Money
     */
    private $price;

    /**
     * @param $price
     */
    public function __construct(Money $price)
    {
        $this->price = $price;
    }

    /**
     * @return Money
     */
    public function price() : Money
    {
        return $this->price;
    }
}