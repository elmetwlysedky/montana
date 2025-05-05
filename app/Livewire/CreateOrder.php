<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
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
    public $delivery;
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

    public function mount()
    {
        $num = Order::latest()->first();
        $this->invoice_num = $num->id +1;

        $this->items = [['id' => null, 'quantity' => 1, 'productPrice' => 0, 'totalPrice' => 0]];
        $this->products = Product::get();
        $this->clients = Client::get();

    }

    public function render(){


        return view('livewire.create-order');
    }

    public function updateItems(){
        $this->subTotal = 0;
        foreach ($this->items as $index => $item) {
            if (!empty($item['id'])) {
                $product = Product::find($item['id']);
                if ($product) {
                    $this->items[$index]['productPrice'] = $product->price_of_sale;
                    $this->items[$index]['totalPrice'] = $product->price_of_sale * $item['quantity'];
                    $this->subTotal += $this->items[$index]['totalPrice'];
                }
            }
        }
        if ($this->discount > 0) {
            $this->subTotal -= ($this->subTotal * ($this->discount / 100));
        }
        // Format invoice total to 2 decimal places
        $this->subTotal = number_format($this->subTotal, 2, '.', '');
        $this->invoiceTotal = $this->subTotal + $this->delivery;
    }

    public function updated($propertyName)
    {
        if (str_contains($propertyName, 'items.')) {
            $this->updateItems();
        }
        if ($propertyName === 'discount') {
            $this->updateItems();
        }
        if ($propertyName === 'delivery') {
            $this->updateItems();
        }
    }

    public function saveInvoice()
    {
        $this->validate();

        try {
            // Create the order
            $order = Order::create([
                'client_id' => $this->selectedClient,
                'total_price' => $this->invoiceTotal,
                'status' => 'Prepare',
                'subtotal' => $this->subTotal,
                'discount' => $this->discount,
                'delivery_price' => $this->delivery,
                'notes' => $this->notes,
                'address' => $this->address,
                'payment' => $this->payment,


            ]);

            // Save order products
            foreach ($this->items as $item) {
                if (!empty($item['id'])) {
                    $order->products()->attach($item['id'], [
                        'price' => $item['productPrice'],
                        'quantity' => $item['quantity']
                    ]);
                }
            }

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
