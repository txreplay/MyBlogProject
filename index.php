<?php

session_start();

require_once 'config/parameters.php';
require_once 'config/routing.php';
require_once 'config/functions.php';

my_connect();

include_once 'controller/base.php';

if (file_exists('controller/'.$action.'.php')) {
    include_once 'controller/'.$action.'.php';
}

include_once 'views/'.$layout.'.php';