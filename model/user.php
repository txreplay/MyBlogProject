<?php

function user_find_one_by($field, $value)
{
    $query = 'SELECT id, username, email, role_id FROM `users` WHERE `'.$field.'`=\''.my_escape($value).'\'';

    $result = my_fetch_one($query);

    if (is_null($result)) {
        $errors['identify'] = 'Impossible de vous identifier';
        return false;
    } else {
        return $result;
    }
}

function user_auth($username, $password, $salt)
{
    $query = 'SELECT `id`, `username`, `email` FROM `users` WHERE `username`=\''.my_escape($username).'\' AND `password`=\''.sha1($password.$salt).'\'';

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
    $query = 'INSERT INTO `users` (`username`, `email`, `password`, `role_id`)VALUES (\''.my_escape($username).'\', \''.my_escape($email).'\', \''.sha1($password.$salt).'\', \'4\')';

    my_query($query);
}