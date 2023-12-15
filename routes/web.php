<?php

use App\Http\Controllers\BackgroundController;
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

    Route::get('/orders', [OrderController::class, 'index'])->name('order.showOrders');
    Route::get('/order', [OrderController::class, 'create'])->name('order.makeOrder');
    Route::post('/orderConfirm', [OrderController::class, 'confirm'])->name('order.confirmOrder');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');

    Route::get('/backgrounds',[BackgroundController::class, 'index'])->name('bkg.background');
    Route::post('/backgrounds', [BackgroundController::class, 'store'])->name('bkg.storeBackground');
    Route::get('/backgrounds/{bkg}/edit', [BackgroundController::class, 'edit'])->name('bkg.editBackground');
    Route::put('/backgrounds/{bkg}', [BackgroundController::class, 'update'])->name('bkg.updateBackground');
    Route::delete('/backgrounds/{bkg}', [BackgroundController::class, 'destroy'])->name('bkg.deleteBackground');
});

require __DIR__ . '/auth.php';
