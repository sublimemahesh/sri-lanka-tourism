<?php

/**
 * Description of TourSubSection
 *
 * @author official
 */
class TourSubSection {

    public $id;
    public $tour;
    public $title;
    public $duration;
    public $description;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`tour`,`title`,`duration`,`description`,`sort` FROM `tour_sub_section` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->tour = $result['tour'];
            $this->title = $result['title'];
            $this->duration = $result['duration'];
            $this->description = $result['description'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `tour_sub_section` (`tour`, `title`,`duration`,`description`,`sort`) VALUES  ('" . $this->tour . "','" . $this->title . "','" . $this->duration . "','" . $this->description . "', '" . $this->sort . "')";

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

        $query = "SELECT * FROM `tour_sub_section` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `tour_sub_section` SET "
                . "`title` ='" . $this->title . "', "
                . "`duration` ='" . $this->duration . "', "
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

        $query = 'DELETE FROM `tour_sub_section` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function GetTourSubSectionByTourPackage($tour) {

        $query = "SELECT * FROM `tour_sub_section` WHERE `tour` = '" . $tour . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function arrange($key, $img) {
        $query = "UPDATE `tour_sub_section` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
