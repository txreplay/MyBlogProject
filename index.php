<?php

session_start();

require_once 'config/parameters.php';
require_once 'config/routing.php';
require_once 'config/functions.php';

my_connect();

include 'controller/action_homepage.php';

if (file_exists('controller/'.$action.'.php')) {
    include 'controller/'.$action.'.php';
}

include 'views/'.$layout.'.php';