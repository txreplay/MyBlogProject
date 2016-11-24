<?php

// List all routes
$existing_routes = [
    'homepage', 'login', 'signup'
];

// List all actions
$existing_actions = [
    'action_homepage', 'action_login', 'action_logout', 'action_signup'
];

if (!empty($_GET['action']) && array_search($_GET['action'], $existing_routes)) {
    $action = $_GET['action'];
}

$template = $action;