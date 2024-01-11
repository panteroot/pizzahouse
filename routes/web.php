<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PizzaController;

use App\Models\Pizza;

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


Route::get('/pizza', [PizzaController::class, 'index'])->name('pizza.index');
Route::get('/pizza/create', [PizzaController::class, 'create'])->name('pizza.create');
Route::post('/pizza', [PizzaController::class, 'store'])->name('pizza.store');


// route parameters (wildcards)
// type-hinting for Route-Controller Binding is based on position in url/wildcard=>order of function parameters AND NOT by name
// you can have {id} wildcard and controller action's parameter is $ID
Route::get('/pizza/{id}', [PizzaController::class, 'show'])->name('pizza.show');
Route::delete('/pizza/{id}', [PizzaController::class, 'destroy'])->name('pizza.destroy');

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
