<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index()
    {
        $content = [
            'page'=>'Cashier',
            'sub_page'=>'1',
        ];

        return view('cashier/index', $content);
    }

    public function checkout()
    {
        $content = [
            'page'=>'Cashier',
            'sub_page'=>'1',
        ];

        return view('cashier/checkout', $content);
    }
}
