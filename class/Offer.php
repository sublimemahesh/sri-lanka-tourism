<?php

class Offer {

    public $id;
    public $title;
    public $member;
    public $image_name;
    public $description;
    public $type;
    public $url;
    public $price;
    public $discount;
    public $is_active;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`member`,`title`,`image_name`,`description`,`type`,`url`,`price`,`discount`,`is_active`,`sort` FROM `offer` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->title = $result['title'];
            $this->member = $result['member'];
            $this->image_name = $result['image_name'];
            $this->description = $result['description'];
            $this->type = $result['type'];
            $this->url = $result['url'];
            $this->price = $result['price'];
            $this->discount = $result['discount'];
            $this->is_active = $result['is_active'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `offer` (`title`,`member`,`image_name`,`description`,`type`,`url`,`price`,`discount`,`is_active`,`sort`) VALUES  ('"
                . $this->title . "','"
                . $this->member . "','"
                . $this->image_name . "','"
                . $this->description . "','"
                . $this->type . "','"
                . $this->url . "','"
                . $this->price . "','"
                . $this->discount . "','"
                . $this->is_active . "','"
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

        $query = "SELECT * FROM `offer` ORDER BY sort ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function activeOffers() {

        $query = "SELECT * FROM `offer` WHERE is_active = '1'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function inactiveOffers() {

        $query = "SELECT * FROM `offer` WHERE is_active = '0'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `offer` SET "
                . "`title` ='" . $this->title . "', "
                . "`image_name` ='" . $this->image_name . "', "
                . "`description` ='" . $this->description . "', "
                . "`type` ='" . $this->type . "', "
                . "`url` ='" . $this->url . "', "
                . "`price` ='" . $this->price . "', "
                . "`discount` ='" . $this->discount . "', "
                . "`is_active` ='" . $this->is_active . "', "
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

        $query = 'DELETE FROM `offer` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function GetOfferById($id) {

        $query = "SELECT * FROM `offer` WHERE `id` = '" . $id . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetActiveOfferByType($id) {

        $query = "SELECT * FROM `offer` WHERE `type` = '" . $id . "' AND is_active = '1' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetOfferByType($id) {

        $query = "SELECT * FROM `offer` WHERE `type` = '" . $id . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getOfferByMemberId($member) {

        $query = "SELECT * FROM `offer` WHERE `member`= $member";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function arrange($key, $img) {
        $query = "UPDATE `offer` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
