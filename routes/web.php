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

/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', 'HomeController@index')->name('company.index');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'user', 'middleware' => ['auth:user']], function () {

    //管理画面
    Route::get('/', function() { return view('users.index'); });
    Route::get('/{id}', 'UsersController@show')->name('user.show')->where('id', '[0-9]+');
    Route::get('/{id}/edit', 'UsersController@edit')->name('user.edit');
    Route::put('/{id}', 'UsersController@update')->name('user.update');
    
    //募集要項登録
    Route::get('/jobs', 'JobsController@index')->name('job.index');
    Route::get('/jobs/create', 'JobsController@create')->name('job.create');   // https://~~~~.com/user/jobs/create
    Route::post('/jobs/create', 'JobsController@store')->name('job.post');
    Route::delete('/jobs/{id}', 'JobsController@destroy')->name('job.delete');
    Route::get('/jobs/{id}/edit', 'JobsController@edit')->name('job.edit');
    Route::put('/jobs/{id}', 'JobsController@update')->name('job.update');

    //エントリー
    Route::get('/entries', 'EntriesController@index')->name('entry.index');
    Route::get('/entries/{id}', 'EntriesController@show')->name('entry.show');
    Route::put('/entries/{id}', 'EntriesController@update')->name('entry.update');
    Route::delete('/entries/{id}', 'EntriesController@destroy')->name('entry.delete');

    //メール送信
    Route::get('/mails', 'SendMailsController@index')->name('mail.index');
    Route::get('/mails/{id}/create', 'SendMailsController@create')->name('mail.create');
    Route::post('/mails/{id}/create/read', 'SendMailsController@read')->name('mail.read');
    Route::post('/mails/{id}/create', 'SendMailsController@store')->name('mail.store');

    //メールテンプレート登録
    Route::get('/mailtemplates', 'MailtemplateController@index')->name('mailtemplate.index');
    Route::get('/mailtemplates/create', 'MailtemplateController@create')->name('mailtemplate.create');
    Route::post('/mailtemplates/create', 'MailtemplateController@store')->name('mailtemplate.post');
    Route::delete('/mailtemplates/{id}', 'MailtemplateController@destroy')->name('mailtemplate.delete');
    Route::get('/mailtemplates/{id}/edit', 'MailtemplateController@edit')->name('mailtemplate.edit');
    Route::put('/mailtemplates/{id}', 'MailtemplateController@update')->name('mailtemplate.update');
});

/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    // ログイン認証
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin_login.post');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin_logout.get');
});
/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'Admin\UsersController@view_all');
    Route::delete('/{id}', 'Admin\UsersController@destroy')->name('user.delete');
    // ユーザ登録
    Route::get('/signup', 'Admin\UsersController@user_create')->name('signup.get');
    Route::post('/signup', 'Admin\UsersController@user_store')->name('signup.post');
});

//個社TOP
Route::get('/{display_url}', 'HomeController@company')->name('company.show');
Route::get('/{display_url}/result', 'HomeController@search_result')->name('search.result');
Route::get('/{display_url}/{id}', 'HomeController@show')->name('job.show');

//エントリー
Route::get('/{display_url}/{id}/entry', 'HomeController@create')->name('entry.get');
Route::post('/{display_url}/{id}/entry/confirm', 'HomeController@confirm')->name('entry.confirm');
Route::post('/{display_url}/{id}/entry/thanks', 'HomeController@store')->name('entry.post');