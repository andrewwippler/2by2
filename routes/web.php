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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HouseholdController@index');
    Route::get('/home', 'HouseholdController@index');
    Route::get('/new-visit/{id}', 'HouseholdController@createVisit');
    Route::get('/new-person/{id}', 'PersonController@createPerson');

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

    Route::resource('teams', 'TeamController');
    
    Route::resource('sundaySchools', 'SundaySchoolController');
});

Route::get('/', function () {
    return view('welcome');
});


Route::resource('profiles', 'ProfileController');