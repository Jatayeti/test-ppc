<?php

namespace App\Http\Controllers;

use App\Gateways\ProductGateway;
use App\Http\Requests\CalculateProductPriceRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return (new ProductGateway())->getAllProducts();
    }

    /**
     * @param CalculateProductPriceRequest $request
     * @return array
     */
    public function calculatePrice(CalculateProductPriceRequest $request): array
    {
        $productGateway = new ProductGateway();

        $product = $productGateway->getProductById($request->get('product_id'));
        abort_unless((bool)$product, 404, 'Product not found');

        return (new ProductGateway())->getCalculatedPrice($product, $request->get('tax_number'));
    }
}
