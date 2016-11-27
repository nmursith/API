<?php

require_once './utilities/User.class.php';

$username = isset($_POST['username'])?$_POST['username']:"";
$password = isset($_POST['password'])?$_POST['password']:"";
$first_name = isset($_POST['first_name'])?$_POST['first_name']:"";
$last_name = isset($_POST['last_name'])?$_POST['last_name']:"";
$email = isset($_POST['email'])?$_POST['email']:"";

User::add($username, $password, $first_name, $last_name, $email);



