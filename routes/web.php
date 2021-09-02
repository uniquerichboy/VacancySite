<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Страница создания вакансии
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
// Создание вакансии
Route::get('/createVac', [App\Http\Controllers\HomeController::class, 'createVac'])->name('createVac');
// Поиск вакансий
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
// Вакансия
Route::get('/vacancy/{id}', [App\Http\Controllers\HomeController::class, 'vacancy'])->name('vacancy');
// Откликаемся
Route::get('/send/{id}', [App\Http\Controllers\HomeController::class, 'send'])->name('send');
// Отклики
Route::get('/message', [App\Http\Controllers\HomeController::class, 'message'])->name('message');
// Просмотр отклика
Route::get('/message/{id}', [App\Http\Controllers\HomeController::class, 'messageId'])->name('message.id');

Auth::routes();