<?php

namespace App\Http\Controllers;

use App\Models\Stock; //追加
use App\Models\UserStock; //追加
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\SubImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ArticleStoreRequest;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::SimplePaginate(20);
        return view('stocks', ['stocks' => $stocks]);
    }

    public function myCart(UserStock $userStock)
    {
        $myCartStocks = $userStock->showMyCart();
        return view('myCart',compact('myCartStocks'));
    }

    public function addPage(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('addStock');
    }
    private function addSubImage($stockId,$path) {
        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
        $img_name = substr(str_shuffle($str), 0, 10);
        $image_directory = "/var/www/html/laravel-tutorial/public/image/";
        $tmp_file_path = $_FILES["file"]["tmp_name"];
        $destination_path = $image_directory . $img_name . '.jpeg';
        $subImage = new SubImage();
        $subImage->insert($stockId,$img_name . '.jpeg');
        move_uploaded_file($tmp_file_path, $destination_path);
    }
    public function addStock(ArticleStoreRequest $request)
    {
        $subFiles =$request['sub-files'];
        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
        $img_name = substr(str_shuffle($str), 0, 10);
        $image_directory = "/var/www/html/laravel-tutorial/public/image/";
        $tmp_file_path = $_FILES["file"]["tmp_name"];
        $destination_path = $image_directory . $img_name . '.jpeg';
        $name = (string) $request->input('name');
        $exlanation = (string) $request->input('explanation');
        $genre = (string) $request->input('genre');
        $fee = (int) $request->input('fee');
        $stock = new Stock();
        $stockId=(int) $stock->insert($name, $exlanation, $fee, $genre,$img_name . '.jpeg');
        move_uploaded_file($tmp_file_path, $destination_path);

        if ($subFiles!== null) {
            for ($num = 0; $num < 4; $num++){
                $file = $subFiles[$num];
                $path = $file["photo"]->getClientOriginalName();
                $this->addSubImage($stockId, $path);
            }

        }
        return redirect('/');
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
