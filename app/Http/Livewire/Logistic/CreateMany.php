<?php

namespace App\Http\Livewire\Logistic;

use App\Models\Product;
use Exception;
use Livewire\Component;

class CreateMany extends Component
{

    public $upc, $name, $price, $stock;
    public $inputs = [];
    public $i = 1;

    public function render()
    {
        return view('livewire.logistic.create-many');
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function resetInputFields()
    {
        $this->upc = '';
        $this->name = '';
        $this->price = '';
        $this->stock = '';
    }

    public function store()
    {
        try
        {
            $this->validate([
                'upc.0' => 'required|string|max:10|min:5',
                'name.0' => 'required|string|max:256',
                'price.0' => 'required|numeric|min:0',
                'stock.0' => 'required|numeric|min:1',
                'upc.*' => 'required|string|max:10|min:5',
                'name.*' => 'required|string|max:256',
                'price.*' => 'required|numeric|min:0',
                'stock.*' => 'required|numeric|min:1',
            ]);
            
            foreach ($this->upc as $key => $value)
            {
                Product::create([
                    'upc'=>$this->upc[$key],
                    'name'=>$this->name[$key],
                    'price'=>$this->price[$key],
                    'stock'=>$this->stock[$key],
                ]);
            }
    
            $this->inputs = [];
    
            $this->resetInputFields();
            
            return redirect()
                   ->route('logistic.index')
                   ->with('success', 'Data Products Berhasil Dimasukan.');

        }catch(Exception $e)
        {
            session()->flash('error',$e->getMessage());
        }

    }

}
