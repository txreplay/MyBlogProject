<?php

function article_save($title, $content)
{
    $query = 'INSERT INTO `articles` (`title`, `content`)VALUES (\''.my_escape($title).'\', \''.my_escape($content).'\')';
    my_query($query);
}