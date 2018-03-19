<?php

include_once(dirname(__FILE__) . '/../class/include.php');

$VISITOR = new Visitor(NULL);

if ($VISITOR->logOut()) {
    header('Location: ../visitor-login.php');
} else {
    header('Location: ./?error=2');
}

