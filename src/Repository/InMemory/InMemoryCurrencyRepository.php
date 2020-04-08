<?php

namespace App\Repository\InMemory;

use App\Entity\Currency;
use App\Generator\CountryGenerator;
use App\Generator\CurrencyGenerator;
use App\Repository\EntityRepositoryInterface;

class InMemoryCurrencyRepository implements EntityRepositoryInterface
{
    /**
     * @var array|Currency[]
     */
    private $currencies;

    /**
     * @var CurrencyGenerator
     */
    private $currencyGenerator;

    /**
     * @param CurrencyGenerator $currencyGenerator
     */
    public function __construct(CurrencyGenerator $currencyGenerator)
    {
        $this->currencyGenerator = $currencyGenerator;

        $this->currencies = $this->currencyGenerator->generateCurrenciesForApiTask();
    }

    /**
     * @return array|Currency[]
     */
    public function getAll(): array
    {
        return $this->currencies;
    }

    /**
     * @param $id
     *
     * @return Currency|null
     */
    public function getOneById($id): ?Currency
    {
        foreach ($this->currencies as $currency) {
            if ($currency->getId() === $id) {
                return $currency;
            }
        }

        return null;
    }

    /**
     * @param string $currencyCode
     *
     * @return Currency|null
     */
    public function getOneByCode(string $currencyCode): ?Currency
    {
        foreach ($this->currencies as $currency) {
            if ($currency->getCode() === $currencyCode) {
                return $currency;
            }
        }

        return null;
    }
}