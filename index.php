<?php
use inferno\router\Route;

require 'inferno/autoloader.php';
include 'routes/routes.php';

function replace_custom_tags($content) {
    return preg_replace_callback('/<in-([a-zA-Z0-9_-]+)><\/in-\1>/', function($matches) {
        $component = $matches[1];
        $file = __DIR__ . "/views/components/$component.php";
        if (file_exists($file)) {
            ob_start();
            include $file;
            return ob_get_clean();
        } else {
            return "<div>Component $component not found</div>";
        }
    }, $content);
}

// Start output buffering
ob_start();

// Register a shutdown function to process and output the content
register_shutdown_function(function() {
    $content = ob_get_clean();
    $processed_content = replace_custom_tags($content);
    echo $processed_content;
});

Route::handleRequest($_SERVER['REQUEST_URI']);