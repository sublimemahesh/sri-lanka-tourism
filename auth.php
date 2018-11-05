<?php

if (!isset($_SESSION)) {
    session_start();
}
//dd($_SESSION);
unset($_SESSION["registered"]);
if (!Visitor::authenticate()) {
    redirect('visitor-login.php');
} 