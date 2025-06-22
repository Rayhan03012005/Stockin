<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::group(['middleware' => RoleMiddleware::class . ':admin'], function () {
//     Route::get('/admin/dashboard', function () {
//         return view('admin_dashboard');
//     })->name('admin.dashboard');
// });

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/transactions', [TransactionController::class, 'indexAdmin'])->name('admin.transactions');
});



// Route::group(['middleware' => RoleMiddleware::class . ':owner'], function () {
//     Route::get('/owner/items', function () {
//         return view('owner_items');
//     })->name('owner.items');
// });

Route::prefix('owner')->middleware('role:owner')->group(function () {
    Route::get('/items', [ItemController::class, 'index'])->name('owner.items');
    Route::get('/items/create', [ItemController::class, 'create'])->name('owner.items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('owner.items.store');
    Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('owner.items.edit');
    Route::put('/items/{id}', [ItemController::class, 'update'])->name('owner.items.update');
    Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('owner.items.destroy');
    Route::post('/transactions/{transaction_id}/return', [TransactionController::class, 'returnItem'])->name('owner.transactions.return');
});

// Route::group(['middleware' => RoleMiddleware::class . ':peminjam'], function () {
//     Route::get('/peminjam/items', function () {
//         return view('peminjam_items');
//     })->name('peminjam.items');
// });

Route::prefix('peminjam')->middleware('role:peminjam')->group(function () {
    Route::get('/items', [ItemController::class, 'indexPeminjam'])->name('peminjam.items');
    Route::get('/transactions/create/{item_id}', [TransactionController::class, 'create'])->name('peminjam.transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('peminjam.transactions.store');
    Route::get('/transactions', [TransactionController::class, 'indexPeminjam'])->name('peminjam.transactions');
});