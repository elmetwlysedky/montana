<?php

namespace App\Services;

use App\Models\Product;

class OrderCalculatorService
{
    public function calculateSubtotal(array $items): float
    {
        $subtotal = 0;
        foreach ($items as $item) {
            if (!empty($item['product_id'])) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    $subtotal += $product->price_of_sale * $item['quantity'];
                }
            }
        }
        return $subtotal;
    }

    public function applyDiscount(float $subtotal, float $discount): float
    {
        if ($discount > 0) {
            $subtotal = $subtotal - ($subtotal * ($discount / 100));
        }
        return number_format($subtotal, 2, '.', '');
    }

    public function calculateTotal(float $subtotal, float $delivery): float
    {
        return $subtotal + $delivery;
    }
}
