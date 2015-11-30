<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

abstract class Article
{
    /**
     * @var Money
     */
    private $basePrice;

    /**
     * @var ArticleName
     */
    private $name;

    /**
     * @param ArticleName $name
     * @param Money $basePrice
     */
    public function __construct(ArticleName $name, Money $basePrice)
    {
        $this->name = $name;
        $this->basePrice = $basePrice;
    }

    /**
     * @return Money
     */
    public function basePrice() : Money
    {
        return $this->basePrice;
    }

    /**
     * @return Money
     */
    abstract public function totalPrice() : Money;
}
