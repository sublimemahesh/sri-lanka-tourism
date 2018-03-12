<?php

class Room {

    public $id;
    public $accommodation;
    public $name;
    public $description;
    public $number_of_room;
    public $number_of_adults;
    public $number_of_children;
    public $number_of_extra_bed;
    public $extra_bed_price;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`accommodation`,`name`,`description`,`number_of_room`,`number_of_adults`,`number_of_children`,`number_of_extra_bed`,`extra_bed_price`,`sort` FROM `rooms` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->accommodation = $result['accommodation'];
            $this->name = $result['name'];
            $this->description = $result['description'];
            $this->number_of_room = $result['number_of_room'];
            $this->number_of_adults = $result['number_of_adults'];
            $this->number_of_children = $result['number_of_children'];
            $this->number_of_extra_bed = $result['number_of_extra_bed'];
            $this->extra_bed_price = $result['extra_bed_price'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `rooms` (`accommodation`,`name`,`description`,`number_of_room`,`number_of_adults`,`number_of_children`,`number_of_extra_bed`,`extra_bed_price`,`sort`) VALUES  ('"
                . $this->accommodation . "','"
                . $this->name . "', '"
                . $this->description . "', '"
                . $this->number_of_room . "', '"
                . $this->number_of_adults . "', '"
                . $this->number_of_children . "', '"
                . $this->number_of_extra_bed . "', '"
                . $this->extra_bed_price . "', '"
                . $this->sort . "')";

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

        $query = "SELECT * FROM `rooms` ORDER BY sort ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `rooms` SET "
                . "`accommodation` ='" . $this->accommodation . "', "
                . "`name` ='" . $this->name . "', "
                . "`description` ='" . $this->description . "', "
                . "`number_of_room` ='" . $this->number_of_room . "', "
                . "`number_of_adults` ='" . $this->number_of_adults . "', "
                . "`number_of_children` ='" . $this->number_of_children . "', "
                . "`number_of_extra_bed` ='" . $this->number_of_extra_bed . "', "
                . "`extra_bed_price` ='" . $this->extra_bed_price . "', "
                . "`sort` ='" . $this->sort . "' "
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

        $query = 'DELETE FROM `rooms` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getAccommodationRoomsById($id) {

        $query = "SELECT * FROM `rooms` WHERE `accommodation`= $id ORDER BY sort ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function arrange($key, $img) {
        $query = "UPDATE `rooms` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
