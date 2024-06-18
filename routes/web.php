<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/error', function () {
    throw new \Exception('Test Error Message');
});
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
    Route::get('/setupProfile', [App\Http\Controllers\ProfileController::class, 'createprofile'])->name('setupProfile');
    Route::get('/editprofile/{id}', [App\Http\Controllers\ProfileController::class, 'editprofile'])->name('editprofile');
    Route::post('/submitprofile', [App\Http\Controllers\ProfileController::class, 'submitprofile'])->name('submitprofile');
    Route::post('/profileDelete', [App\Http\Controllers\ProfileController::class, 'profileDelete'])->name('profileDelete');
    Route::post('/submitedit', [App\Http\Controllers\ProfileController::class, 'submitedit'])->name('submitedit');

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/manage', [App\Http\Controllers\HomeController::class, 'manage'])->name('manage');
    Route::get('/addmodule', [App\Http\Controllers\HomeController::class, 'addmodule'])->name('addmodule');
    Route::get('/addgwa', [App\Http\Controllers\HomeController::class, 'addgwa'])->name('addgwa');

    Route::get('/target', [App\Http\Controllers\ModuleController::class, 'target'])->name('target');
    Route::get('/editgwa/{id}', [App\Http\Controllers\ModuleController::class, 'editgwa'])->name('editgwa');
    Route::post('/submitmodule', [App\Http\Controllers\ModuleController::class, 'addmodule'])->name('submitaddmodule');
    Route::post('/submitgwa', [App\Http\Controllers\ModuleController::class, 'addtarget'])->name('addtarget');
    Route::post('/targetdelete', [App\Http\Controllers\ModuleController::class, 'targetdelete'])->name('targetdelete');
    Route::post('/submiteditgwa', [App\Http\Controllers\ModuleController::class, 'submiteditgwa'])->name('submiteditgwa');

    Route::get('/compute', [App\Http\Controllers\CalculatorController::class, 'compute'])->name('compute');
    Route::get('/computation/{id}', [App\Http\Controllers\CalculatorController::class, 'computation'])->name('computation');
    Route::post('/computation/submit', [App\Http\Controllers\CalculatorController::class, 'submitComputation'])->name('submitComputation');
    Route::post('/computation/submitedit', [App\Http\Controllers\CalculatorController::class, 'submitEdit'])->name('submitEdit');
    Route::post('/computation/submitgrades', [App\Http\Controllers\CalculatorController::class, 'submitgrades'])->name('submitgrades');
    Route::post('/computation/submitsubjects', [App\Http\Controllers\CalculatorController::class, 'submitsubjects'])->name('submitsubjects');
    Route::post('/computation/moduledelete', [App\Http\Controllers\CalculatorController::class, 'moduledelete'])->name('moduledelete');
});
