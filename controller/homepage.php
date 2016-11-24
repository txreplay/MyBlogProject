<?php

require 'model/user.php';

if (array_key_exists('user', $_SESSION)) {
    $user_id = (int) $_SESSION['user'];
    $user = user_find_one_by('id', $user_id);
}