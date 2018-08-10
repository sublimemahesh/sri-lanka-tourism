<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if ($_POST['option'] == 'GETLOCATIONS') {
    
    if (!empty($_POST["keyword"])) {
        $ARTICLE = new Article(NULL);

        $result = $ARTICLE->getLocationsByKeyword($_POST["keyword"]);
        
        header('Content-Type: application/json');

        echo json_encode($result);
        exit();
    }
}

