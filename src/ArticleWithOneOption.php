<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

class ArticleWithOneOption extends Article
{
    /**
     * @var Option
     */
    private $option;

    /**
     * @param Option $option
     */
    public function setOption(Option $option)
    {
        $this->option = $option;
    }

    /**
     * @return Option
     */
    public function getOption() : Option
    {
        return $this->option;
    }

    /**
     * @return Money
     */
    public function totalPrice() : Money
    {
        return $this->getBasePrice()->addTo($this->option->price());
    }
}
