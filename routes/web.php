<?php

use App\Http\Controllers\CreateProductController;
use Illuminate\Support\Facades\Route;


Route::middleware(['cors'])->group(function(){
    Route::resource('product', CreateProductController::class);
    Route::get('code',[CreateProductController::class, 'randomCode']);
    Route::get('sum-values', [CreateProductController::class, 'sumOfValues']);
    Route::get('products', [CreateProductController::class, 'paginate']);
});