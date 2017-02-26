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

Route::get('posts/{post}/edit', [
    'uses' => 'CreatePostController@edit',
    'as' => 'posts.edit',
]);

Route::put('posts/{post}', [
    'uses' => 'CreatePostController@update',
    'as' => 'posts.update',
]);

Route::patch('posts/{post}', [
    'uses' => 'CreatePostController@update',
    'as' => 'posts.update',
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



Route::post('posts/{post}/follows', [
    'uses' => 'FollowController@store',
    'as' => 'follows.store',
]);