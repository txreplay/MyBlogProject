<?php

unset($_SESSION['user']);
session_destroy();

$message = [
    'type' => 'warning',
    'title' => 'Déconnexion',
    'text' => 'Vous avez été déconnecté'
];

$template = 'homepage';