<?php

namespace App\Service;

use Money\Money;

class PriceFormatter
{
    /**
     * @param Money $price
     * @param string $currencyCode
     *
     * @return string
     */
    public function formatMoneyPrice(Money $price, string $currencyCode): string
    {
        return (string) (round(($price->getAmount() / 100), 2)) . " ${currencyCode}";
    }
}