<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

class ArticleWithoutOptions extends Article
{
    public function getTotalPrice() : Money
    {
        return $this->getBasePrice();
    }
}