<?php

require_once './utilities/User.class.php';

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

echo User::login($username, $password);
