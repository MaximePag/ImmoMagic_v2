<?php

use App\Http\Controllers\FavoritesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\AppointmentsSubjectsController;
use App\Http\Controllers\RealEstateController;
use App\Http\Controllers\TypeOfRealEstateController;
use App\Http\Controllers\TypeOfHeatingController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\TypeOfWaterEvacuationController;
use App\Http\Controllers\TypeOfContractController;
use App\Http\Controllers\PictureController;


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

/**
 * routes for register and login
 */
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth')->group(function() {
    Route::resource('documents', DocumentsController::class);
    Route::resource('favorites', FavoritesController::class );
});

//for routes of 'users.*' de l'API
Route::apiResource('users', UserController::class);
Route::apiResource('role', RoleController::class);

//Route::apiResource('documents', DocumentsController::class);


Route::apiResource('appointmentsSubjects', AppointmentsSubjectsController::class);
Route::apiResource('appointments', AppointmentsController::class);

Route::apiResource('realEstate', RealEstateController::class);
Route::apiResource('typeOfRealEstate', TypeOfRealEstateController::class);
Route::apiResource('typeOfHeating', TypeOfHeatingController::class);
Route::apiResource('typeOfContract', TypeOfContractController::class);
Route::apiResource('typeOfWaterEvacuations', TypeOfWaterEvacuationController::class);
Route::apiResource('cities', CitiesController::class);
Route::apiResource('pictures', PictureController::class);
Route::apiResource('favorites', FavoritesController::class);




