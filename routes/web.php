<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;


Route::get('/person/create', function () {
    return view('person.create');
})->name('person.form'); // só exibe o form

Route::post('/person/create', [PersonController::class, 'create'])->name('person.store'); // processa o POST
