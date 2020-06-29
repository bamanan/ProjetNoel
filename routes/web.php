<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes(['register'=>false]);

Route::get('/', function () {
    return view('home');
})->name("home");

Route::post('/', "LetterController@store")->name("letter.store");

Route::group(['prefix'=>'admin', 'middleware'=> 'auth'], function (){

    Route::get('/', function (){
        return view('admin.dashboard');
    })->name('dashboard');


    /**
     * Letters routes
     */
    Route::get('/lettres/', 'LetterController@index')->name('letters.index');
    Route::get('/lettres/{letter}/voir', 'LetterController@show')->name('letters.show');
    Route::delete('/lettres/{letter}', 'LetterController@delete')->name('letters.delete');
    Route::get('/lettres/{letter}/pdf', 'ReportController@letterPdf')->name('letters.download');
    Route::get('/lettres/exporter', 'ReportController@exportAll')->name('letters.export');


    /**
     * ANSWERS ROUTES
     */
    Route::get('/reponses', 'AnswerController@index')->name('answers.index');

    Route::get('/reponses/nouveau/{letter}', 'AnswerController@create')->name('answers.create');
    Route::post('/reponses/{letter}', 'AnswerController@store')->name('answers.store');

    Route::get('/reponses/{answer:slug}/voir', 'AnswerController@show')->name('answers.show');

    Route::get('/reponses/{answer:slug}/modification', 'AnswerController@edit')->name('answers.edit');
    Route::put('/reponses/{answer}', 'AnswerController@update')->name('answers.update');

    Route::delete('/reponses/{answer:slug}/suppression', 'AnswerController@destroy')->name('answers.delete');

    Route::get('/reponses/{answer}/pdf', 'ReportController@answerPdf')->name('answers.download');

    /**
     * USERS MANAGEMENT
     */
    Route::get('/utilisateurs/', 'UserController@index')->name('users.index');

    Route::get('/utilisateurs/nouveau', 'UserController@create')->name('users.create');
    Route::post('/utilisateurs/nouveau', 'UserController@store')->name('users.store');

    Route::get('/utilisateurs/{user}/modification', 'UserController@edit')->name('users.edit');
    Route::put('/utilisateurs/{user}/modification', 'UserController@update')->name('users.update');

    Route::delete('/utilisateurs/{user}/suppression', 'UserController@destroy')->name('users.delete');
});








