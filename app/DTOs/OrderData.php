<?php

namespace App\DTOs;

class OrderData
{
    public function __construct(
        public readonly int $clientId,
        public readonly float $totalPrice = 0.0,
        public readonly float $subtotal = 0.0,
        public readonly float $discount = 0.0,
        public readonly float $deliveryPrice = 0.0,
        public readonly ?string $notes = null,
        public readonly string $address = '',
        public readonly string $payment = 'cash',
        public readonly array $items = [],
        public readonly string $status = 'prepare',
        public readonly ?int $userId = null
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            clientId: $data['client_id'] ?? $data['selectedClient'] ?? 0,
            totalPrice: $data['total_price'] ?? $data['invoiceTotal'] ?? 0.0,
            subtotal: $data['subtotal'] ?? $data['subTotal'] ?? 0.0,
            discount: $data['discount'] ?? 0.0,
            deliveryPrice: $data['delivery_price'] ?? $data['delivery'] ?? 0.0,
            notes: $data['notes'] ?? null,
            address: $data['address'] ?? '',
            payment: $data['payment'] ?? 'cash',
            items: $data['items'] ?? [],
            status: $data['status'] ?? 'prepare',
            userId: $data['user_id'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'client_id' => $this->clientId,
            'total_price' => $this->totalPrice,
            'subtotal' => $this->subtotal,
            'discount' => $this->discount,
            'delivery_price' => $this->deliveryPrice,
            'notes' => $this->notes,
            'address' => $this->address,
            'payment' => $this->payment,
            'items' => $this->items,
            'status' => $this->status,
            'user_id' => $this->userId,
        ];
    }
}
