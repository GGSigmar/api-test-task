<?php

namespace App\Generator;

use App\Entity\Currency;

class CurrencyGenerator
{
    private const SAMPLE_CURRENCIES = [
        [
            'name' => 'Polski Zloty',
            'code' => 'PLN',
            'rate' => 1,
        ],
        [
            'name' => 'United States Dollar',
            'code' => 'USD',
            'rate' => 4.16,
        ],
        [
            'name' => 'Euro',
            'code' => 'EUR',
            'rate' => 4.53,
        ],
    ];

    /**
     * @return array
     */
    public function generateCurrenciesForApiTask(): array
    {
        $currencies = [];

        foreach (self::SAMPLE_CURRENCIES as $currencyData) {
            $currency = $this->generateCountry($currencyData);

            $currencies[] = $currency;
        }

        return $currencies;
    }

    /**
     * @param array $currencyData
     *
     * @return Currency
     */
    private function generateCountry(array $currencyData): Currency
    {
        return new Currency($currencyData['name'], $currencyData['code'], $currencyData['rate']);
    }
}