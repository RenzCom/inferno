<?php
use inferno\router\Route;

require 'inferno/autoloader.php';
include 'routes/routes.php';
Route::handleRequest($_SERVER['REQUEST_URI']);