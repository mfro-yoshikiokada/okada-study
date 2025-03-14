<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserStock extends Controller
{
    public function myCart()
    {
        $myCartStocks = \App\Models\UserStock::all();
        return view('myCart',compact('myCartStocks'));

    }
    public function addMyCart($stockId)
    {
        $userId = Auth::id();
        $cartAddInfo = $this->firstOrCreate(['stockId' => $stockId,'userId' => $userId]);

        if($cartAddInfo->wasRecentlyCreated){
            $message = 'カートに追加しました';
        }
        else{
            $message = 'カートに登録済みです';
        }

        return $message;
    }
}
