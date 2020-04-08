<?php

namespace App\Service;

use App\Entity\Currency;

class CurrencyExchanger
{
    /**
     * @param int $plnPrice
     * @param Currency $currency
     *
     * @return float
     */
    public function exchangeCurrency(int $plnPrice, Currency $currency): float
    {
        return (float) (round($plnPrice / $currency->getRate(), 2));
    }
}