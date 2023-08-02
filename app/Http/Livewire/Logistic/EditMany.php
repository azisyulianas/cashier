<?php

namespace App\Http\Livewire\Logistic;

use App\Models\Product;
use Exception;
use Livewire\Component;

class EditMany extends Component
{

    public $items = [];
    public $lists = [];
    public $upc = [];
    public $name = [];
    public $stock = [];
    public $price = [];
    
    public function render()
    {
        $this->items = Product::all()->toArray();
        $this->emit('productStore');
        $upc = $this->lists;

        $this->upc = Product::whereIn('upc', $upc)->get('upc')->toArray();
        return view('livewire.logistic.edit-many');

    }

    public function update()
    {
        $upc = $this->lists;
        $price = array_map('intval', $this->price);
        $stock = array_map('intval', $this->stock);
        try {
            foreach ($upc as $key => $value) {
              Product::where('upc', $value)
                ->update([
                    'name'=>$this->name[$key],
                    'stock'=>$stock[$key],
                    'price'=>$price[$key]
                ]);
            }
            session()->flash('success','Update Berhasil');
            return to_route('logistic.index');
        } catch (Exception $e) {
            session()->flash('error',$e->getMessage());
        }
        
    }

    public function show()
    {
        dd($this->stock);
    }
}
