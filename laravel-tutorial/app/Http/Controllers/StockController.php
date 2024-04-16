<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\UserStock;
use App\Models\SubImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\Updaterequest;

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
    private function addSubImage($stockId, $path, $imgNum) {
        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
        $img_name = substr(str_shuffle($str), 0, 10);
        $image_directory = "/var/www/html/laravel-tutorial/public/image/";
        $tmp_file_path = $_FILES[$path]["tmp_name"];
        $destination_path = $image_directory . $img_name . '.jpeg';
        $subImage = new SubImage();
        $subImage->insert($stockId, $img_name . '.jpeg', $imgNum);
        move_uploaded_file($tmp_file_path, $destination_path);

    }
    public function addStock(ArticleStoreRequest $request)
    {
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
        $userId = (int)Auth::id();
        $stockId=(int) $stock->insert($name, $exlanation, $fee, $genre,$img_name . '.jpeg', $userId);
       move_uploaded_file($tmp_file_path, $destination_path);
        if ($request['sub-file-1'] !== null) {
            $file1 = $request['sub-file-1'];
            $path = $file1->getClientOriginalName();
            $this->addSubImage($stockId, 'sub-file-1', 1);
        }
        if ($request['sub-file-2'] !== null) {
            $file = $request['sub-file-2'];
            $path = $file->getClientOriginalName();
            $this->addSubImage($stockId, 'sub-file-2', 2);
        }
        if ($request['sub-file-3'] !== null) {
            $file = $request['sub-file-3'];
            $path = $file->getClientOriginalName();
            $this->addSubImage($stockId, 'sub-file-3', 3);
        }
        return redirect('/');
    }

    private function updateSubImage($stockId, $path, $imgNum) {
        $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
        $img_name = substr(str_shuffle($str), 0, 10);
        $image_directory = "/var/www/html/laravel-tutorial/public/image/";
        $tmp_file_path = $_FILES[$path]["tmp_name"];
        $destination_path = $image_directory . $img_name . '.jpeg';
        $subImage = new SubImage();
        $stackData = $subImage->search($stockId, $imgNum);

        if ($stackData->isEmpty()) {
            $this->addSubImage($stockId,  $path, $imgNum);
        } else {
            $subImage->updateSubImg($stockId, $img_name . '.jpeg', $imgNum);
            move_uploaded_file($tmp_file_path, $destination_path);
        }
        
    }
    public function update($editId, Request $request, Stock $stock) {
        $tmp_file_path = $_FILES["file"]["tmp_name"];
        $img_name = null;
        if ($request['sub-file-3'] !== null) {
            $this->updateSubImage($editId,'sub-file-3', 3);
        }
        if ($request['sub-file-1'] !== null) {
            $this->updateSubImage($editId,'sub-file-1', 1);
        }
         
        if ($request['sub-file-2'] !== null) {
            $this->updateSubImage($editId,'sub-file-2', 2);
        }

        if($tmp_file_path!=="") {
            $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
            $img_name = substr(str_shuffle($str), 0, 10) . '.jpeg';
            $image_directory = "/var/www/html/laravel-tutorial/public/image/";
            $destination_path = $image_directory . $img_name;
            move_uploaded_file($tmp_file_path, $destination_path);
        }
        
        $stock = new Stock();
        $stock->updateStock($editId, $request, $img_name);
        $tmp_file_path = $_FILES["file"]["tmp_name"];
        $subImage = new SubImage();

        if ($request['sub-file-1-delete'] !== null) {
            $subImage->deleteSubImg($editId, 1);
        }
        if ($request['sub-file-2-delete'] !== null) {
            $subImage->deleteSubImg($editId, 2);
        }
        if ($request['sub-file-3-delete'] !== null) {
            $subImage->deleteSubImg($editId, 3);
        }
        return redirect('/');
    }
    public function delete($stockId, Stock $stock) {
        $stackData = $stock->showDetail($stockId);
        $userId = Auth::id();

        if ($stackData['userId']==$userId) {
            $stock->deleteStock($stockId);
        }
        return redirect('/');
    }
    public function addMycart(Request $request,UserStock $userStock)
    {
        $stockId=$request->stockId;
        $message = $userStock->addCart($stockId);
        $myCartStocks = $userStock->showMyCart();

        return view('myCart',compact('myCartStocks' , 'message'));

    }
    public function deleteMyCartStock(Request $request,UserStock $userStock)
    {
        $stockId=$request->stockId;
        $message = $userStock->deleteMyCartStock($stockId);
        $myCartStocks = $userStock->showMyCart();

        return view('myCart',compact('myCartStocks' , 'message'));

    }


}
