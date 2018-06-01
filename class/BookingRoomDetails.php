<?php

class BookingRoomDetails {

    //put your code here
    public $id;
    public $booking_id;
    public $room_id;
    public $basis_id;
    public $no_of_rooms;
    public $price;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`booking_id`,`room_id`,`basis_id`,`no_of_rooms`,`price` FROM `booking_room_details` WHERE `id`=" . $id;
           
            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));
            $this->id = $result['id'];
            $this->booking_id = $result['booking_id'];
            $this->room_id = $result['room_id'];
            $this->basis_id = $result['basis_id'];
            $this->no_of_rooms = $result['no_of_rooms'];
            $this->price = $result['price'];
           
            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `booking_room_details` (`booking_id`,`room_id`,`basis_id`,`no_of_rooms`,`price`) VALUES  ("
                . "'" . $this->booking_id .
                "','" . $this->room_id .
                "','" . $this->basis_id .
                "','" . $this->no_of_rooms .
                "','" . $this->price . "')";

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

        $query = "SELECT * FROM `booking_room_details` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `booking_room_details` SET "
                . "`booking_id` ='" . $this->booking_id . "', "
                . "`room_id` ='" . $this->room_id . "', "
                . "`basis_id` ='" . $this->basis_id . "', "
                . "`no_of_rooms` ='" . $this->no_of_rooms . "', "
                . "`price` ='" . $this->price . "' "
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

        $query = 'DELETE FROM `booking_room_details` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    
}
