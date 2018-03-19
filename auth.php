<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!Visitor::authenticate()) {
    redirect('visitor-login.php');
}