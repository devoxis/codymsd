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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('claims','ClaimController');
Route::get('/claims/new/{id}', 'ClaimController@newclaim')->name('claims.new');

Route::resource('biographicals','BiographicalController');

Route::get('/reports', 'ReportController@index')->name('reports');
Route::get('/reports/region', 'ReportController@region')->name('reports.region');
Route::post('/reports/region', 'ReportController@region');
Route::get('/reports/marital', 'ReportController@marital')->name('reports.marital');
Route::post('/reports/marital', 'ReportController@marital');
Route::get('/reports/date', 'ReportController@date')->name('reports.date');
Route::post('/reports/date', 'ReportController@date');
Route::get('/reports/salary', 'ReportController@salary')->name('reports.salary');
Route::post('/reports/salary', 'ReportController@salary');
Route::get('/reports/salarymax', 'ReportController@salarymax')->name('reports.salarymax');
Route::post('/reports/salarymax', 'ReportController@salarymax');
Route::get('/reports/salarymin', 'ReportController@salarymin')->name('reports.salarymin');
Route::post('/reports/salarymin', 'ReportController@salarymin');

Route::get('/settings', 'SettingController@index')->name('settings');
Route::get('/settings/users', 'SettingController@users')->name('settings.users');
Route::get('/settings/users/{id}', 'SettingController@edit')->name('users.edit');
Route::delete('/settings/users/{id}', 'SettingController@destroy')->name('users.destroy');
Route::patch('/settings/users/{id}', 'SettingController@update')->name('users.update');
Route::get('/settings/reset', 'SettingController@reset')->name('settings.reset');

// Route::get('/reports', 'ReportController@index')->name('reports');
// Route::get('/reports', 'ReportController@index')->name('reports');
// Route::get('/reports', 'ReportController@index')->name('reports');
// Route::get('/reports', 'ReportController@index')->name('reports');
// Route::get('/reports', 'ReportController@index')->name('reports');

