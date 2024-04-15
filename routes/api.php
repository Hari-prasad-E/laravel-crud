<?php
use App\Http\Controllers\Apicontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[ApiController::class,'register']);
Route::get('retrive',[Apicontroller::class,'retrivedata']);
Route::get('edit/{id}',[Apicontroller::class,'edit']);
Route::patch('update/{id}',[Apicontroller::class,'update1']);
Route::delete('delete/{id}',[Apicontroller::class,'delete']);
// Route::delete('/delete1/{id}','HomeController@delete1')->name('delete1');