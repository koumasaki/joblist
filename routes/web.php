<?php

/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', 'HomeController@index')->name('company.index');

//xmlファイル
Route::get('/indeed.xml', 'HomeController@sitemap');

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
    Route::get('/', 'UsersController@index')->name('user.index');
    Route::get('/{id}', 'UsersController@show')->name('user.show')->where('id', '[0-9]+');
    Route::get('/{id}/edit', 'UsersController@edit')->name('user.edit');
    Route::put('/{id}', 'UsersController@update')->name('user.update');
    
    //募集要項登録
    Route::get('/jobs', 'JobsController@index')->name('job.index');
    Route::get('/jobs/result', 'JobsController@search_result')->name('job_search.result');
    Route::get('/jobs/create', 'JobsController@create')->name('job.create');   // https://~~~~.com/user/jobs/create
    Route::post('/jobs/create', 'JobsController@store')->name('job.post');
    Route::post('/jobs/{id}', 'JobsController@getCopy')->name('job.getCopy');
    Route::delete('/jobs/{id}', 'JobsController@destroy')->name('job.delete');
    Route::get('/jobs/{id}/edit', 'JobsController@edit')->name('job.edit');
    Route::put('/jobs/{id}', 'JobsController@update')->name('job.update');

    //エントリー
    Route::get('/entries', 'EntriesController@index')->name('entry.index');
    Route::get('/entries/result', 'EntriesController@search_result')->name('entry_search.result');
    Route::get('/entries/csv', 'EntriesController@downloadCSV')->name('entry.csv');
    Route::get('/entries/{id}', 'EntriesController@show')->name('entry.show');
    Route::post('/entries/{id}/read', 'SendMailsController@read_template')->name('mail_template.read');
    Route::put('/entries/{id}', 'EntriesController@update')->name('entry.update');
    Route::put('/entries/{id}/read', 'EntriesController@update')->name('entry.update');
    Route::delete('/entries/{id}', 'EntriesController@destroy')->name('entry.delete');
    Route::get('/entries/job/{id}', 'EntriesController@refine')->name('refine.index');

    //メール送信
    Route::get('/mails', 'SendMailsController@index')->name('mail.index');
    Route::get('/mails/{id}/create', 'SendMailsController@create')->name('mail.create');
    Route::post('/mails/{id}/create/read', 'SendMailsController@read')->name('mail.read');
    Route::post('/mails/{id}/create', 'SendMailsController@store')->name('mail.store');

    //メールテンプレート登録
    Route::get('/mailtemplates', 'MailtemplateController@index')->name('mailtemplate.index');
    Route::get('/mailtemplates/create', 'MailtemplateController@create')->name('mailtemplate.create');
    Route::post('/mailtemplates/create/read', 'MailtemplateController@read')->name('mailtemplate.read');
    Route::post('/mailtemplates/create', 'MailtemplateController@store')->name('mailtemplate.post');
    Route::delete('/mailtemplates/{id}', 'MailtemplateController@destroy')->name('mailtemplate.delete');
    Route::get('/mailtemplates/{id}/edit', 'MailtemplateController@edit')->name('mailtemplate.edit');
    Route::put('/mailtemplates/{id}', 'MailtemplateController@update')->name('mailtemplate.update');

    //担当者登録
    Route::get('/recruiter', 'RecruiterController@index')->name('recruiter.index');
    Route::get('/recruiter/create', 'RecruiterController@create')->name('recruiter.create');
    Route::post('/recruiter/create', 'RecruiterController@store')->name('recruiter.post');
    Route::delete('/recruiter/{id}', 'RecruiterController@destroy')->name('recruiter.delete');
    Route::get('/recruiter/{id}/edit', 'RecruiterController@edit')->name('recruiter.edit');
    Route::put('/recruiter/{id}', 'RecruiterController@update')->name('recruiter.update');
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

    //オリジナルメールテンプレート登録
    Route::get('/mails', 'MailoriginsController@index')->name('mailorigin.index');
    Route::get('/mails/create', 'MailoriginsController@create')->name('mailorigin.create');
    Route::post('/mails/create', 'MailoriginsController@store')->name('mailorigin.post');
    Route::delete('/mails/{id}', 'MailoriginsController@destroy')->name('mailorigin.delete');
    Route::get('/mails/{id}/edit', 'MailoriginsController@edit')->name('mailorigin.edit');
    Route::put('/mails/{id}', 'MailoriginsController@update')->name('mailorigin.update');
});
/*
|--------------------------------------------------------------------------
| 5) ユーザー側画面
|--------------------------------------------------------------------------
*/
//個社TOP
Route::get('/{display_url}', 'HomeController@company')->name('company.show');
Route::get('/{display_url}/result', 'HomeController@search_result')->name('search.result');
Route::get('/{display_url}/job_{id}', 'HomeController@show')->name('job.show');

//エントリー
Route::get('/{display_url}/job_{id}/entry', 'HomeController@create')->name('entry.get');
Route::post('/{display_url}/job_{id}/entry/confirm', 'HomeController@confirm')->name('entry.confirm');
//エントリー（簡易）
Route::get('/{display_url}/job_{id}/light_entry', 'HomeController@light_create')->name('light.get');
Route::post('/{display_url}/job_{id}/entry/light_confirm', 'HomeController@light_confirm')->name('light.confirm');
//サンクスページ
Route::post('/{display_url}/job_{id}/entry/thanks', 'HomeController@store')->name('entry.post');
