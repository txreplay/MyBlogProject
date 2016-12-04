<?php

require_once 'model/user.php';

$id = (key_exists('id', $_GET)) ? $_GET['id'] : $user['id'];
$profile = user_find_one_by('id', $id);

if ($profile === false) {
    $template = 'homepage';
} else {
    $template = 'profile_edit';
}