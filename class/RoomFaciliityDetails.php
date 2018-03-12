<?php

class RoomFaciliityDetails {
    
    public $id;
    public $room;
    public $facility;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`room`,`facility` FROM `room_facility_details` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->room = $result['room'];
            $this->facility = $result['facility'];
            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `room_facility_details` (`room`,`facility`) VALUES  ('"
                . $this->room . "','"
                . $this->facility . "')";

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

        $query = "SELECT * FROM `room_facility_details`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `room_facility_details` SET "
                . "`room` ='" . $this->room . "', "
                . "`facility` ='" . $this->facility . "' "
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

        $query = 'DELETE FROM `room_facility_details` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getFacilitiesByRoomId($room) {

        $query = "SELECT `id`,`room`,`facility` FROM `room_facility_details` WHERE `room`= '" . $room . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return $result;
        }
    }



}
