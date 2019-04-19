<?php

const NOTES = 'Notes';
const SLUGS = 'Slugs';
const PAGES = 'Pages';
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

/**
 * Start of auth routes
 */
//login
Auth::routes();
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('get.login');
Route::post('auth/login', 'Auth\LoginController@login')->name('post.login');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');
//register
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('get.register');
Route::post('auth/register', 'Auth\RegisterController@register')->name('post.register');
// password reset 
Auth::routes();

/**
 * End of auth routes
 */

/*--------------------*/

/**
 * Start of Notes routes
 */

Route::resource('note', NOTES.'\NoteController');
Route::get('note/{page}', ['as' => 'note.ajaxPagination', 'uses' => NOTES.'\NoteController@ajaxPagination']);

/**
 * End of Notes routes
 */

/*-----------------------------------*/

/**
 * Start of Slugs routes
 */
Route::get('notes-slug/{slug}', ['as' => 'note.slug', 'uses' => SLUGS.'\SlugController@getNoteBySlug'])
        ->where('slug', '[\w\d\-\_]+'); // simple regex just to prevent user from search for unaccsesable slugs

Route::get('all-notes', ['as' => 'note.all', 'uses' => SLUGS.'\SlugController@getIndex']);

Route::get('all-notes/{page}', ['as' => 'note.all.ajaxPagination', 'uses' => SLUGS.'\SlugController@ajaxPagination']);

/**
 * End of Slug routes
 */

/*-------------------------*/

/**
 * Start of Pages routes
 */
Route::get('/', PAGES.'\PagesController@getIndex');

Route::get('about', PAGES.'\PagesController@getAbout');

Route::get('contact', PAGES.'\PagesController@getContact');