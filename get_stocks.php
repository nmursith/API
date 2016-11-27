<?php


include_once './utilities/Stock.class.php';
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

$res;
if (isset($username) && isset($password)) {
    $res = Stock::getAll($username, $password);
}

echo json_encode($res);


