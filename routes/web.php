<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
// User API
Route::get('/registrationPage',[UserController::class, 'registrationPage']);
Route::post('/user-registration',[UserController::class, 'registrationFormPost']);
Route::get('/user-login',[UserController::class, 'loginPage']);
Route::post('/login-page',[UserController::class, 'UserLogin']);
Route::get('/user-logout',[UserController::class, 'userLogout']);

Route::get('/dashboard',[UserController::class,'userDashboard'])->middleware([TokenVerificationMiddleware::class]);

// Cars API
Route::get('/car-page',[CarController::class, 'carFormPage'])->middleware([TokenVerificationMiddleware::class]);

Route::post('/car-add-page',[CarController::class, 'carAddForm'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/car-list',[CarController::class, 'carList'])->middleware([TokenVerificationMiddleware::class]);


// Rental API
Route::get('/rent-car',[RentalController::class, 'rentalPage'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/rent-car-page',[RentalController::class, 'rentalAddForm'])->middleware([TokenVerificationMiddleware::class]);
