<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Product;
use Livewire\Component;

class CreateOrder extends Component
{
    public $invoice_num = 1;
    public $clients;
    public $invoiceTotal ;
    public $discount =0 ;
    public $items =[] ;
    public $products  ;



    protected $rules =[

        'clients' => 'required|numeric|exists:clients,id',
        'items.*.id' => 'required|numeric|exists:products,id',
        'items.*.quantity'=> 'required|integer|min:1',
        'discount' => 'nullable|numeric|min:0|max:100',
    ];

    public function mount()
    {
        $this->items = [['id' => null, 'quantity' => 1, 'productPrice' => 0, 'totalPrice' => 0]];
        $this->products =Product::get();
        $this->clients =Client::get();
    }


    public function render()
    {


        return view('livewire.create-order');
    }


    public function updateItems(){


        $this->invoiceTotal = 0;
        foreach ($this->items as $index => $item) {
            if (!empty($item['id'])) {
                $product = Product::find($item['id']);
                if ($product) {
//                    dd($product->price_of_sale);
                    $this->items[$index]['productPrice'] = $product->price_of_sale;
                    $this->items[$index]['totalPrice'] = $product->price_of_sale * $item['quantity'];
                    $this->invoiceTotal += $this->items[$index]['totalPrice'];

                }
            }
        }
        if ($this->discount > 0) {
            $this->invoiceTotal -= ($this->invoiceTotal * ($this->discount / 100));
        }

    }

    public function updated($propertyName)
    {
        if (str_contains($propertyName, 'items.')) {
            $this->updateItems(); // Trigger the calculation
        }
        if ($propertyName === 'discount') {
            $this->updateItems(); // Recalculate prices

        }
    }

    public function saveInvoice()
    {
        $this->validate();

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
        $this->clients = null;
        $this->items = [];
        $this->discount = null;
        $this->invoiceTotal = null;
    }

}
