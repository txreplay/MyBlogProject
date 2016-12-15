<?php

// Infos : ROLES
// 1 : ADMIN
// 2 : BLOGGER
// 3 : MEMBER
// 4 : ANONYMOUS (Default)

// List all routes
$existing_routes = [
    'homepage' => [],
    'login' => [
        'max_access' => 3
    ],
    'signup' => [
        'max_access' => 3
    ],
    'article_new' => [
        'min_access' => 3
    ],
    'articles_list' => [],
    'article_single' => [],
    'profile_show' => [],
    'profile_edit' => [
        'min_access' => 3
    ],
    'admin' => [
        'min_access' => 1
    ],
    'article_edit' => [
        'min_access' => 3
    ]
];

// List all actions
$existing_actions = [
    'action_homepage' => [],
    'action_login' => [],
    'action_logout' => [],
    'action_signup' => [],
    'action_article_new' => [
        'min_access' => 2
    ],
    'action_profile_edit' => [
        'min_access' => 3
    ],
    'action_admin' => [
        'min_access' => 1
    ],
    'action_article_edit' => [
        'min_access' => 3
    ],
];

if (!empty($_GET['action'])) {
    // Check if route exist
    if (array_key_exists($_GET['action'], $existing_routes)) {
        $action = $_GET['action'];
        $action_params = $existing_routes[$_GET['action']];

    // Check if action exist
    } elseif (array_key_exists($_GET['action'], $existing_actions)) {
        $action = $_GET['action'];
    } else {
        $message = [
            'type' => 'error',
            'title' => 'Erreur 404',
            'text' => 'Cette page n\'existe pas.'
        ];
    }
}

$template = $action;