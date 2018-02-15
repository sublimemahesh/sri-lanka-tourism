<?php

/**
 * Description of Visitor
 *
 * @author official
 */
class Visitor {

    public $id;
    public $name;
    public $email;
    public $contact_number;
    public $city;
    public $profile_picture;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`email`,`contact_number`,`city`,`profile_picture` FROM `visitor` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->contact_number = $result['contact_number'];
            $this->city = $result['city'];
            $this->profile_picture = $result['profile_picture'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `visitor` (`name`,`email`,`contact_number`,`city`,`profile_picture`) VALUES  ('"
                . $this->name . "','"
                . $this->email . "','"
                . $this->contact_number . "','"
                . $this->city . "','"
                . $this->profile_picture . "')";

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

        $query = "SELECT * FROM `visitor`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `visitor` SET "
                . "`name` ='" . $this->name . "', "
                . "`email` ='" . $this->email . "', "
                . "`contact_number` ='" . $this->contact_number . "', "
                . "`city` ='" . $this->city . "', "
                . "`profile_picture` ='" . $this->profile_picture . "' "
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

        $query = 'DELETE FROM `visitor` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

}
