<?php

namespace App\Services;

use App\DTOs\OrderData;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createOrder(OrderData $orderData): Order
    {
        return DB::transaction(function () use ($orderData) {
            // First validate stock with locks
            if ($error = $this->validateStock($orderData->items)) {
                throw new \Exception($error);
            }

            // Create the order
            $order = Order::create([
                'user_id' => 1, // TODO: Get from auth
                'client_id' => $orderData->clientId,
                'total_price' => $orderData->totalPrice,
                'status' => 'Prepare',
                'subtotal' => $orderData->subtotal,
                'discount' => $orderData->discount,
                'delivery_price' => $orderData->deliveryPrice,
                'notes' => $orderData->notes,
                'address' => $orderData->address,
                'payment' => $orderData->payment,
            ]);

            // Attach products and update stock
            foreach ($orderData->items as $item) {
                $productId = $item['id'] ?? $item['product_id'] ?? null;
                if (!$productId) {
                    continue;
                }

                $product = Product::lockForUpdate()->findOrFail($productId);
                $quantity = $item['quantity'] ?? 0;

                // Update stock
                $product->quantity -= $quantity;
                $product->save();

                $order->products()->attach($productId, [
                    'price' => $item['productPrice'] ?? $product->price_of_sale,
                    'quantity' => $quantity
                ]);
            }

            return $order;
        });
    }

    public function validateStock(array $items): ?string
    {
        foreach ($items as $item) {
            $productId = $item['id'] ?? $item['product_id'] ?? null;
            if (!$productId) {
                continue;
            }

            $product = Product::findOrFail($productId);
            $quantity = $item['quantity'] ?? 0;

            if ($quantity > $product->quantity) {
                return $product->name . ' ' . __('main.not_available_stock');
            }
        }
        return null;
    }
}
