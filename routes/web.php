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

Route::get('', 'HomeController@index');

Route::get('/company/{id}', 'CompanyController@index');

Route::get('/signup', 'SignUpController@index');
Route::post('/signup', 'SignUpController@signup');

Route::get('/login', 'LoginController@index')
->name('login');

Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');



Route::middleware(['is_admin'])->group(function() {

Route::get('/admin', 'AdminController@index');

Route::post('/admin/edit/user/{id}', 'UserController@patch');
Route::post('/admin/delete/user/{id}', 'UserController@delete');

Route::post('/admin/edit/company/{id}', 'CompanyController@patch');
Route::post('/admin/delete/company/{id}', 'CompanyController@delete');

Route::get('/admin/industry/new', 'IndustryController@create');
Route::post('/admin/industry', 'IndustryController@store');

Route::get('/admin/category/new', 'CategoryController@create');
Route::post('/admin/category', 'CategoryController@store');

});


Route::middleware(['authenticated'])->group(function() {

Route::get('/create', 'HomeController@create');
Route::post('/', 'HomeController@store');

Route::get('/user/{id}', 'UserController@index');

Route::post('/rating/{companyID}/{id}', 'RatingController@store');

Route::post('/comment/{companyID}', 'CommentController@store');


});