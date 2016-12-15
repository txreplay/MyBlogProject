<?php

require_once 'model/article.php';

$article = article_find_one_by('id', $_GET['id']);

if ($article === false) {
    $template = 'homepage';
} else {
    $template = 'article_edit';
}