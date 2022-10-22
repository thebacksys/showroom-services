<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('getTotalSalesWithBrandByDate', 'SalesHistoryController@getTotalSalesWithBrandByDate');
    Route::get('getTotalSalesWithBrandModelByDate', 'SalesHistoryController@getTotalSalesWithBrandModelByDate');
    Route::get('getTotalSalesWithBrandModelByEmployeeAndDate', 'SalesHistoryController@getTotalSalesWithBrandModelByEmployeeAndDate');
    Route::post('newSalesHistory', 'SalesHistoryController@newSalesHistory');

    Route::post('newModel', 'VehicleModelController@store');
    Route::put('updateModel/{vehicleModelId}', 'VehicleModelController@update');
});
