<?php

//controllers
use App\Http\Controllers\ApiController;
use App\Http\Controllers\EmployeeController;
//middlewares
use App\Http\Middleware\Token;
use Illuminate\Support\Facades\Route;

Route::get('/register', [ApiController::class, 'showRegister'])->name('show.register');
Route::post('/register', [ApiController::class, 'store'])->name('api.store');

Route::get('/login', [ApiController::class, 'showLogin'])->name('show.login');
Route::post('/login', [ApiController::class, 'login'])->name('api.login');


Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index')->middleware(Token::class)  ;
Route::get('/attendance/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show')->middleware(Token::class);
Route::get('/logout', [ApiController::class, 'logut'])->name('api.logout')->middleware(Token::class);
