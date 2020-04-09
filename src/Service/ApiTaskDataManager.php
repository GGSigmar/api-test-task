<?php

namespace App\Service;

use App\Repository\InMemory\InMemoryCountryRepository;
use App\Repository\InMemory\InMemoryCurrencyRepository;
use App\Repository\InMemory\InMemoryProductRepository;

class ApiTaskDataManager
{
    /**
     * @var InMemoryCurrencyRepository
     */
    private $currencyRepository;

    /**
     * @var InMemoryCountryRepository
     */
    private $countryRepository;

    /**
     * @var InMemoryProductRepository
     */
    private $productRepository;

    /**
     * @param InMemoryCurrencyRepository $currencyRepository
     * @param InMemoryCountryRepository $countryRepository
     * @param InMemoryProductRepository $productRepository
     */
    public function __construct(

        InMemoryCurrencyRepository $currencyRepository,
        InMemoryCountryRepository $countryRepository,
        InMemoryProductRepository $productRepository
    ) {
        $this->currencyRepository = $currencyRepository;
        $this->countryRepository = $countryRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @return InMemoryCountryRepository
     */
    public function getCountryRepository(): InMemoryCountryRepository
    {
        return $this->countryRepository;
    }

    /**
     * @return InMemoryCurrencyRepository
     */
    public function getCurrencyRepository(): InMemoryCurrencyRepository
    {
        return $this->currencyRepository;
    }

    /**
     * @return InMemoryProductRepository
     */
    public function getProductRepository(): InMemoryProductRepository
    {
        return $this->productRepository;
    }
}