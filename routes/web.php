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

Route::get('/', 'PagesController@home')->name('home');
Route::get('businesses', 'BusinessController@index')->name('businesses.index');
Route::get('businesses/{category}', 'BusinessController@index')->name('category.businesses.index');
Route::get('businesses/{category}/{business}', 'BusinessController@show')->name('businesses.show');
Route::get('about', 'PagesController@about')->name('about');
Route::get('contact', 'ContactController@show')->name('contact.show');
Route::post('contact', 'ContactController@store')->name('contact.store');

Route::get('newsletter', 'NewsletterController@show')->name('newsletter.show');
Route::post('newsletter', 'NewsletterController@store')->name('newsletter.store');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function()
{
    Route::get('/', 'DashboardController@index')->name('dashboard.show');
    Route::get('profile/{user}', 'ProfileController@show')->name('profile.show');
    Route::get('businesses/create', 'BusinessController@create')->name('businesses.create');
    Route::get('businesses/{business}/edit', 'BusinessController@edit')->name('businesses.edit');
    Route::put('businesses/{business}', 'BusinessController@update')->name('businesses.update');
    Route::post('businesses', 'BusinessController@store')->name('businesses.store');
    Route::delete('businesses/{business}', 'BusinessController@destroy')->name('businesses.destroy');
});

Route::group(['prefix' => 'manage', 'middleware' => 'manager'], function()
{
    Route::get('categories/create', 'CategoriesController@create')->name('manage.categories.create');
    Route::get('categories', 'CategoriesController@index')->name('manage.categories.index');
    Route::post('categories', 'CategoriesController@store')->name('manage.categories.store');
    Route::put('categories/{category}', 'CategoriesController@update')->name('manage.categories.update');
});

Auth::routes();
