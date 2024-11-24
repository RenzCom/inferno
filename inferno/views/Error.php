<?php
    namespace inferno\views;

    class Error {
        public function __construct($error = 500) {
            echo <<<HTML
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Error</title>
            </head>
            <body>
                <h1>$error</h1>
            </body>
            </html>
            HTML;
        }
    }

