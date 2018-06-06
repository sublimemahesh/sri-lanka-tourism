<?php

class RoomBooking {

    //put your code here
    public $id;
    public $booking_date;
    public $checkin;
    public $checkout;
    public $visitor;
    public $accommodation_id;
    public $total;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`booking_date`,`checkin`,`checkout`,`visitor`,`accommodation_id`,`total` FROM `room_booking` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->booking_date = $result['booking_date'];
            $this->checkin = $result['checkin'];
            $this->checkout = $result['checkout'];
            $this->visitor = $result['visitor'];
            $this->accommodation_id = $result['accommodation_id'];
            $this->total = $result['total'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `room_booking` (`booking_date`,`checkin`,`checkout`,`visitor`,`accommodation_id`,`total`) VALUES  ("
                . "'" . $this->booking_date .
                "','" . $this->checkin .
                "','" . $this->checkout .
                "','" . $this->visitor .
                "','" . $this->accommodation_id .
                "','" . $this->total . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function all() {

        $query = "SELECT * FROM `room_booking` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `room_booking` SET "
                . "`booking_date` ='" . $this->booking_date . "', "
                . "`checkin` ='" . $this->checkin . "', "
                . "`checkout` ='" . $this->checkout . "', "
                . "`visitor` ='" . $this->visitor . "', "
                . "`registered_number` ='" . $this->accommodation_id . "', "
                . "`total` ='" . $this->total . "' "
                . "WHERE `id` = '" . $this->id . "'";
        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function delete() {

        $query = 'DELETE FROM `room_booking` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

}
