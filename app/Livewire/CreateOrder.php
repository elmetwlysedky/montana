<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use App\Services\OrderService;
use App\Services\OrderCalculatorService;
use Livewire\Component;

class CreateOrder extends Component
{
    public $invoice_num ;
    public $clients;
    public $selectedClient;
    public $subTotal;
    public $invoiceTotal;
    public $discount = 0;
    public $items = [];
    public $notes;
    public $payment;
    public $delivery = 0;
    public $address;
    public $products;

    protected $rules = [
        'selectedClient' => 'required|numeric|exists:clients,id',
        'items.*.id' => 'required|numeric|exists:products,id',
        'items.*.quantity' => 'required|integer|min:1',
        'discount' => 'nullable|numeric|min:0|max:100',
        'notes' => 'required|string|max:220',
        'address' => 'required|string|max:220',
        'payment' => 'required|in:visa,cash',
        'delivery' => 'required|numeric|min:0'

    ];

        protected OrderService $orderService;
        protected OrderCalculatorService $calculatorService;

    public function boot(
        OrderService  $orderService,
        OrderCalculatorService $calculatorService
    ) {
       $this->orderService = $orderService;
       $this->calculatorService = $calculatorService;
    }

    public function mount()
    {
        $num = Order::latest()->first();
        $this->invoice_num = $num->id + 1;

        $this->items = [['id' => null, 'quantity' => 1, 'productPrice' => 0, 'totalPrice' => 0]];
        $this->products = Product::get();
        $this->clients = Client::get();

    }

    public function render()
    {
        return view('livewire.create-order');
    }


    public function updateItems()
    {
        // Update product prices in items array
        foreach ($this->items as $index => $item) {
            if (!empty($item['id'])) {
                $product = Product::find($item['id']);
                if ($product) {
                    $this->items[$index]['productPrice'] = $product->price_of_sale;
                    $this->items[$index]['totalPrice'] = $product->price_of_sale * $item['quantity'];
                    // Add product_id for calculator service
                    $this->items[$index]['product_id'] = $item['id'];
                }
            }
        }

        // Calculate totals using the calculator service
        $this->subTotal = $this->calculatorService->calculateSubtotal($this->items);
        $this->subTotal = $this->calculatorService->applyDiscount($this->subTotal, $this->discount);
        $this->invoiceTotal = $this->calculatorService->calculateTotal($this->subTotal, $this->delivery);
    }

    public function updated($propertyName)
    {
        if (str_contains($propertyName, 'items.') ||
            $propertyName === 'discount' ||
            $propertyName === 'delivery') {
            $this->updateItems();
        }
    }

    public function saveInvoice()
    {
        $this->validate();

        // Validate stock using OrderService
        if ($error = $this->orderService->validateStock($this->items)) {
            session()->flash('error', $error);
            return;
        }

        try {
            $orderData = new \App\DTOs\OrderData(
                clientId: $this->selectedClient,
                totalPrice: $this->invoiceTotal,
                subtotal: $this->subTotal,
                discount: $this->discount,
                deliveryPrice: $this->delivery,
                notes: $this->notes,
                address: $this->address,
                payment: $this->payment,
                items: $this->items
            );

            $this->orderService->createOrder($orderData);

            session()->flash('success', 'Order created successfully!');
            $this->formReset();
        } catch (\Exception $e) {
            session()->flash('error', 'Error creating order: ' . $e->getMessage());
        }
    }




    public function addProduct()
    {
        $this->items[] = ['id' => null, 'quantity' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
        $this->updateItems();
    }

    public function formReset(){
        $this->selectedClient = null;
        $this->items = [['id' => null, 'quantity' => 1, 'productPrice' => 0, 'totalPrice' => 0]];
        $this->discount = 0;
        $this->subTotal = 0;
        $this->notes = null;
        $this->address = null;
        $this->payment = null;
        $this->delivery = 0;
        $this->updateItems();
    }
}
