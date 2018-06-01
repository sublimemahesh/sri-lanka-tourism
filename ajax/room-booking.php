<?php

include_once(dirname(__FILE__) . '/../class/include.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if ($_POST['actionAddBooking'] == 'ADDBOOKING') {
    header('Content-Type: application/json');
    $date = $_POST["date"];
    $visitor = $_POST["visitor"];
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $accommodation = $_POST["accommodation"];
    $total = $_POST["total"];

    $ROOM_BOOKING = new RoomBooking(NULL);

    $ROOM_BOOKING->booking_date = $date;
    $ROOM_BOOKING->visitor = $visitor;
    $ROOM_BOOKING->checkin = $checkin;
    $ROOM_BOOKING->checkout = $checkout;
    $ROOM_BOOKING->accommodation_id = $accommodation;
    $ROOM_BOOKING->total = $total;
    
    $result = $ROOM_BOOKING->create();

    dd($data);
}