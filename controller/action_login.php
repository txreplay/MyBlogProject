<?php

require_once 'model/user.php';

$user = auth($salt);

if (!$user) {
    $template = 'login';
} else {
    $_SESSION['user'] = $user['id'];
    $template = 'homepage';
}

function auth($salt)
{
    global $errors;
    $errors = [];

    if(empty($_POST['username'])) {
        $errors['username'] = "Nom d'utilisateur obligatoire";
    }

    if(empty($_POST['password'])) {
        $errors['password'] = "Mot de passe obligatoire";
    }

    if (!empty($errors)) {
        return false;
    }

    return user_auth($_POST['username'], $_POST['password'], $salt);
}