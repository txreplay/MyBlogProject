<?php

// Connect to the database
function my_connect()
{
    global $link;

    $link = mysqli_connect('localhost', 'root', 'root', 'my_blog_project');
    if (!$link) {
        die('Erreur de connexion ('.mysqli_connect_errno().') '.mysqli_connect_error());
    }
}

// General query
function my_query($query)
{
    global $link;

    $result = mysqli_query($link, $query);

    if (!$result) {
        die('Erreur lors de l\'éxecution de la requête ('.mysqli_errno($link).') '.mysqli_error($link));
    }

    return $result;
}

// Fetch one element from database
function my_fetch_one($query)
{
    $result = my_query($query);
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $data;
}

// Fetch many elements from database
function my_fetch_all($query)
{
    $result = my_query($query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $data;
}

// Escape string for queries
function my_escape($data)
{
    global $link;

    return mysqli_escape_string($link, $data);
}