<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\SubImage;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index($stockId, Stock $stock ,SubImage $subImage)
    {
        $stackData = $stock->showDetail($stockId);
        $genre = [
            "electrical-products"=>"電気製品",
            "antique"=>"骨董品",
            "parts"=>"部品",
            "drink"=>"飲み物",
            "food"=>"食品",
            "tool"=>"道具",
            "instrument"=>"楽器",
            "other"=>"その他"
        ];
        $subImages = $subImage->show($stockId);
        return view('detail',['stack' => $stackData, 'genre' => $genre, 'subImages'=> $subImages]);
    }
    public function delete ($stockId, Stock $stock) {
        $stackData = $stock->showDetail($stockId);
        $userId = Auth::id();
        if ($stackData['userId']==$userId) {
            $res = $stock->deleteDetail($stockId);
            if ($res) {
                return redirect('/');
            } else {
                return redirect('/detail/'. $stockId);
            }
        }else {
            return redirect('/detail/'. $stockId);
        }
    }
}
