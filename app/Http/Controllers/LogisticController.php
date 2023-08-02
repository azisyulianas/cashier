<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogisticController extends Controller
{
    public function index()
    {
        $content = [
            'page'=>'Logistic',
            'sub_page'=>'1'
        ];
        
        return view('logistic/index', $content);
    }

    public function manyCreate()
    {
        $content = [
            'page'=>'Logistic',
            'sub_page'=>'2'
        ];
        
        return view('logistic/createmany', $content);
    }

    public function manyEdit()
    {
        $content = [
            'page'=>'Logistic',
            'sub_page'=>'3'
        ];
        
        return view('logistic/editmany', $content);
    }
}
