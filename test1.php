<?php

error_reporting(E_ALL); ini_set('display_errors', 1);
 phpinfo();

require_once('ESMSWS1.php');
$id='';
$username='esmsusr_adl';
$password='Keerthi@1994';
$customer='';
$mask='TRAVEL SL';
$Message='Test By Kavini';
//serviceTest($id,$username,$password,$customer);

$session=createSession($id,$username,$password,$customer);
//var_dump($session);
sendMessages($session,$mask,$Message,array('94774683449','94710169549'));
closeSession($session);


?>