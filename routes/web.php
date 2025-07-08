<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;


Route::get('/person/create', function () {
    return view('person.create');
})->name('person.create'); // <- Adiciona o nome aqui

Route::post('/person/create', [\App\Http\Controllers\PersonController::class, 'create']);

