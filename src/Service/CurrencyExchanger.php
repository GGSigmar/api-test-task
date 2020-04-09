<?php

namespace App\Service;

use App\Entity\Currency;
use Money\Money;

class CurrencyExchanger
{
    /**
     * @param Money $plnPrice
     * @param Currency $currency
     *
     * @return Money
     */
    public function exchangeCurrency(Money $plnPrice, Currency $currency): Money
    {
        return $plnPrice->divide($currency->getRate());
    }
}