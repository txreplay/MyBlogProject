<?php

// List all routes
$existing_routes = [
    'homepage', 'login', 'signup', 'article_new', 'article_single'
];

// List all actions
$existing_actions = [
    'action_homepage', 'action_login', 'action_logout', 'action_signup', 'action_article_new'
];

if (!empty($_GET['action'])) {
    if (array_search($_GET['action'], $existing_routes) || array_search($_GET['action'], $existing_actions)) {
        $action = $_GET['action'];
    } else {
        $message = 'Cette route n\'existe pas.';
    }
}

$template = $action;