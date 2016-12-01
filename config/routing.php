<?php

// Infos : ROLES
// 1 : SUPER_ADMIN
// 2 : ADMIN
// 3 : BLOGGER
// 4 : MEMBER
// 5 : ANONYMOUS (Default)

// List all routes
$existing_routes = [
    'homepage' => [],
    'login' => [],
    'signup' => [],
    'article_new' => [
        'min_access' => 3
    ],
    'articles_list' => [],
    'article_single' => [],
];

// List all actions
$existing_actions = [
    'action_homepage' => [],
    'action_login' => [],
    'action_logout' => [],
    'action_signup' => [],
    'action_article_new' => [
        'min_access' => 3
    ],
];

if (!empty($_GET['action'])) {
    if (array_key_exists($_GET['action'], $existing_routes)) {
        $action = $_GET['action'];
        $action_params = $existing_routes[$_GET['action']];
    } elseif (array_key_exists($_GET['action'], $existing_actions)) {
        $action = $_GET['action'];
    } else {
        $message = 'Cette route n\'existe pas.';
    }
}

$template = $action;