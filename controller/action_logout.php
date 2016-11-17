<?php

unset($_SESSION['user']);
session_destroy();

$message = 'Vous avez été déconnecté';
$template = 'homepage';