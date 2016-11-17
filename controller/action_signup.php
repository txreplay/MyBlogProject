<?php

require_once 'model/user.php';

$errors = check_signup();

if (empty($errors)) {
    user_signup($_POST['username'], $_POST['email'], $_POST['password'], $salt);

    $message = 'Inscription réussie !';
    $template = 'homepage';
} else {
    $template = 'signup';
}

function check_signup()
{
    $errors = [];

    if(empty($_POST['username'])) {
        $errors['username'] = "Nom d'utilisateur obligatoire";
    }

    if(empty($_POST['email'])) {
        $errors['email'] = "Adresse e-mail obligatoire";
    }

    if(empty($_POST['password'])) {
        $errors['password'] = "Mot de passe obligatoire";
    }

    if(empty($_POST['password_repeat']) || strcmp($_POST['password'], $_POST['password_repeat']) != 0) {
        $errors['password_repeat'] = "Les mots de passe ne correspondent pas.";
    }

    return $errors;
}
