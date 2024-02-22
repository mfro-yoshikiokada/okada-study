<?php

namespace App\Http\Controllers;

use App\Models\Stock; //追加
use App\Models\UserStock; //追加
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::SimplePaginate(6); //Eloquantで検索
        return view('stocks', ['stocks' => $stocks]);
    }

    public function myCart(UserStock $userStock)
    {
        $myCartStocks = $userStock->showMyCart();
        return view('myCart',compact('myCartStocks'));
    }
    public function addPage()
    {
        $img_name = realpath("image");
        return view('addStock', ['img_name' => $img_name]);
    }
    public function addStock(Request $request)
    {
        $name = $request->input('name');
        $explanation = $request->input('explanation');
        $fee = (int) $request->input('fee');
        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
        $img_name = substr(str_shuffle($str), 0, 10);
        $image_directory = "/var/www/html/laravel-tutorial/public/image/";
        $tmp_file_path = $_FILES["file"]["tmp_name"];
        $destination_path = $image_directory . $img_name . '.jpeg';
        Stock::create([
            'name' => $name,
            'explain' => $explanation,
            'fee' => $fee,
            'imagePath' => $img_name . '.jpeg'
        ]);
        move_uploaded_file($tmp_file_path, $destination_path);
        header("Location:laravel-tutorial/public/");
        exit;
    }

    public function addMycart(Request $request,UserStock $userStock)
    {

        //カートに追加の処理
        $stockId=$request->stockId;
        $message = $userStock->addCart($stockId);

        //追加後の情報を取得
        $myCartStocks = $userStock->showMyCart();

        return view('myCart',compact('myCartStocks' , 'message'));

    }
    public function deleteMyCartStock(Request $request,UserStock $userStock)
    {

        //カートから削除の処理
        $stockId=$request->stockId;
        $message = $userStock->deleteMyCartStock($stockId);

        //追加後の情報を取得
        $myCartStocks = $userStock->showMyCart();

        return view('myCart',compact('myCartStocks' , 'message'));

    }
}
