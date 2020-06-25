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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
Route::get('news/create', 'Admin\NewsController@add');
Route::post('news/create', 'Admin\NewsController@create'); # 追記
/*Laravel013課題3【応用】 routes/web.php を編集して、 admin/profile/create に postメソッドでアクセスしたら
ProfileController の create Action に割り当てるように設定してください。*/
Route::post('profile/create', 'Admin\ProfileController@create'); 
/*Laravel013課題6【応用】 routes/web.php を編集して、 admin/profile/edit に postメソッドでアクセスしたら 
ProfileController の update Action に割り当てるように設定してください。*/
Route::post('profile/edit', 'Admin\ProfileController@update');
    /*課題４【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。
    web.phpを編集して、admin/profile/create にアクセスしたら ProfileController の add Action に、
    admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てるように設定してください。*/
    
    /*Laravel12 課題２【応用】11章で /admin/profile/create にアクセスしたら ProfileController の add Action に
    割り当てるように設定しました。 ログインしていない状態で /admin/profile/create にアクセス
    した場合にログイン画面にリダイレクトされるように設定しましょう。*/
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
    /*Laravel12 課題3【応用】11章で /admin/profile/edit にアクセスしたら ProfileController の edit Action に
    割り当てるように設定しました。 ログインしていない状態で /admin/profile/edit にアクセス
    した場合にログイン画面にリダイレクトされるように設定しましょう。*/
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
