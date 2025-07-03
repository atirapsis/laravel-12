<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('inventory.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/inventory/index', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('/inventory/store', [InventoryController::class, 'store'])->name('inventory.store');
    Route::get('/inventory/edit/{inventory}', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::put('/inventory/{inventory}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::delete('/inventory/{inventory}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
    Route::get('/inventory/{inventory}', [InventoryController::class, 'show'])->name('inventory.show');

    // Soft Delete 
    Route::post('/inventory/{id}/restore', [InventoryController::class, 'restore'])->name('inventory.restore');
    Route::delete('/inventory/{id}/force-delete', [InventoryController::class, 'forceDelete'])->name('inventory.forceDelete');
});

require __DIR__.'/auth.php';
