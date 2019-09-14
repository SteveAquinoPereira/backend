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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return Auth::user();
});*/

Route::group(['prefix' => 'auth'],function(){

		Route::post('/signup','AuthController@signup');

		Route::post('/login', [ 'as' => 'login', 'uses' => 'AuthController@login']);

	Route::group(['middleware' => 'auth:api'],function(){

		Route::get('/logout','AuthController@logout');

		Route::get('/user','UserController@index');

		Route::get('/user/{id_user}','UserController@show');

		Route::post('/user/update/{id_user}','UserController@update');



	});

});



Route::post('/section/store','SectionController@store');

Route::delete('/section/delete/{id_section}','SectionController@destroy');

Route::post('/user/accept/{id_user}','UserController@accept');

Route::delete('/user/delete/{id_user}','UserController@destroy');

Route::post('/subject/store','SubjectController@store');

Route::delete('/subject/delete/{id_user}','SubjectController@destroy');

Route::get('/section/{id_section}/subject/{id_subject}/students','SubjectController@showStudents');

Route::post('/evaluation/store','EvaluationController@store');

Route::delete('/evaluation/delete/{id_evaluation}','EvaluationController@destroy');

Route::get('/section/{id_section}/subject/{id_subject}/students/{id_user}','EvaluationController@showEvaluations');
