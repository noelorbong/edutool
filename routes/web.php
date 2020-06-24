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

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/task', 'HomeController@task')->name('task');
Route::get('/addquestion', 'HomeController@addquestion');
Route::get('/doc/{token}', 'TosController@doc')->name('doc');
Route::post('/tos/store', 'TosController@store');

Route::post('/question/store', 'QuestionController@store');
Route::post('/question/update', 'QuestionController@update');
Route::get('/question/show', 'QuestionController@showQuestion');
Route::get('/question/get', 'QuestionController@questions');
Route::get('/question/edit/{id}', 'QuestionController@edit');
Route::post('/question/delete', 'QuestionController@delete');
Route::get('/question/createtest', 'QuestionController@createTest');
Route::get('/question/dropdowns', 'QuestionController@dropdowns');
Route::post('/question/uploadimage', 'QuestionController@upLoadImage');

Route::get('/question/countavailable/{subject_code}/{chapter}/{level}', 'QuestionController@countAvailable');
Route::get('/question/getrequired/{subject_code}/{chapter}/{level}/{required_question}/{questions_id}', 'QuestionController@getRequired');
Route::post('/question/storetest', 'QuestionController@storeTest');
Route::get('/testquestion/{token}', 'QuestionController@questionPdf')->name('testquestion');
Route::get('/testquestionanswer/{token}', 'QuestionController@questionPdfAnswer')->name('testquestionanswer');