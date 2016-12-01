<?php

require_once 'model/article.php';

$errors = check_save();

if (empty($errors)) {
    article_save($_POST['title'], $_POST['content'], $user['id'], 1, $_POST['status']);

    $message = [
        'type' => 'success',
        'title' => 'OK',
        'text' => 'Article créé !'
    ];
    $template = 'homepage';
} else {
    $template = 'article_new';
}

function check_save()
{
    $errors = [];

    if(empty($_POST['title'])) {
        $errors['title'] = "Titre obligatoire";
    }

    if(empty($_POST['content'])) {
        $errors['content'] = "Contenu obligatoire";
    }

    return $errors;
}