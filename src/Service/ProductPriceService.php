<?php

namespace App\Service;

use App\Exception\NotFoundException;

class ProductPriceService
{
    /**
     * @var ApiTaskDataManager
     */
    private $dataManager;

    /**
     * @var CurrencyExchanger
     */
    private $currencyExchanger;

    public function __construct(
        CurrencyExchanger $currencyExchanger,
        ApiTaskDataManager $dataManager
    ) {
        $this->dataManager = $dataManager;
        $this->currencyExchanger = $currencyExchanger;
    }

    /**
     * @param int $productId
     * @param string $countryCode
     *
     * @return string
     *
     * @throws NotFoundException
     */
    public function getProductPriceForCountry(int $productId, string $countryCode): string
    {
        $product = $this->dataManager->getProductRepository()->getOneById($productId);

        if ($product === null) {
            throw new NotFoundException('product');
        }

        $country = $this->dataManager->getCountryRepository()->getOneByCode(strtoupper($countryCode));

        if ($country === null) {
            throw new NotFoundException('country');
        }

        $currency = $country->getCurrency();

        $foreignCurrencyPrice = $this->currencyExchanger->exchangeCurrency($product->getPrice(), $currency);

        return $this->formatPriceInteger($foreignCurrencyPrice, $currency->getCode());
    }

    /**
     * @param float $price
     * @param string $currencyCode
     *
     * @return string
     */
    private function formatPriceInteger(float $price, string $currencyCode): string
    {
        return (string) (round(($price / 100), 2)) . " ${currencyCode}";
    }
}