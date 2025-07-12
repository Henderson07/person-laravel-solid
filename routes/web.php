<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;


Route::get('/person/create', function () {
    return view('person.create');
})->name('person.create');

Route::post('/person/create', [PersonController::class, 'create'])->name('person.create');

