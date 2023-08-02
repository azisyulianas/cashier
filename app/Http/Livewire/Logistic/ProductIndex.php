<?php

namespace App\Http\Livewire\Logistic;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{

    use WithPagination;

    public $numRow=10;
    public $seacrh;
    public $editProduct=false;

    public $upc;
    public $name;
    public $price;
    public $stock;

    public $deleteId;
    public $nameDelete;


    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $numRow = $this->numRow;
        $search = $this->seacrh;
        $count = DB::table('products')->get()->count();
        $products = DB::table('products')
                    ->latest()
                    ->where('upc','like','%'.$search.'%')
                    ->orWhere('name','like','%'.$search.'%')
                    ->orWhere('price','like','%'.$search.'%')
                    ->orWhere('stock','like','%'.$search.'%')
                    ->paginate($numRow);

        $content = [
            'products'=>$products,
            'count'=>$count
        ];

        return view('livewire.logistic.product-index', $content);

    }

    public function store()
    {
        $this->validate([
            'upc' => 'required|string|unique:products|max:10|min:5',
            'name' => 'required|string|max:256',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:1',
        ]);

        $product = Product::create([
            'upc'=>$this->upc,
            'name'=>$this->name,
            'price'=>$this->price,
            'stock'=>$this->stock,
        ]);

        $this->cancel();

        session()->flash('success','Data '.$product['name'].' berhasil diinputkan');

    }

    public function getProduct(Product $product)
    {
        $this->upc = $product->upc;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->editProduct = true;
    }

    public function update(Product $product)
    {
        $this->validate([
            'name' => 'required|string|max:256',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:1',
        ]);

        $product->fill([
            'name'=>$this->name,
            'price'=>$this->price,
            'stock'=>$this->stock,
        ])->save();

        session()->flash('success','Data '.$product->upc.' berhasil Diupdate');
        
        $this->cancel();
    }

    public function cancel()
    {
        $this->editProduct = false;
        $this->upc = '';
        $this->name = '';
        $this->price = '';
        $this->stock = '';
    }

    public function getDelete(Product $product)
    {
        $this->deleteId = $product->upc;
        $this->nameDelete = $product->name;

    }

    public function delete(Product $product)
    {
        $name = $product->name;

        $product->delete();
        
        session()->flash('success','Data '.$name.' berhasil Dihapus');

    }

}
