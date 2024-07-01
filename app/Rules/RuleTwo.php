<?php

namespace App\Rules;

class RuleTwo
{
    /**
     * @param array $products
     * @return array
     */
    public function apply(array $products): array
    {
        $payableItems = [];
        $discountedItems = [];

        while (count($products) > 1) {
            $payable = array_shift($products);
            foreach ($products as $index => $product) {
                if ($product < $payable) {
                    $discountedItems[] = $product;
                    unset($products[$index]);
                    break;
                }
            }
            $payableItems[] = $payable;
            $products = array_values($products); // Reindex the array
        }

        $payableItems = array_merge($payableItems, $products);

        return [
            'payable_items' => $payableItems,
            'discounted_items' => $discountedItems,
        ];
    }
}