<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccommodationGeneralFacilities
 *
 * @author HP
 */
class AccommodationGeneralFacilities {

    public $id;
    public $name;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`sort` FROM `accommodation_general_facilities` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->queue = $result['sort'];
            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `accommodation_general_facilities` (`name`,`sort`) VALUES  ('"
                . $this->name . "','"
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

        $query = "SELECT * FROM `accommodation_general_facilities`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `accommodation_general_facilities` SET "
                . "`name` ='" . $this->name . "', "
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

        $query = 'DELETE FROM `accommodation_general_facilities` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }
}