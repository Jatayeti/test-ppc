<?php

namespace App\Gateways;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductGateway
{
    /**
     * @param $code
     * @return string
     */
    private function getCountryName($code): string
    {
        $countries = [
            'DE' => 'Germany',
            'IT' => 'Italy',
            'GR' => 'Greece'
        ];

        return $countries[$code];
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllProducts()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * @param $product_id
     * @return Product
     */
    public function getProductById($product_id): Product
    {
        return Product::find($product_id);
    }

    /**
     * @param Product $product
     * @param $tax_number
     * @return array
     */
    public function getCalculatedPrice(Product $product, $tax_number): array
    {
        $taxRates = Product::TAX_RATES;
        $taxNumber = $tax_number;
        $countryCode = substr($taxNumber, 0, 2);
        $taxRate = $taxRates[$countryCode];
        $finalPrice = $product->price * (1 + $taxRate);

        return [
            'product' => $product->name,
            'country' => $this->getCountryName($countryCode),
            'price' => number_format($finalPrice, 2)
        ];
    }
}
