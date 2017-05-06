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

Route::resource('lifestages', 'LifeStageAPIController');

Route::resource('maritalstatuses', 'MaritalStatusAPIController');

Route::resource('prospectstatuses', 'ProspectStatusAPIController');

Route::resource('relationships', 'RelationshipAPIController');

Route::resource('spiritualconditions', 'SpiritualConditionAPIController');

Route::resource('visittypes', 'VisitTypeAPIController');

Route::resource('visits', 'VisitAPIController');

Route::resource('people', 'PersonAPIController');

Route::resource('households', 'HouseholdAPIController');

Route::resource('teams', 'TeamAPIController');

Route::resource('sunday_schools', 'SundaySchoolAPIController');


Route::resource('profiles', 'ProfileAPIController');