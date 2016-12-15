<?php

require_once 'model/article.php';

$errors = check_edit();

if (empty($errors)) {
    article_edit($_POST['id'], $_POST['title'], $_POST['chapeau'], $_POST['content'], 1, $_POST['status']);

    $message = [
        'type' => 'success',
        'title' => 'OK',
        'text' => 'Article modifié !'
    ];
    $template = 'homepage';
} else {
    $template = 'article_edit';
}

function check_edit()
{
    $errors = [];

    if(empty($_POST['title'])) {
        $errors['title'] = "Titre obligatoire";
    }

    if(empty($_POST['chapeau'])) {
        $errors['chapeau'] = "Chapeau obligatoire";
    }

    if(empty($_POST['content'])) {
        $errors['content'] = "Contenu obligatoire";
    }

    return $errors;
}