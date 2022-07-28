<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TypeController;

Route::post('/materials/',[MaterialController::class,'create']);
Route::get('/materials/',[MaterialController::class,'getAll']);
Route::get('/materials/{id}',[MaterialController::class,'findById']);
Route::get('/materials/name/{name}',[MaterialController::class,'findByName']);
Route::put('/materials/{id}',[MaterialController::class,'updateById']);
Route::delete('/materials/{id}',[MaterialController::class, 'deleteById']);
Route::delete('/materials',[MaterialController::class, 'deleteAll']);

Route::post('/types/',[TypeController::class,'create']);
Route::get('/types/',[TypeController::class,'getAll']);
Route::get('/types/{id}',[TypeController::class,'findById']);
Route::put('/types/{id}',[TypeController::class,'updateById']);
Route::delete('/types/{id}',[TypeController::class, 'deleteById'])->name('deleteById');
Route::delete('/types/',[TypeController::class, 'deleteAll']);