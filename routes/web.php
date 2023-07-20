<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'] , function() 
{
    Route::resource('products', ProductsController::class);
    
});

Route::put('/admin/products/{product}', [ProductsController::class, 'update'])->name('product.update');

Route::name('meu-nome')->get('/rota-nomeada/qualquer-coisa', function() {
    
});

Route::delete('/products/mass-delete', [ProductsController::class, 'massDelete'])->name('products.massDelete');
