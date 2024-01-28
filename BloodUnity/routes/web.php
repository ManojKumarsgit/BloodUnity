<?php

use App\Http\Controllers\DonorController;
// use App\Http\Controllers\DropDownController;
use Illuminate\Support\Facades\Route;

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
Route::get('/home',[DonorController::class,'index'])->name('donor.index');
Route::get('/donor/create',[DonorController::class,'create'])->name('donor.create');
Route::post('/donor/store',[DonorController::class,'store'])->name('donor.store');
Route::get('/donor/search',[DonorController::class,'search'])->name('donor.search');
Route::post('/donor/search/results',[DonorController::class,'Searchshow'])->name('donor.search.show');
Route::get('/donor/login',[DonorController::class,'login'])->name('donor.login');
Route::post('/donor/login/profile',[DonorController::class,'show'])->name('donor.profile');
Route::get('/donor/profile/{donor}/edit',[DonorController::class,'edit'])->name('donor.profile.edit');
Route::put('/donor/{donor}',[DonorController::class,'update'])->name('donor.profile.update');


// Route::get('/donor/create',[DonorController::class,'index']);
Route::post('api/fetch-state',[DonorController::class,'fatchState']);
Route::post('api/fetch-cities',[DonorController::class,'fatchCity']);


// Route::get('dropdown',[DropDownController::class,'index']);
// Route::post('api/fetch-state',[DropDownController::class,'fatchState']);
// Route::post('api/fetch-cities',[DropDownController::class,'fatchCity']);


