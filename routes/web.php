<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;


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
Route::resource('admin/categorie',CategorieController::class);
Route::resource('admin/fournisseur',FournisseurController::class);
Route::resource('admin/entree',EntreeController::class);
Route::resource('admin/produit',ProduitController::class);
Route::resource('admin/commandes', CommandeController::class);

Route::get('/', function () {
    return view('welcome');
});
