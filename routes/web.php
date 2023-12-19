<?php

use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

/* Route::get('/servicios/{servicio?}',function ($servicio = null){
	if($servicio === 'Alisado'){
        return redirect()->route('servicios.index');
	}
	return 'Detalle del servicio' .$servicio;
}); */


Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[OrderController::class , 'list'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/orders', [OrderController::class, 'index'])->name('order.showOrders');
    Route::get('/order', [OrderController::class, 'create'])->name('order.makeOrder');
    Route::post('/orderConfirm', [OrderController::class, 'confirm'])->name('order.confirmOrder');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{ord}/edit',[OrderController::class, 'edit'])->name('order.edit');
    Route::put('/order/{ord}', [OrderController::class, 'update'])->name('order.update');
    Route::delete('/order/{ord}', [OrderController::class, 'cancelar'])->name('order.delete');

    Route::get('/backgrounds',[BackgroundController::class, 'index'])->name('bkg.background');
    Route::post('/backgrounds', [BackgroundController::class, 'store'])->name('bkg.storeBackground');
    Route::get('/backgrounds/{bkg}/edit', [BackgroundController::class, 'edit'])->name('bkg.editBackground');
    Route::put('/backgrounds/{bkg}', [BackgroundController::class, 'update'])->name('bkg.updateBackground');
    Route::delete('/backgrounds/{bkg}', [BackgroundController::class, 'destroy'])->name('bkg.deleteBackground');

    Route::get('/types', [TypeController::class, 'index'])->name('type.index');
    Route::post('/types', [TypeController::class, 'store'])->name('type.store');
    Route::get('/types/{type}/edit', [TypeController::class, 'edit'])->name('type.edit');
    Route::put('/types/{type}', [TypeController::class, 'update'])->name('type.update');
    Route::delete('/types/{type}', [TypeController::class, 'destroy'])->name('type.destroy');

    Route::get('/characters', [CharacterController::class, 'index'])->name('char.index');
    Route::post('/characters', [CharacterController::class, 'store'])->name('char.store');
    Route::get('/characters/{char}/edit', [CharacterController::class, 'edit'])->name('char.edit');
    Route::put('/characters/{char}', [CharacterController::class, 'update'])->name('char.update');
    Route::delete('/characters/{char}', [CharacterController::class, 'destroy'])->name('char.destroy');

    Route::get('/sizes', [SizeController::class, 'index'])->name('size.index');
    Route::post('/sizes', [SizeController::class, 'store'])->name('size.store');
    Route::get('/sizes/{size}/edit', [SizeController::class, 'edit'])->name('size.edit');
    Route::put('/sizes/{size}', [SizeController::class, 'update'])->name('size.update');
    Route::delete('/sizes/{size}', [SizeController::class, 'destroy'])->name('size.destroy');
});

require __DIR__ . '/auth.php';
