<?php

use App\Http\Controllers\Admin\colorController;
use App\Http\Controllers\Admin\proudctController;
use App\Http\Controllers\Admin\sliderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\frontend\wishlistController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[frontendController::class,'index'])->name('home');
Route::get('/collections',[frontendController::class,'categories'])->name('collections');
Route::get('/collections/{category_slug}',[frontendController::class,'productsByCate'])->name('frontend.productsByCate');
Route::get('/collections/product/{product_slug}',[frontendController::class,'productView'])->name('frontend.productView');

Route::middleware('auth')->group(function () {
    Route::get('wishlist',[wishlistController::class,'index'])->name('wishlist.index');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class,'index']);
    Route::resource('category', categoryController::class);
    Route::resource('products', proudctController::class);
    Route::get('product-image/{product_image_id}/delete', [proudctController::class,'destoryImage'])->name('products.deleteImg');
    Route::post('/product-color/{product_color_id}', [proudctController::class,'updateProdColorQty']);
    Route::get('/product-color/{product_color_id}/delete', [proudctController::class,'deleteProdColor']);
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class)->name('brands.index');
    Route::resource('colors', colorController::class);
    Route::resource('sliders', sliderController::class);

});
require __DIR__.'/auth.php';