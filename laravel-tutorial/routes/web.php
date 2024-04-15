<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;//追加
use App\Http\Controllers\DetailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [StockController::class, 'index'])->name('stock.index');
    Route::get('/addStockPage', [StockController::class, 'addPage'])->name('stock.add.page');
    Route::post('/addStock', [StockController::class, 'addStock'])->name('stock.add');
    Route::get('/myCart', [StockController::class, 'myCart'])->name('stock.myCart');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/addMyCart', [StockController::class, 'addMyCart'])->name('stock.addMyCartStock');
    Route::post('/deleteMyCartStock', [StockController::class, 'deleteMyCartStock'])->name('stock.deleteMyCartStock');
    Route::get('/addStockError', [StockController::class, 'addStockError'])->name('stock.add.error');
    Route::get('/detail/{id}', [DetailController::class, 'index'])->name('.product.detail');
    Route::get('/detail/delete/{id}', [DetailController::class, 'delete'])->name('.product.detail.delete');
    Route::get('/detail/edit/{id}', [DetailController::class, 'edit'])->name('.product.detail.edit');
    Route::post('/detail/update/{id}', [StockController::class, 'update'])->name('.product.detail.update');
});
require __DIR__.'/auth.php';
