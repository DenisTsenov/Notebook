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

Route::resource('note', NOTES.'\NoteController');

Route::get('note/{page}', ['as' => 'note.ajaxPagination', 'uses' => NOTES.'\NoteController@ajaxPagination']);

Route::get('notes-slug/{slug}', ['as' => 'note.slug', 'uses' => SLUGS.'\SlugController@getNoteBySlug'])
        ->where('slug', '[\w\d\-\_]+'); // simple regex just to prevent user from search for unaccsesable slugs

Route::get('/', PAGES.'\PagesController@getIndex');

Route::get('about', PAGES.'\PagesController@getAbout');

Route::get('contact', PAGES.'\PagesController@getContact');