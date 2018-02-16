<?php
 
include_once(dirname(__FILE__) . '/../../class/include.php');

$USER = new User(NULL);

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    header('Location: ../login.php?message=6');
    exit();
}

if ($USER->login($username, $password)) {
    header('Location: ../?message=5');
    exit();
} else {
    header('Location: ../login.php?message=7');
    exit();
}

