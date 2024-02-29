<?php

namespace App\Http\Controllers;

use App\Models\Stock; //追加
use App\Models\UserStock; //追加
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::SimplePaginate(20); //Eloquantで検索
        return view('stocks', ['stocks' => $stocks]);
    }

    public function myCart(UserStock $userStock)
    {
        $myCartStocks = $userStock->showMyCart();
        return view('myCart',compact('myCartStocks'));
    }

    public function addPage()
    {
        return view('addStock');
    }

    public function addStock(Request $request)
    {

        try {
            $this->insertStock($request);
        } catch (\Exception $e) {
            return redirect('addStockError')
                ->withErrors($e->getMessage())
                ->withInput();
        }

        return redirect('/');

    }
    private function insertStock(Request $request)
    {
        // バリデーションに成功したデータを取得
        $validatedData = $request->validated();

        // ここで $validatedData を使って処理を行う
        // 例: $validatedData['name'], $validatedData['explain'], $validatedData['fee'] など

        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
        $img_name = substr(str_shuffle($str), 0, 10);
        $image_directory = "/var/www/html/laravel-tutorial/public/image/";
        $tmp_file_path = $request->file('file')->getPathname(); // ファイルのパスを取得する方法に修正
        $destination_path = $image_directory . $img_name . '.jpeg';

        $stock = new Stock();

        // Stockモデルのinsertメソッド内で$requestを使用すると仮定
        $stock->insert($request, $img_name . '.jpeg');

        move_uploaded_file($tmp_file_path, $destination_path);

        return redirect('/');
    }

// StockController.php 内

    public function addStockError()
    {
        return view('addStockError');
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
