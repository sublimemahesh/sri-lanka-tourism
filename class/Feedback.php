<?php

class Feedback {

    public $id;
    public $visitor;
    public $rate;
    public $title;
    public $description;
    public $date_time;
    public $accommodation;
    public $transport;
    public $tour_package;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`visitor`,`rate`,`title`,`description`,`date_time`,`accommodation`,`transport`,`tour_package` FROM `feedback` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->visitor = $result['visitor'];
            $this->rate = $result['rate'];
            $this->title = $result['title'];
            $this->description = $result['description'];
            $this->date_time = $result['date_time'];
            $this->accommodation = $result['accommodation'];
            $this->transport = $result['transport'];
            $this->tour_package = $result['tour_package'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `feedback`(`visitor`,`rate`,`title`,`description`,`date_time`,`accommodation`,`transport`,`tour_package`) VALUES  ('"
                . $this->visitor . "','"
                . $this->rate . "','"
                . $this->title . "','"
                . $this->description . "','"
                . $this->date_time . "','"
                . $this->accommodation . "','"
                . $this->transport . "','"
                . $this->tour_package . "')";

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

        $query = "SELECT * FROM `feedback`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `feedback` SET "
                . "`title` ='" . $this->title . "', "
                . "`description` ='" . $this->description . "' "
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

        $query = 'DELETE FROM `feedback` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getFeedbackByTransportID($transport) {

        $query = "SELECT * FROM `feedback` WHERE `transport` = '" . $transport . "'";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }
    
    public function getFeedbackByTourPackageID($tour) {

        $query = "SELECT * FROM `feedback` WHERE `tour_package` = '" . $tour . "'";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

}
