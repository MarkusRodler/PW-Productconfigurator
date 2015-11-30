<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

class ArticleWithMultipleOptions extends Article
{
    /**
     * @var Option[]
     */
    private $options = [];

    /**
     * @param ArticleName $name
     * @param Money       $basePrice
     * @param Option      $option
     */
    public function __construct(ArticleName $name, Money $basePrice, Option $option)
    {
        parent::__construct($name, $basePrice);

        $this->options[] = $option;
    }

    /**
     * @return Money
     */
    public function getTotalPrice() : Money
    {
        $price = $this->getBasePrice();

        foreach ($this->options as $option) {
            $price = $price->addTo($option->getPrice());
        }

        return $price;
    }

    public function addOption($option)
    {
        $this->ensureOptionIsNotAlreadyPresent($option);
        $this->ensureMaximumNumberOfOptionsIsNotExceeded();

        $this->options[] = $option;
    }

    private function ensureOptionIsNotAlreadyPresent($option)
    {
        // @todo
    }

    private function ensureMaximumNumberOfOptionsIsNotExceeded()
    {
        if (count($this->options) == 2) {
            // @todo
        }
    }
}