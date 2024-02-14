<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserStock extends Controller
{
    public function myCart()
    {
        $myCartStocks = \App\Models\UserStock::all();
        return view('myCart',compact('myCartStocks'));

    }
}
