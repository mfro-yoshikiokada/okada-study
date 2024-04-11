<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\SubImage;
use Illuminate\Http\Request;


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
}
