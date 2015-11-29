<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

class ArticleWithoutOptions extends Article
{
    public function totalPrice() : Money
    {
        return $this->basePrice();
    }
}
