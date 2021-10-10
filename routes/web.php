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


use Carbon\Carbon;



Route::get('/', function () {
    return redirect()->to('login');
});

Route::get('/selectLetter', function () {
    $user = auth()->user();
    $now = Carbon::parse(Carbon::now());
    if (($user->time == $now->hour) && $now->minute <= 3) {
        return view('game.selectLetter');
    }
    session()->flash('error', 'برای انجام بازی به تنظیم زمان توسط ادمین نیاز دارید ');
    return redirect('choose_level');
})->name('select_letter')->middleware('auth','can_play');

Route::get('connectUsers', function () {
    return  view('game.connectUsers');
})->middleware('auth', 'can_play');

Route::get('game1', function () {
    return view("game.game");
}) ->middleware('auth', 'can_play')->name('game2');

Route::get('game1/guide', function () {
    return view("game.gameGuide");
})->middleware('auth','can_play')->name('game1.guide');

Route::get('game2/guide', function () {
    return view("game2.gameGuide");
})->middleware('auth','can_play')->name('game2.guide');

Route::get('game2', function () {
    return view("game2.game");
}) ->middleware('auth', 'can_play')->name('game2');

Route::get('result', function () {
    return view("game.result");
})->middleware('auth', 'can_play')->name('result');

Route::get("end", function () {
    return view("end_game.end");
})->middleware('auth','can_play')->name('end');

Route::view('estimate', 'estimate')->middleware('auth','can_play')->name('estimate');
Route::view('best-score', 'best_score')->middleware('auth','can_play')->name('best-score');


Route::get('choose_level', function () {

    return view('choose_level');
})->middleware('auth');


 Auth::routes(['register'=>false,'reset'=>false,'verify'=>false]);
Route::get('logout', function () {
    $user = auth()->user();
    $user->can_play = 0;
    $user->save();
    Auth::logout();
    return redirect()->to('login');
})->middleware('auth')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');




// ##################  crud users ########################

Route::middleware('auth', 'admin')->prefix('users')->group(function () {
    Route::get('', 'UserController@index')->name('users');
    Route::get('create', "UserController@create")->name('users.create');
    Route::post('store', 'UserController@store')->name('users.store');
    Route::get('{id}/edit', 'UserController@edit')->name('users.edit');
    Route::put('{id}', 'UserController@update')->name('users.update');
    Route::delete('{id}', 'UserController@destroy')->name('users.destroy');
    Route::get('export', 'UserController@export')->name('export');
});

// #################### end crud user #######################





Route::post('answers/store_letter', 'AnswerController@store_letter')->middleware('auth','can_play');
Route::post('answers/store_answer_question_game1', 'AnswerController@store_answer_question_game1')->middleware('auth','can_play')->name('answer');
Route::post('answers/rank', 'AnswerController@rank')->middleware('auth','can_play')->name('rank');
Route::post('answers/money', 'AnswerController@money')->middleware('auth','can_play')->name('money');

Route::post('answers/questions', 'AnswerController@questions')->middleware('auth','can_play')->name('questions');
Route::post('answers/estimate', 'EstimateController@estimate')->middleware('auth','can_play')->name('estimate');
Route::post('answers/score', 'ScoreController@score')->middleware('auth','can_play')->name('score');


