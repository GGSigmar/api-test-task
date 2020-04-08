<?php

namespace App\Repository\InMemory;

use App\Entity\Product;
use App\Generator\ProductGenerator;
use App\Repository\EntityRepositoryInterface;

class InMemoryProductRepository implements EntityRepositoryInterface
{
    /**
     * @var array|Product[]
     */
    private $products;

    /**
     * @var ProductGenerator
     */
    private $productGenerator;

    /**
     * @param ProductGenerator $productGenerator
     */
    public function __construct(ProductGenerator $productGenerator)
    {
        $this->productGenerator = $productGenerator;

        $this->products = $this->productGenerator->generateProductsForApiTask();
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->products;
    }

    /**
     * @param $id
     *
     * @return Product|null
     */
    public function getOneById($id): ?Product
    {
        foreach ($this->products as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }

        return null;
    }
}