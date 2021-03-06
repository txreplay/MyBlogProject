<?php

require_once 'model/user.php';

$errors = check_signup();

if (empty($errors)) {
    user_signup($_POST['username'], $_POST['email'], $_POST['password'], $salt);

    $message = [
        'type' => 'success',
        'title' => 'OK',
        'text' => 'Inscription réussie !'
    ];
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

    if(!preg_match("/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i", $_POST['email'])){
        $errors['email_not_email'] = "L'adresse e-mail n'est pas valide.";
    }

    if (user_find_one_by('email', $_POST['email']) != false ) {
        $errors['email_exist'] = "L'adresse e-mail ".$_POST['email']." existe déjà.";
    }

    if (user_find_one_by('username', $_POST['username']) != false ) {
        $errors['username_exist'] = "Le nom d'utilisateur ".$_POST['username']." existe déjà.";
    }

    return $errors;
}
