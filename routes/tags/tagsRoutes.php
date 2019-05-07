<?php

const TAGS = 'Tags';

Route::resource('tags', TAGS.'\TagsController', ['except' => ['create']]);
