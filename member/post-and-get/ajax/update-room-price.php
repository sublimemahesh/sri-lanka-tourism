<?php
include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

$roomprice = new RoomPrice(NULL);

$id = $_POST['id'];
$column = $_POST['column'];
$data = $_POST['data'];

$updatePrice = $roomprice->updateByColumn($id, $column, $data);
$arr = array();

if($updatePrice === TRUE) { 
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
} else {
        $data = array("status" => FALSE);
        header('Content-type: application/json');
        echo json_encode($data);
}
