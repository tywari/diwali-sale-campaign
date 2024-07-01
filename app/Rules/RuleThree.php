<?php

namespace App\Rules;

class RuleThree
{
    /**
     * @param array $products
     * @return array
     */
    public function apply(array $products): array
    {
        $payableItems = [];
        $discountedItems = [];

        while (count($products) >= 4) {
            $payable1 = array_shift($products);
            $payable2 = array_shift($products);

            $discounted1 = null;
            $discounted2 = null;

            foreach ($products as $index => $product) {
                if ($discounted1 === null && $product < $payable1) {
                    $discounted1 = $product;
                    unset($products[$index]);
                } elseif ($discounted2 === null && $product < $payable2) {
                    $discounted2 = $product;
                    unset($products[$index]);
                    break;
                }
            }

            $payableItems[] = $payable1;
            $payableItems[] = $payable2;

            if ($discounted1 !== null) {
                $discountedItems[] = $discounted1;
            }
            if ($discounted2 !== null) {
                $discountedItems[] = $discounted2;
            }

            $products = array_values($products); // Reindex the array
        }

        $payableItems = array_merge($payableItems, $products);

        return [
            'payable_items' => $payableItems,
            'discounted_items' => $discountedItems,
        ];
    }
}