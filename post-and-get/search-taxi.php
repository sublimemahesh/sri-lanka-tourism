<?php

include_once(dirname(__FILE__) . '/../class/include.php');
if (isset($_POST['search'])) {

    $SEARCH = new Search(NULL);

    $from = $_POST['piking-up'];
    $to = $_POST['dropping-off'];

    $SEARCH->GetTransportByLocationFromAndTo($from, $to);
}
