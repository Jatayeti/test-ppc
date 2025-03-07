<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PriceCalculationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->seed();
    }

    public function test_api_products_endpoint()
    {
        $response = $this->getJson('/api/products');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'price']
                ]
            ])
            ->assertJsonCount(5, 'data');
    }

    public function test_api_price_calculation()
    {
        $product = Product::first();
        $response = $this->postJson('/api/calculate', [
            'product_id' => $product->id,
            'tax_number' => 'DE123456789'
        ]);

        $expectedPrice = number_format($product->price * 1.19, 2);
        $response->assertStatus(200)
            ->assertJson([
                'product' => $product->name,
                'country' => 'Germany',
                'price' => $expectedPrice
            ]);
    }

    protected function tearDown(): void
    {
        $this->artisan('migrate:rollback');
        parent::tearDown();
    }
}
