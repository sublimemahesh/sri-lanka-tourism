<?php

class RoomPrice {

    public $id;
    public $room;
    public $basis;
    public $price;
    public $start;
    public $end;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`room`,`basis`,`price`,`start`,`end` FROM `room_price` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->room = $result['room'];
            $this->basis = $result['basis'];
            $this->price = $result['price'];
            $this->start = $result['start'];
            $this->end = $result['end'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `room_price` (`room`,`basis`,`price`,`start`,`end`) VALUES  ('"
                . $this->room . "','"
                . $this->basis . "','"
                . $this->price . "','"
                . $this->start . "','"
                . $this->end . "')";

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

        $query = "SELECT * FROM `room_price`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `room_price` SET "
                . "`room` ='" . $this->room . "',"
                . "`basis` ='" . $this->basis . "',"
                . "`price` ='" . $this->price . "',"
                . "`start` ='" . $this->start . "',"
                . "`start` ='" . $this->end . "'"
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

        $query = 'DELETE FROM `room_price` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getPriceByRoomId($id) {

        $query = "SELECT * FROM `room_price` WHERE `room`= $id";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function getAllDistinctSeasons() {

        $db = new Database();

        $query = "SELECT DISTINCT start,end FROM `room_price`";

        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {

            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function getAllFromDateRange($start, $end) {

        $db = new Database();

        $query = "SELECT * FROM `room_price` WHERE `start` = '" . $start . "' AND `end` = '" . $end . "'";

        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {

            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function updateByColumn($id, $column, $data) {

        $query = "UPDATE  `room_price` SET "
                . "`" . $column . "` ='" . $data . "' "
                . " WHERE `id` = '" . $id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
       public function DeleteSeason($start,$end) {

        $db = new Database();

        $query = "DELETE FROM `room_price` WHERE `start` = '" . $start . "' AND `end` = '" . $end . "'";
        
        if ($db->readQuery($query)) {
            $row = TRUE;
        } else {
            $row = FALSE;
        }
        return $row;
    }


}
