<?php

include_once(dirname(__FILE__) . '/../class/include.php');

$originalCheckin = $_POST['checkin'];
$checkin = date("Y-m-d", strtotime($originalCheckin));
$originalCheckout = $_POST['checkout'];
$checkout = date("Y-m-d", strtotime($originalCheckout));
$accommodation = $_POST['accommodation'];

$ACCOMMODATION = new Accommodation($accommodation);

$roombasis = new RoomBasis(NULL);
$roombasises = $roombasis->all();

$ROOM_OBJ = new Room(NULL);
$ROOMS = $ROOM_OBJ->getAccommodationRoomsById($accommodation);

$roomprice = new RoomPrice(NULL);
$bookedrooms = new RoomAvailability(null);

$bookingDates = $bookedrooms->createDateRange($checkin, $checkout, 'Y-m-d');
$dayCount = count($bookingDates);

$arr = array();
$typesdata = array();


$roomSet = array();

foreach ($ROOMS as $room) {

    foreach ($bookingDates as $key => $bookingDate) {
        $typesdata['days'] = $dayCount;
        $totalbooked = 0;

        $bookedData = $bookedrooms->getByDateAndRoom($bookingDate, $room['id']);
        $booked = (int) $bookedData['booked_rooms'];
        $totalbooked = $totalbooked + $booked;

        $totalRooms = (int) $room['number_of_room'];
        $av = $totalRooms - $totalbooked;
        array_push($roomSet, $av);
    }
// get min by roomset
    $avRooms = min($roomSet);

    $typesdata['available'] = $avRooms;

    $arr[$room['id']] = $typesdata;
    $pricesByBasis = array();


    foreach ($roombasises as $roombasis) {

        $price = $roomprice->getPrice($room['id'], $roombasis['id'], $checkin);
        if ($price['price'] == null) {
            $price['price'] = '0.00';
        }
        $pricesByBasis[$roombasis['id']] = $price['price'];
    }

    $arr[$room['id']]['prices'] = $pricesByBasis;
}
header('Content-Type: application/json');
echo json_encode($arr, JSON_PRETTY_PRINT);
