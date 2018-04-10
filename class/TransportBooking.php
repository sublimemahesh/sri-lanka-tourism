<?php

class TransportBooking {

    public $id;
    public $transport_rate;
    public $visitor;
    public $date;
    public $time;
    public $date_time_booked;
    public $no_of_passengers;
    public $no_of_baggage;
    public $message;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`transport_rate`,`visitor`,`date`,`time`,`date_time_booked`,`no_of_passengers`,`no_of_baggage`,`message` FROM `transport_booking` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->transport_rate = $result['transport_rate'];
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

        $query = "INSERT INTO `transport_booking` (`transport_rate`,`visitor`,`date`,`time`,`date_time_booked`,`no_of_passengers`,`no_of_baggage`,`message`) VALUES  ('"
                . $this->transport_rate . "','"
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

        $query = "SELECT * FROM `transport_booking` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `transport_booking` SET "
                . "`transport_rate` ='" . $this->transport_rate . "', "
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

        $query = 'DELETE FROM `transport_booking` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

}
