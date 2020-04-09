<?php

namespace App\Service;

use App\Entity\Country;
use App\Entity\Product;
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

    /**
     * @var PriceFormatter
     */
    private $priceFormatter;

    /**
     * @param CurrencyExchanger $currencyExchanger
     * @param ApiTaskDataManager $dataManager
     * @param PriceFormatter $priceFormatter
     */
    public function __construct(
        CurrencyExchanger $currencyExchanger,
        ApiTaskDataManager $dataManager,
        PriceFormatter $priceFormatter
    ) {
        $this->dataManager = $dataManager;
        $this->currencyExchanger = $currencyExchanger;
        $this->priceFormatter = $priceFormatter;
    }

    /**
     * @param int $productId
     * @param string $countryCode
     *
     * @return string
     *
     * @throws NotFoundException
     */
    public function getFormattedProductPriceForCountry(int $productId, string $countryCode): string
    {
        $product = $this->dataManager->getProductRepository()->getOneById($productId);

        if ($product === null) {
            throw new NotFoundException(Product::class);
        }

        $country = $this->dataManager->getCountryRepository()->getOneByCode(strtoupper($countryCode));

        if ($country === null) {
            throw new NotFoundException(Country::class);
        }

        $currency = $country->getCurrency();

        $foreignCurrencyPrice = $this->currencyExchanger->exchangeCurrency($product->getPrice(), $currency);

        return $this->priceFormatter->formatMoneyPrice($foreignCurrencyPrice, $currency->getCode());
    }
}