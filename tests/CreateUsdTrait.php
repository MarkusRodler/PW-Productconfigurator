<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

trait CreateUsdTrait
{
    private function createUsd()
    {
        $usd = $this->getMockBuilder(Currency::class)
                    ->disableOriginalConstructor()
                    ->getMock();

        $usd->method('currency')->willReturn('USD');

        return $usd;
    }
}