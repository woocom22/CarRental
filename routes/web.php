<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard',[UserController::class,'userDashboard']);
// User API
Route::get('/registrationPage',[UserController::class, 'registrationPage']);
Route::post('/user-registration',[UserController::class, 'registrationFormPost']);
Route::get('/user-login',[UserController::class, 'loginPage']);
Route::post('/login-page',[UserController::class, 'UserLogin']);
Route::get('/user-logout',[UserController::class, 'userLogout']);


// Cars API
Route::get('/car-add',[CarController::class, 'carFormPage']);
Route::post('/car-add-page',[CarController::class, 'carAddForm']);


// Rental API
Route::get('/rent-car',[RentalController::class, 'rentalPage']);
Route::post('/rent-car-page',[RentalController::class, 'rentalAddForm']);
