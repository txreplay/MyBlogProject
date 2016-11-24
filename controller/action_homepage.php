<?php

require 'model/user.php';

$user_id = (int) $_SESSION['user'];
$user = user_find_by_id($user_id);
