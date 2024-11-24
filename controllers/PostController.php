<?php
namespace controllers;

use inferno\back\Controller;


class PostController extends Controller {
    public function test() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            echo 'Data is present from controller ';
        } else {
            echo 'No data';
        }
    }
}