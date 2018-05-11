<?php

/**
 * Description of TourPackageBooking
 *
 * @author U s E r ¨
 */
class TourPackageBooking {

    public $id;
    public $tour_package;
    public $visitor;
    public $date_time_booked;
    public $start_date;
    public $end_date;
    public $no_of_adults;
    public $no_of_children;
    public $price_per_person;
    public $message;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`tour_package`,`visitor`,`date_time_booked`,`start_date`,`end_date`,`no_of_adults`,`no_of_children`,`price_per_person`,`message` FROM `tour_package_booking` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->tour_package = $result['tour_package'];
            $this->visitor = $result['visitor'];
            $this->date_time_booked = $result['date_time_booked'];
            $this->start_date = $result['start_date'];
            $this->end_date = $result['end_date'];
            $this->no_of_adults = $result['no_of_adults'];
            $this->no_of_children = $result['no_of_children'];
            $this->price_per_person = $result['price_per_person'];
            $this->message = $result['message'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `tour_package_booking` (`tour_package`,`visitor`,`date_time_booked`,`start_date`,`end_date`,`no_of_adults`,`no_of_children`,`price_per_person`,`message`) VALUES  ('"
                . $this->tour_package . "','"
                . $this->visitor . "','"
                . $this->date_time_booked . "','"
                . $this->start_date . "','"
                . $this->end_date . "','"
                . $this->no_of_adults . "','"
                . $this->no_of_children . "','"
                . $this->price_per_person . "','"
                . $this->message . "')";

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

        $query = "SELECT * FROM `tour_package_booking` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `tour_package_booking` SET "
                . "`tour_package` ='" . $this->tour_package . "', "
                . "`visitor` ='" . $this->visitor . "', "
                . "`date_time_booked` ='" . $this->date_time_booked . "', "
                . "`start_date` ='" . $this->start_date . "', "
                . "`end_date` ='" . $this->end_date . "', "
                . "`no_of_adults` ='" . $this->no_of_adults . "', "
                . "`no_of_children` ='" . $this->no_of_children . "', "
                . "`price_per_person` ='" . $this->price_per_person . "', "
                . "`message` ='" . $this->message . "' "
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

        $query = 'DELETE FROM `tour_package_booking` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

}
