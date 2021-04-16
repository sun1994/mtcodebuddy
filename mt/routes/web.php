<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view("user-dashboard", "userdash");
// Route::view("admin-dashboard", "admindash");
// Route::view("category-list", "category");
Route::get("add-category", [Category::class, "addCategory"])->middleware(['auth']);
Route::post("addcat", [Category::class, "saveCategory"])->middleware(['auth']);
Route::get("category-list", [Category::class, "categoryList"])->middleware(['auth']);
Route::get("category/{id}", [Category::class, "viewCategory"])->middleware(['auth']);


Route::get("add-product", [Category::class, "addProduct"]);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';