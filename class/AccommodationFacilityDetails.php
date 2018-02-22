<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccommodationType
 *
 * @author HP
 */
class AccommodationFacilityDetails {

    public $id;
    public $accommodation;
    public $facility;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`accommodation`,`facility` FROM `acommodation_facility_details` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->accommodation = $result['accommodation'];
            $this->facility = $result['facility'];
            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `acommodation_facility_details` (`accommodation`,`facility`) VALUES  ('"
                . $this->accommodation . "','"
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

        $query = "SELECT * FROM `acommodation_facility_details`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `acommodation_facility_details` SET "
                . "`accommodation` ='" . $this->accommodation . "', "
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

        $query = 'DELETE FROM `acommodation_facility_details` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getFacilitiesByAccommodationId($accommodation) {

        $query = "SELECT `id`,`accommodation`,`facility` FROM `acommodation_facility_details` WHERE `accommodation`= '" . $accommodation . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return $result;
        }
    }

}
