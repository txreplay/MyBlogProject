<?php

require_once 'model/user.php';

if (key_exists('id', $_GET)) {
    $id = $_GET['id'] ;
} elseif (isset($user)) {
    $id = $user['id'];
} else {
    $id = null;
}

$profile = user_find_one_by('id', $id);
$gravatar = get_gravatar($profile['email'], 200, 'mm', 'g', false, []);

if ($profile === false) {
    $template = 'homepage';

    $message = [
        'type' => 'error',
        'title' => 'Erreur 404',
        'text' => 'Cet utilisateur n\'existe pas.'
    ];
} else {
    $articles = article_find_by_author($id);
    $template = 'profile_show';
}