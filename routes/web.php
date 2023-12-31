<?php

use App\Http\Livewire\Calculator;
use App\Http\Livewire\Todo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/counter', function () {
    return view('welcome');
})->name('counter');

// Route::get('/', Home::class)->name('home');
Route::get('/calculator', Calculator::class)->name('calculator');
Route::get('/todos', Todo::class)->name('todos');
