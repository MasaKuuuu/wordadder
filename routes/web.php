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

//ログイン画面
// Route::get('login', 'LoginController@index');
// Route::post('login','LoginController@login');

//アカウント作成画面
// Route::get('create_account','CreateAccountController@index');
// Route::post('create_account','CreateAccountController@create');

//トップ画面への遷移
// Route::get('/', 'TopController@index')->middleware('auth');
// Route::get('top', 'TopController@index')->middleware('auth');

//単語登録画面への遷移
// Route::get('add', 'WordController@index')->middleware('auth');
Route::post('add', 'WordController@add')->middleware('auth');

//登録済み単語の登録処理
Route::post('same', 'WordController@same')->middleware('auth');

//登録済み単語の削除処理
Route::get('delete', 'WordController@delete')->middleware('auth');

//登録した単語一覧画面への遷移
Route::get('word_list','WordListController@index')->middleware('auth');

//ほかの人の登録している単語一覧画面への遷移
Route::get('other_user_word_list','OtherUserWordController@index')->middleware('auth');

Auth::routes();
//LaravelのHome画面
Route::get('/home', 'HomeController@index')->name('home');
