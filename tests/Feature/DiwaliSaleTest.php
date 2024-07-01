<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiwaliSaleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_diwali_sale_rule_one(): void
    {
        $products = [10, 20, 30, 40, 50, 60];
        $response = $this->post('/api/diwali-sale', ['products' => $products, 'rule' => 'rule_one']);
        $response->assertJson([
            'discounted_items' => [50, 30, 10],
            'payable_items' => [60, 40, 20],
        ]);
    }

    /**
     * @return void
     */
    public function test_diwali_sale_rule_two(): void
    {
        $products = [10, 20, 30, 40, 40, 50, 60, 60];
        $response = $this->post('/api/diwali-sale', ['products' => $products, 'rule' => 'rule_two']);
        $response->assertJson([
            'discounted_items' => [50, 40, 30, 10],
            'payable_items' => [60, 60, 40, 20],
        ]);
    }

    /**
     * @return void
     */
    public function test_diwali_sale_rule_three(): void
    {
        $products = [5, 5, 10, 20, 30, 40, 50, 50, 50, 60];
        $response = $this->post('/api/diwali-sale', ['products' => $products, 'rule' => 'rule_three']);
        $response->assertJson([
            'discounted_items' => [50, 40, 20, 10],
            'payable_items' => [60, 50, 50, 30, 5, 5],
        ]);
    }
}