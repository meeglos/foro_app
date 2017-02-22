<?php

Route::get('posts/create', [
    'uses' => 'CreatePostController@create',
    'as' => 'posts.create',
]);

Route::post('posts/create', [
    'uses' => 'CreatePostController@store',
    'as' => 'posts.store',
]);

Route::get('posts/index', [
    'uses' => 'PostController@index',
    'as' => 'posts.index',
]);

Route::get('tags/create', [
    'uses' => 'CreateTagController@create',
    'as' => 'tags.create',
]);

Route::post('tags/create', [
    'uses' => 'CreateTagController@store',
    'as' => 'tags.store',
]);

Route::get('tags/index', [
    'uses' => 'TagController@index',
    'as' => 'tags.index',
]);

