<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('departments', 'DepartmentController');

Route::resource('lifeStages', 'LifeStageController');

Route::resource('maritalStatuses', 'MaritalStatusController');

Route::resource('prospectStatuses', 'ProspectStatusController');

Route::resource('relationships', 'RelationshipController');

Route::resource('spiritualConditions', 'SpiritualConditionController');

Route::resource('visitTypes', 'VisitTypeController');

Route::resource('visits', 'VisitController');

Route::resource('people', 'PersonController');

Route::resource('households', 'HouseholdController');