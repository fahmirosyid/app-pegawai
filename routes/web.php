<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees', EmployeeController::class);

Route::get('/employee', function () {
    return "Halaman employee dengan middleware CheckEmployeeAccess";
})->middleware('CheckEmployeeAccess');