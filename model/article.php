<?php

function article_save($title, $content, $user_id, $category_id, $status)
{
    $query = 'INSERT INTO `articles` (`title`, `content`, `user_id`, `created`, `updated`, `slug`, `category_id`, `status`) VALUES (\''.my_escape($title).'\', \''.my_escape($content).'\', \''.my_escape($user_id).'\', \''.date("Y-m-d H:i:s").'\', \''.date("Y-m-d H:i:s").'\', \''.my_escape(my_slug($title)).'\', \''.my_escape($category_id).'\', \''.my_escape($status).'\')';
    my_query($query);
}

function article_find_one_by($field, $value)
{
    $field = 'a.'.$field;

    $query = 'SELECT a.id as article_id, a.title as article_title, a.content as article_content, a.created as article_created, a.updated as article_updated, u.id as user_id, u.username as user_username FROM `articles` AS a JOIN `users` as u ON a.user_id = u.id WHERE '.$field.'=\''.my_escape($value).'\'';

    $result = my_fetch_one($query);

    if (is_null($result)) {
        $errors['identify'] = 'Cet article n\'existe pas.';
        return false;
    } else {
        return $result;
    }
}