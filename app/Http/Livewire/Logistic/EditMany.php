<?php

namespace App\Http\Livewire\Logistic;

use App\Models\Product;
use Livewire\Component;

class EditMany extends Component
{

    public $items = [];
    public $lists = [];
    public $editProducts = [];
    
    public function render()
    {
        $this->items = Product::all()->toArray();
        $this->emit('productStore');
        $upc = $this->lists;

        $this->editProducts = Product::whereIn('upc', $upc)->get();


        return view('livewire.logistic.edit-many');
    }

    public function addProduct($product)
    {
        dd($product);
        $collection = [
            'upc'=>$product->upc,
            'name'=>$product->name,
            'stock'=>$product->stock,
            'price'=>$product->price,
        ];
        array_push($this->lists , $collection);
    }
}
