<?php
use inferno\router\Route;
use controllers\PostController;

Route::get('/', 'home');
Route::get('/lol', 'lol');
Route::css();
Route::js();
Route::get('/src/js/script.js', 'home');
Route::post('/post', PostController::class);
