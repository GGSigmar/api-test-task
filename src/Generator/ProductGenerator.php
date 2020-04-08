<?php

namespace App\Generator;

use App\Entity\Product;

class ProductGenerator
{
    private const SAMPLE_PRODUCT_PRICES = [
        9999,
        10000,
        5000,
        4545,
    ];

    /**
     * @return array
     */
    public function generateProductsForApiTask(): array
    {
        $products = [];
        $productId = 1;

        foreach (self::SAMPLE_PRODUCT_PRICES as $price) {
            $product = new Product($productId, $price);

            $products[] = $product;

            $productId++;
        }

        return $products;
    }
}