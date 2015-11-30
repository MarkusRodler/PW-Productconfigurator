<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

class Money
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var Currency
     */
    private $currency;

    public function __construct(int $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function addTo(Money $money)
    {
        $this->ensureCurrenciesMatch($this->currency, $money->getCurrency());

        return new Money(
            $this->amount + $money->getAmount(),
            $this->currency
        );
    }

    public function getAmount() : int
    {
        return $this->amount;
    }

    public function getCurrency() : Currency
    {
        return $this->currency;
    }

    public function equals(Money $money) : bool
    {
        return $this->currency->equals($money->getCurrency()) &&
               $this->amount === $money->getAmount();
    }

    private function ensureCurrenciesMatch(Currency $myCurrency, Currency $yourCurrency)
    {
        if (!$myCurrency->equals($yourCurrency)) {
            throw new \InvalidArgumentException('Currency mismatch');
        }
    }
}
