<?php

/**
 * Post routes
 */
$app->get('/', ['Blog\Controllers\PostController', 'index'])->setName('root');
$app->get('/posts', ['Blog\Controllers\PostController', 'index'])->setName('posts');
$app->get('/posts/new', ['Blog\Controllers\PostController', 'new'])->setName('posts.new');
$app->post('/posts/create', ['Blog\Controllers\PostController', 'create'])->setName('posts.create');
$app->get('/posts/show/{id}', ['Blog\Controllers\PostController', 'show'])->setName('posts.show');
$app->get('/posts/{id}/edit', ['Blog\Controllers\PostController', 'edit'])->setName('posts.edit');
$app->post('/posts/{id}/update', ['Blog\Controllers\PostController', 'update'])->setName('posts.update');
$app->get('/posts/{id}/delete', ['Blog\Controllers\PostController', 'delete'])->setName('posts.delete');

/**
 * Comment routes
 */
$app->post('/posts/{id}/comments/create', ['Blog\Controllers\CommentController', 'create'])->setName('comments.create');

$app->get('/search', ['Blog\Controllers\SearchController', 'find'])->setName('search');