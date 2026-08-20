<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordCategoryController;
use App\Http\Controllers\CustomFieldController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('record-categories', RecordCategoryController::class);

Route::prefix('record-categories/{recordCategory}')
    ->name('record-categories.custom-fields.')
    ->group(function () {

        Route::get(
            'fields',
            [CustomFieldController::class, 'index']
        )->name('index');

        Route::get(
            'fields/create',
            [CustomFieldController::class, 'create']
        )->name('create');

        Route::post(
            'fields',
            [CustomFieldController::class, 'store']
        )->name('store');

        Route::get(
            'fields/{customField}/edit',
            [CustomFieldController::class, 'edit']
        )->name('edit');

        Route::put(
            'fields/{customField}',
            [CustomFieldController::class, 'update']
        )->name('update');

        Route::delete(
            'fields/{customField}',
            [CustomFieldController::class, 'destroy']
        )->name('destroy');
    });