<?php

require_once 'model/user.php';

$update = check_update($user);

$id = $user['id'];
$profile = user_find_one_by('id', $id);
$gravatar = get_gravatar($profile['email'], 200, 'mm', 'g', false, []);

if ($update === true) {
    $message = [
        'type' => 'success',
        'title' => 'OK',
        'text' => 'Profil modifié !'
    ];

    $template = 'profile_show';
} else {
    $template = 'profile_edit';
}

function check_update($user)
{
    $errors = [];

    if(empty($_POST['username'])) {
        $errors['username'] = "Nom d'utilisateur obligatoire";
    }

    $username_check = user_find_one_by('username', $_POST['username']);

    if ($username_check != false && $user['id'] != $username_check['id']) {
        $errors['username_exist'] = "Le nom d'utilisateur ".$_POST['username']." existe déjà.";
    }

    if (!empty($errors)) {
        return false;
    }

    if ($user['role_id'] <= 2) {
        return user_update_admin($user['id'], $_POST['username'], $_POST['role'], $_POST['description']);
    } else {
        return user_update($user['id'], $_POST['username'], $_POST['description']);
    }
}