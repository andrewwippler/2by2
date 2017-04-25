<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('departments', 'DepartmentAPIController');

Route::resource('life_stages', 'LifeStageAPIController');

Route::resource('marital_statuses', 'MaritalStatusAPIController');

Route::resource('prospect_statuses', 'ProspectStatusAPIController');

Route::resource('relationships', 'RelationshipAPIController');

Route::resource('spiritual_conditions', 'SpiritualConditionAPIController');

Route::resource('visit_types', 'VisitTypeAPIController');

Route::resource('visits', 'VisitAPIController');

Route::resource('people', 'PersonAPIController');

Route::resource('households', 'HouseholdAPIController');