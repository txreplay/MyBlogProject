<?php

require_once 'model/user.php';

$id = (key_exists('id', $_GET)) ? $_GET['id'] : $user['id'];
$profile = user_find_one_by('id', $id);
$gravatar = get_gravatar($profile['email'], 200, 'mm', 'g', false, []);
$articles = article_find_by_author($id);

if ($profile === false) {
    $template = 'homepage';
} else {
    $template = 'profile_show';
}