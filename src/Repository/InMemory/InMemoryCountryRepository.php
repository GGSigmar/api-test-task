<?php

namespace App\Repository\InMemory;

use App\Entity\Country;
use App\Generator\CountryGenerator;
use App\Repository\EntityRepositoryInterface;

class InMemoryCountryRepository implements EntityRepositoryInterface
{
    /**
     * @var array|Country[]
     */
    private $countries;

    /**
     * @var CountryGenerator
     */
    private $countryGenerator;

    /**
     * @param CountryGenerator $countryGenerator
     */
    public function __construct(CountryGenerator $countryGenerator)
    {
        $this->countryGenerator = $countryGenerator;

        $this->countries = $this->countryGenerator->generateCountriesForApiTask();
    }

    /**
     * @return array|Country[]
     */
    public function getAll(): array
    {
        return $this->countries;
    }

    /**
     * @param $id
     *
     * @return Country|null
     */
    public function getOneById($id): ?Country
    {
        foreach ($this->countries as $country) {
            if ($country->getId() === $id) {
                return $country;
            }
        }

        return null;
    }

    /**
     * @param string $countryCode
     *
     * @return Country|null
     */
    public function getOneByCode(string $countryCode): ?Country
    {
        foreach ($this->countries as $country) {
            if ($country->getCode() === $countryCode) {
                return $country;
            }
        }

        return null;
    }
}