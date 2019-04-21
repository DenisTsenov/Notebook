<?php
/*
 * Here are the routes for the Categories
 */

const CATEGORIES = 'Categories';

Route::resource('category', CATEGORIES.'\CategoryController');