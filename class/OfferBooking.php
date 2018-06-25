<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OfferBooking
 *
 * @author Sublime
 */
class OfferBooking {

    public $id;
    public $offer;
    public $visitor;
    public $date_time_booked;
    public $message;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`offer`,`visitor`,`date_time_booked`,`message` FROM `offer_booking` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->offer = $result['offer'];
            $this->visitor = $result['visitor'];
            $this->date_time_booked = $result['date_time_booked'];
            $this->message = $result['message'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `offer_booking` (`offer`,`visitor`,`date_time_booked`,`message`) VALUES  ('"
                . $this->offer . "','"
                . $this->visitor . "','"
                . $this->date_time_booked . "','"
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

        $query = "SELECT * FROM `offer_booking` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `offer_booking` SET "
                . "`offer` ='" . $this->offer . "', "
                . "`visitor` ='" . $this->visitor . "', "
                . "`date_time_booked` ='" . $this->date_time_booked . "', "
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

        $query = 'DELETE FROM `offer_booking` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

}
