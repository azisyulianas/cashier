<?php

namespace App\Http\Livewire\Cashier;

use App\Models\Product;
use Livewire\Component;

class CashierIndex extends Component
{
    public $search = '';
    public $is_checkout = false;
    public $inputs = [];
    public $quantity, $context;

    protected $listeners = [
        'backEvent'=>'backEventHandler',
        'backEventStore'=>'backEventStoreHandler',
    ];
    public function backEventStoreHandler()
    {
        $this->is_checkout = false;
        $this->inputs = [];
    }
    public function backEventHandler($value)
    {
        $this->inputs = $value;
        $this->is_checkout = false;
    }

    public function render()
    {   
        $search = $this->search;
        if($search !== '')
        {
            $products = Product::latest()
                        ->where('upc','like','%'.$search.'%')
                        ->orWhere('name','like','%'.$search.'%')
                        ->get();
        }
        else
        {
            $products = [];
        }

        $content = [
            'products' => $products
        ];

        return view('livewire.cashier.cashier-index', $content);
    }

    public function addProduct(Product $product)
    {   
        $upc = $product->upc;
        $result = (array_search($upc, array_column($this->inputs, 'upc')) !== FALSE);
        if(!$result)
        {
            $collection = [
                'upc'=>$product->upc,
                'name'=>$product->name,
                'stock'=>$product->stock,
                'price'=>$product->price,
            ];
            array_push($this->inputs , $collection);
            session()->flash('success','Data '.$product->name.' berhasil diinputkan');
        }
        else
        {
            session()->flash('success','Data '.$product->name.' berhasil diinputkan');
        }
    }

    public function checkout()
    {
        foreach ($this->inputs as $key => $value) {
            $this->inputs[$key]['quantity']=intval($this->quantity[$key]);
            $this->inputs[$key]['total']=intval($this->quantity[$key])*$value['price'];
        }
        $total = array_sum(array_column($this->inputs,'total'));
        $this->context = [
            'products'=>$this->inputs,
            'sum'=>$total
        ];
        $this->is_checkout = true;
    }

    public function remove($key)
    {
        unset($this->inputs[$key]);
    }

    public function show()
    {
        dd($this->inputs);
    }
}
