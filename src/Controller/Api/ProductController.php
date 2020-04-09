<?php

namespace App\Controller\Api;

use App\Service\ProductPriceService;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends BaseApiController
{
    /**
     * @Route("/api/v1/products/{productId}/country-price/{countryCode}", methods={"GET"}, name="get_product_country_price")
     */
    public function getProductCountryPriceAction(int $productId, string $countryCode, ProductPriceService $productPriceService)
    {
        try {
            $currencyPrice = $productPriceService->getFormattedProductPriceForCountry($productId, $countryCode);
        } catch (\Exception $e) {
            return $this->createApiErrorResponse($e->getMessage(), $e->getCode());
        }

        $data = [
            'price' => $currencyPrice,
        ];

        return $this->createApiResponse($data);
    }
}