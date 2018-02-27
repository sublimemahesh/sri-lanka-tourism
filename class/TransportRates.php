<?php
/**
 * Description of TransportRates
 *
 * @author official
 */
class TransportRates {

    public $id;
    public $transport_id;
    public $location_from;
    public $location_to;
    public $distance;
    public $price;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`transport_id`,`location_from`,`location_to`,`distance`,`price`,`sort` FROM `transport_rates` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->transport_id = $result['transport_id'];
            $this->location_from = $result['location_from'];
            $this->location_to = $result['location_to'];
            $this->distance = $result['distance'];
            $this->price = $result['price'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `transport_rates` (`transport_id`,`location_from`,`location_to`,`distance`,`price`,`sort`) VALUES  ('"
                . $this->transport_id . "','"
                . $this->location_from . "','"
                . $this->location_to . "','"
                . $this->distance . "', '"
                . $this->price . "', '"
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

        $query = "SELECT * FROM `transport_rates` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `transport_rates` SET "
                . "`location_from` ='" . $this->location_from . "', "
                . "`location_to` ='" . $this->location_to . "', "
                . "`distance` ='" . $this->distance . "', "
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

        $query = 'DELETE FROM `transport_rates` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function GetTransportRatesByTransportId($transport_id) {

        $query = "SELECT * FROM `transport_rates` WHERE `transport_id` = '" . $transport_id . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetTransportRatesByCityId($location_from, $location_to) {

        $query = "SELECT * FROM `transport_rates` WHERE `location_from` = '" . $location_from . "' AND `location_to` = '" . $location_to . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function arrange($key, $rates) {
        $query = "UPDATE `transport_rates` SET `sort` = '" . $key . "'  WHERE id = '" . $rates . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
