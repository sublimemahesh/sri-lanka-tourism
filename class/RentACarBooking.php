<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RentACarBooking
 *
 * @author HP
 */
class RentACarBooking {

    public $id;
    public $transport;
    public $visitor;
    public $date;
    public $time;
    public $date_time_booked;
    public $no_of_passengers;
    public $no_of_baggage;
    public $message;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`transport`,`visitor`,`date`,`time`,`date_time_booked`,`no_of_passengers`,`no_of_baggage`,`message` FROM `rent_a_car_booking` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->transport = $result['transport'];
            $this->visitor = $result['visitor'];
            $this->date = $result['date'];
            $this->time = $result['time'];
            $this->date_time_booked = $result['date_time_booked'];
            $this->no_of_passengers = $result['no_of_passengers'];
            $this->no_of_baggage = $result['no_of_baggage'];
            $this->message = $result['message'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `rent_a_car_booking` (`transport`,`visitor`,`date`,`time`,`date_time_booked`,`no_of_passengers`,`no_of_baggage`,`message`) VALUES  ('"
                . $this->transport . "','"
                . $this->visitor . "','"
                . $this->date . "','"
                . $this->time . "','"
                . $this->date_time_booked . "','"
                . $this->no_of_passengers . "','"
                . $this->no_of_baggage . "','"
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

        $query = "SELECT * FROM `rent_a_car_booking` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `rent_a_car_booking` SET "
                . "`transport` ='" . $this->transport . "', "
                . "`visitor` ='" . $this->visitor . "', "
                . "`date` ='" . $this->date . "', "
                . "`time` ='" . $this->time . "', "
                . "`date_time_booked` ='" . $this->date_time_booked . "', "
                . "`no_of_passengers` ='" . $this->no_of_passengers . "', "
                . "`no_of_baggage` ='" . $this->no_of_baggage . "', "
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

        $query = 'DELETE FROM `rent_a_car_booking` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

}
