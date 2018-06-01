<?php

include_once(dirname(__FILE__) . '/../class/include.php');

if (isset($_POST['book'])) {

    $date = $_POST["date_time_booked"];
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



    if ($result) {
        foreach ($_POST['roomB'] as $key => $room) {

            $roomId = $key;
            foreach ($room as $key => $roomPrices) {
                $bookingId = $result->id;

                if ($roomPrices != 0) {
                    $roomBasis = $key;
                    $numberOfRoom = explode("XXX", $roomPrices)[0];
                    $roomPrice = explode("XXX", $roomPrices)[1];
                    $ROOM_BOOKING_DETAILS = new BookingRoomDetails(NULL);

                    $ROOM_BOOKING_DETAILS->booking_id = $bookingId;
                    $ROOM_BOOKING_DETAILS->room_id = $roomId;
                    $ROOM_BOOKING_DETAILS->basis_id = $roomBasis;
                    $ROOM_BOOKING_DETAILS->no_of_rooms = $numberOfRoom;
                    $ROOM_BOOKING_DETAILS->price = $roomPrice;
                    $ROOM_BOOKING_DETAILS->create();

                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }
        }
    }
}


