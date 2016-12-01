<?php

require_once 'model/user.php';

$profile = user_find_one_by('id', $_GET['id']);

if ($profile === false) {
    $template = 'homepage';
} else {
    $template = 'profile_edit';
}