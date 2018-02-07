<?php

/**
 * Description of TourPackage
 *
 * @author official
 */
class TourPackage {

    public $id;
    public $name;
    public $picture_name;
    public $price;
    public $description;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`picture_name`,`price`,`description`,`sort` FROM `tour_package` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->picture_name = $result['picture_name'];
            $this->price = $result['price'];
            $this->description = $result['description'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `tour_package` (`name`,`picture_name`,`price`,`description`,`sort`) VALUES  ('"
                . $this->name . "', '"
                . $this->picture_name . "', '"
                . $this->price . "', '"
                . $this->description . "', '"
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

        $query = "SELECT * FROM `tour_package` ORDER BY sort ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `tour_package` SET "
                . "`name` ='" . $this->name . "', "
                . "`picture_name` ='" . $this->picture_name . "', "
                . "`price` ='" . $this->price . "', "
                . "`description` ='" . $this->description . "', "
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

        $query = 'DELETE FROM `tour_package` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $img) {
        $query = "UPDATE `tour_package` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
