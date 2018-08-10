<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

$TOURSUBSECTION = new TourSubSection(NULL);

foreach ($_POST['data'] as $data) {
    
        $TOURSUBSECTION->tour = $data['tour'];
        $TOURSUBSECTION->id = $data['id'];
        $TOURSUBSECTION->title = $data['title'];
        $TOURSUBSECTION->description = $data['description'];
        $TOURSUBSECTION->locations = $data['tags'];
        
        $result = $TOURSUBSECTION->update();
    
}


header('Content-Type: application/json');

echo json_encode($result);
exit();
