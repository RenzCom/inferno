<?php
spl_autoload_register(function ($class) {
    // Convert namespace to full file path
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $file;
    if (file_exists($filePath)) {
        require $filePath;
    } else {
        echo "File $filePath does not exist\n";
    }
});