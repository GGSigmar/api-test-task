<?php

namespace App\Generator;

use App\Entity\Country;
use App\Repository\InMemory\InMemoryCurrencyRepository;

class CountryGenerator
{
    private const SAMPLE_COUNTRIES = [
        [
            'name' => 'Poland',
            'code' => 'PL',
            'currencyCode' => 'PLN',
        ],
        [
            'name' => 'United States',
            'code' => 'US',
            'currencyCode' => 'USD',
        ],
        [
            'name' => 'Puerto Rico',
            'code' => 'PR',
            'currencyCode' => 'USD',
        ],
        [
            'name' => 'Germany',
            'code' => 'DE',
            'currencyCode' => 'EUR',
        ],
        [
            'name' => 'France',
            'code' => 'FR',
            'currencyCode' => 'EUR',
        ],
    ];

    /**
     * @var InMemoryCurrencyRepository
     */
    private $currencyRepository;

    /**
     * @param InMemoryCurrencyRepository $currencyRepository
     */
    public function __construct(InMemoryCurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @return array
     */
    public function generateCountriesForApiTask(): array
    {
        $countries = [];

        foreach (self::SAMPLE_COUNTRIES as $countryData) {
            $country = $this->generateCountry($countryData);

            $countries[] = $country;
        }

        return $countries;
    }

    /**
     * @param array $countryData
     *
     * @return Country
     */
    private function generateCountry(array $countryData): Country
    {
        $currency = $this->currencyRepository->getOneByCode($countryData['currencyCode']);

        return new Country($countryData['name'], $countryData['code'], $currency);
    }
}