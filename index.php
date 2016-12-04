<?php

session_start();

setlocale(LC_TIME, "fr_FR");

require_once 'config/parameters.php';
require_once 'config/routing.php';
require_once 'config/functions.php';

my_connect();

include_once 'controller/base.php';

if (file_exists('controller/'.$action.'.php')) {
    include_once 'controller/'.$action.'.php';
}

$role_user = (isset($user) && !is_null($user) ? $user['role_id'] : 5);

// Max role (for login and signup)
if (array_key_exists('max_access', $action_params)) {
    if (intval($action_params['max_access']) >= intval($role_user)) {
        $message = [
            'type'  => 'error',
            'title' => 'Accès refusé',
            'text'  => 'Désolé, vous ne disposez pas des autorisations nécessaires.'
        ];

        $template = 'homepage';
    }
}

// Min role (to post articles or admin stuff)
if (array_key_exists('min_access', $action_params)) {
    if (intval($action_params['min_access']) <= intval($role_user)) {
        $message = [
            'type'  => 'error',
            'title' => 'Accès refusé',
            'text'  => 'Désolé, vous ne disposez pas des autorisations nécessaires.'
        ];

        $template = 'homepage';
    }
}

include_once 'views/'.$layout.'.php';