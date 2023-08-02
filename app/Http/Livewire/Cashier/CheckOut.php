<?php

namespace App\Http\Livewire\Cashier;

use App\Models\Product;
use App\Models\Receipt;
use App\Models\Transaction;
use Exception;
use Livewire\Component;

class CheckOut extends Component
{
    public $items;
    public $sum;
    public $pay=0;
    public $invoiceID;
    public $kembalian;
    
    public function mount($context)
    {
        $this->items = $context['products'];
        $this->sum = $context['sum'];
    }

    public function render()
    {
        $this->kembalian = $this->pay-$this->sum;
        return view('livewire.cashier.check-out');
    }

    public function back()
    {
        $this->emit('backEvent', $this->items);
    }

    public function store()
    {
        // Nanti Di Ubah casa untuk setiap @casir
        $invoiceID = 'casa-1'.date("ymdHis");

        Receipt::create([
            'invoiceID'=>$invoiceID,
            'cart'=>json_encode($this->items),
            'pay'=>$this->pay
        ]);

        foreach ($this->items as $key => $value) {
            if($value['stock']-intval($value['quantity'])<0)
            {
                session()->flash('error','stock < quantity');
                break;
            }

            Transaction::create([
                'code'=>$value['upc'],
                'quantity'=>$value['quantity']
            ]);

            Product::where('upc','=',$value['upc'])
                    ->first()
                    ->update([
                        'stock'=>$value['stock']-intval($value['quantity'])
                    ]);
        }
        session()->flash('success','Data Berhasil Dimasukan');
        $this->emit("backEventStore",'Success');
    }
}