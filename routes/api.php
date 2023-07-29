<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\PropertyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("data/{id}", [PropertyController::class, 'getProperty']);
Route::get("featured", [PropertyController::class, 'getFeatured']);
Route::get("property/{id}", [PropertyController::class, 'getProperties']);
Route::get("publishPropety/{id}", [PropertyController::class, 'publishPropety']);
Route::get("draftPropety/{id}", [PropertyController::class, 'draftPropety']);
Route::get("deleteProperty/{id}", [PropertyController::class, 'deleteProperty']);