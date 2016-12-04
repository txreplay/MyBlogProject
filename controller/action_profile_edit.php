<?php

require_once 'model/user.php';

$update = check_update($user);

if ($update === true) {

    $message = [
        'type' => 'success',
        'title' => 'OK',
        'text' => 'Profil modifié !'
    ];

    $template = 'profile_show';
    $id = $user['id'];
    $profile = user_find_one_by('id', $id);
    $gravatar = get_gravatar($profile['email'], 200, 'mm', 'g', false, []);

} else {
    $template = 'profile_edit';
}

function check_update($user)
{
    $errors = [];

    if(empty($_POST['username'])) {
        $errors['username'] = "Nom d'utilisateur obligatoire";
    }

    if (user_find_one_by('username', $_POST['username']) != false ) {
        $errors['username_exist'] = "Le nom d'utilisateur ".$_POST['username']." existe déjà.";
    }

    if (!empty($errors)) {
        return false;
    }

    return user_update($user['id'], $_POST['username']);
}