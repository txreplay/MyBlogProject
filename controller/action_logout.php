<?php

unset($_SESSION['user']);
session_destroy();

$message = [
    'type' => 'error',
    'title' => 'Déconnexion',
    'text' => 'Vous avez été déconnecté'
];

$template = 'homepage';