<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\MaterialController;
use App\Http\Controllers\api\TypeController;

Route::post('/material/',[MaterialController::class,'newMaterial']);
Route::get('/material/',[MaterialController::class,'getAllMaterial']);
Route::get('/material/',[MaterialController::class,'getAllMaterial']);
Route::get('/material/{id}',[MaterialController::class,'findMaterialById']);
Route::delete('/material/{id}',[MaterialController::class, 'deleteMaterialById']);
Route::delete('/material',[MaterialController::class, 'deleteAllMaterial']);

Route::post('/types/',[TypeController::class,'newTypeData']);
Route::get('/types/',[TypeController::class,'getAllTypeData']);
Route::get('/types/',[TypeController::class,'getAllTypeData']);
Route::get('/types/{id}',[TypeController::class,'findTypeDataById']);
Route::delete('/types/{id}',[TypeController::class, 'deleteTypeDataById']);
Route::delete('/types',[TypeController::class, 'deleteAllTypeData']);