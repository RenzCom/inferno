<?php
namespace inferno\back;

use inferno\views\Error;

class Controller {

    public function __construct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            echo 'Data is present from controller ';
        } else {
            $this->ErrorPage();
        }
    }

    public function ErrorPage() {
        $error = new Error(404);
        exit();
    }
}