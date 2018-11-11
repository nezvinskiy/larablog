<?php

use App\Entity\Category\Category;
use App\Entity\Post\Post;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('Home'), route('home'));
});


// Category
Breadcrumbs::for('category.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Categories'), route('category.index'));
});
Breadcrumbs::for('category.create', function ($trail) {
    $trail->parent('category.index');
    $trail->push(__('Add category'), route('category.create'));
});
Breadcrumbs::for('category.edit', function ($trail, Category $category) {
    $trail->parent('category.index');
    $trail->push(__('Edit category'), route('category.edit', [$category]));
});
Breadcrumbs::for('category.show', function ($trail, Category $category) {
    $trail->parent('category.index');
    $trail->push($category->name, route('category.show', [$category]));
});


// Post
Breadcrumbs::for('post.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Posts'), route('post.index'));
});
Breadcrumbs::for('post.create', function ($trail) {
    $trail->parent('post.index');
    $trail->push(__('Add post'), route('post.create'));
});
Breadcrumbs::for('post.edit', function ($trail, Post $post) {
    $trail->parent('post.index');
    $trail->push(__('Edit post'), route('post.edit', [$post]));
});
Breadcrumbs::for('post.show', function ($trail, Post $post) {
    $trail->parent('post.index');
    $trail->push($post->name, route('post.show', [$post]));
});


// Auth
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Register'), route('register'));
});
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Login'), route('login'));
});
Breadcrumbs::for('verification.notice', function ($trail) {
    $trail->parent('login');
    $trail->push(__('Verify Your Email Address'), route('verification.notice'));
});
Breadcrumbs::for('password.request', function ($trail) {
    $trail->parent('login');
    $trail->push(__('Reset Password'), route('password.request'));
});
Breadcrumbs::for('password.reset', function ($trail, $token) {
    $trail->parent('login');
    $trail->push(__('Reset Password'), route('password.reset', $token));
});
