<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

/* Route::get('/servicios/{servicio?}',function ($servicio = null){
	if($servicio === 'Alisado'){
        return redirect()->route('servicios.index');
	}
	return 'Detalle del servicio' .$servicio;
}); */


Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/order', [OrderController::class, 'create'])->name('order.makeOrder');
    Route::post('/orderConfirm', [OrderController::class, 'confirm'])->name('order.confirmOrder');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
});

require __DIR__ . '/auth.php';
