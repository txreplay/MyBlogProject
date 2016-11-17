<?php

// List all routes
$existing_routes = [
    'homepage'
];

// List all actions
$existing_actions = [

];

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$template = $action;