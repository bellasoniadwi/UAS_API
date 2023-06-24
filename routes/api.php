<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('employees', [EmployeesController::class, 'index'])->name('employees.index');
Route::post('employees', [EmployeesController::class, 'store'])->name('employees.store');
Route::get('employees/{employee}', [EmployeesController::class, 'show'])->name('employees.show');
Route::put('employees/{employee}', [EmployeesController::class, 'update'])->name('employees.update');
Route::delete('employees/{employee}', [EmployeesController::class, 'destroy'])->name('employees.destroy');

Route::get('members', [MembersController::class, 'index'])->name('members.index');
Route::post('members', [MembersController::class, 'store'])->name('members.store');
Route::get('members/{member}', [MembersController::class, 'show'])->name('members.show');
Route::put('members/{member}', [MembersController::class, 'update'])->name('members.update');
Route::delete('members/{member}', [MembersController::class, 'destroy'])->name('members.destroy');

Route::get('products', [ProductsController::class, 'index'])->name('products.index');
Route::post('products', [ProductsController::class, 'store'])->name('products.store');
Route::get('products/{product}', [ProductsController::class, 'show'])->name('products.show');
Route::put('products/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');

Route::get('transactions', [TransactionsController::class, 'index'])->name('transactions.index');
Route::post('transactions', [TransactionsController::class, 'store'])->name('transactions.store');
Route::get('transactions/{transaction}', [TransactionsController::class, 'show'])->name('transactions.show');
Route::put('transactions/{transaction}', [TransactionsController::class, 'update'])->name('transactions.update');
Route::delete('transactions/{transaction}', [TransactionsController::class, 'destroy'])->name('transactions.destroy');