<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;

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

Route::get('/register', function () {
    return view('register');
});
// Route::get('retrive', function () {
//     return view('retrive');
// });

Route::post('register', [Homecontroller::class, 'register'])->name('register');
Route::get('retrive', [Homecontroller::class, 'retrivedata'])->name('retrivedata');
Route::get('/edit/{id}', [Homecontroller::class, 'edit'])->name('edit');
Route::patch('/update1/{id}', [Homecontroller::class, 'update1'])->name('update1');
Route::get('/delete/{id}', [Homecontroller::class, 'delete'])->name('delete');
Route::get('mulSelect', [Homecontroller::class, 'mulSelect'])->name('mulSelect');

