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

use App\User;

Route::get('/', function () {
    return redirect()->to('login');
});

Route::get('/selectLetter', function () {

    return view('game.selectLetter');
})->name('select_letter')->middleware('auth','can_play');

Route::get('connectUsers',function(){
   return  view('game.connectUsers');
})->middleware('auth');

Route::get('game1',function(){
    return view("game.game");
});

Route::get('game1/guide',function(){
    return view("game.gameGuide");
});

Route::get('game2/guide',function(){
    return view("game2.gameGuide");
})->name('game2.guide')->middleware('auth');

Route::get('game2',function(){
    return view("game2.game");
});

Route::get('result',function (){
   return view("game.result");
})->middleware('auth')->name('result');

Route::get("end",function (){
    return view("end_game.end");
});




Route::get('choose_level',function(){
   return view('choose_level');
})->middleware('auth');


Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect()->to('login');
})->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();



// ##################  crud users ########################

Route::middleware('auth','admin')->prefix('users')->group(function () {
    Route::get('', 'UserController@index')->name('users');
    Route::get('create', "UserController@create")->name('users.create');
    Route::post('store', 'UserController@store')->name('users.store');
    Route::get('{id}/edit', 'UserController@edit')->name('users.edit');
    Route::put('{id}', 'UserController@update')->name('users.update');
    Route::delete('{id}', 'UserController@destroy')->name('users.destroy');
});

// #################### end crud user #######################

Route::get('users/{id}/answers', 'AnswerController@show')->name('users.answers.show');
Route::get('users/{id}/answers_question', 'QuestionController@show')->name('users.answers_question');

Route::middleware('auth','admin')->prefix('questions')->group(function () {
    Route::get('', 'QuestionController@index')->name('questions');
    Route::post('', 'QuestionController@store')->name('questions.store');
    Route::delete('{id}', 'QuestionController@destroy')->name('questions.destroy');
});




Route::prefix('categories')->group(function () {
    Route::post('', 'CategoryController@store')->name('categories.store');
    Route::delete('{id}', 'CategoryController@destroy')->name('categories.destroy');
});

Route::prefix('category_answers')->group(function () {
    Route::post('', 'CategoryAnswerController@store')->name('category_answers');
    Route::delete('{id}', 'CategoryAnswerController@destroy')->name('category_answers.destroy');
});

Route::post('answers/store_letter', 'AnswerController@store_letter');
Route::post('answers/store_answer_question_game1', 'AnswerController@store_answer_question_game1');
Route::post('answers/store_rank', 'AnswerController@store_rank');




// ######################### user answer questions ################################################

Route::get('answer-questions','UserAnswerQuestionController@questions')->middleware('auth','can_answer');
Route::post('answer-questions','UserAnswerQuestionController@answerQuestion')->middleware('auth','can_answer')->name('answer-questions');

// ######################### end user answer questions #############################################
