<?php

function user_find_one_by($field, $value)
{
    $query = 'SELECT u.id, u.username, u.description, u.email, u.role_id, u.created, u.updated, r.name AS `role_name` FROM users AS u JOIN `roles` AS r ON u.role_id = r.id WHERE u.'.$field.'=\''.my_escape($value).'\'';

    $result = my_fetch_one($query);

    if (is_null($result)) {
        $errors['identify'] = 'Impossible de vous identifier';
        return false;
    } else {
        return $result;
    }
}

function user_find_all()
{
    $query = 'SELECT id, username, description, email, role_id, created, updated FROM `users` ORDER BY id DESC';

    $result = my_fetch_all($query);

    if (is_null($result)) {
        $errors['users'] = 'Erreur dans la récupération des utilisateurs.';
        return false;
    } else {
        return $result;
    }
}

function user_auth($username, $password, $salt)
{
    $query = 'SELECT id, username, email, role_id, created, updated  FROM `users` WHERE `username`=\''.my_escape($username).'\' AND `password`=\''.sha1($password.$salt).'\'';

    $result = my_fetch_one($query);

    if (is_null($result)) {
        $errors['login'] = 'Identifiants incorrects';
        return false;
    } else {
        return $result;
    }
}

function user_signup($username, $email, $password, $salt)
{
    $query = 'INSERT INTO `users` (`username`, `email`, `password`, `role_id`, `created`, `updated`)VALUES (\''.my_escape($username).'\', \''.my_escape($email).'\', \''.sha1($password.$salt).'\', \'4\', \''.date("Y-m-d H:i:s").'\', \''.date("Y-m-d H:i:s").'\')';

    my_query($query);
}

function user_update($user_id, $username, $description)
{
    $query = 'UPDATE `users` SET username=\''.my_escape($username).'\', updated=\''.date("Y-m-d H:i:s").'\', description=\''.my_escape($description).'\' WHERE id=\''.$user_id.'\'';

    return my_query($query);
}

function user_update_admin($user_id, $username, $role, $description)
{
    $query = 'UPDATE `users` SET username=\''.my_escape($username).'\', role_id=\''.my_escape($role).'\', updated=\''.date("Y-m-d H:i:s").'\', description=\''.my_escape($description).'\' WHERE id=\''.$user_id.'\'';

    return my_query($query);
}