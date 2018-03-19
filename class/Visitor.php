<?php

/**
 * Description of Visitor
 *
 * @author official
 */
class Visitor {

    public $id;
    public $first_name;
    public $second_name;
    public $email;
    public $password;
    public $address;
    public $city;
    public $contact_number;
    public $image_name;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`first_name`,`second_name`,`email`,`password`,`address`,`city`,`contact_number`,`image_name` FROM `visitor` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->first_name = $result['first_name'];
            $this->second_name = $result['second_name'];
            $this->email = $result['email'];
            $this->password = $result['password'];
            $this->address = $result['address'];
            $this->city = $result['city'];
            $this->contact_number = $result['contact_number'];
            $this->image_name = $result['image_name'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `visitor` (`first_name`,`second_name`,`email`,`password`,`address`,`city`,`contact_number`,`image_name`) VALUES  ('"
                . $this->first_name . "','"
                . $this->second_name . "','"
                . $this->email . "','"
                . $this->password . "','"
                . $this->address . "','"
                . $this->city . "','"
                . $this->contact_number . "','"
                . $this->image_name . "')";

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
                . "`first_name` ='" . $this->first_name . "', "
                . "`second_name` ='" . $this->second_name . "', "
                . "`email` ='" . $this->email . "', "
                . "`address` ='" . $this->address . "', "
                . "`city` ='" . $this->city . "', "
                . "`contact_number` ='" . $this->contact_number . "' "
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

    public function login($email, $password) {

        $query = "SELECT * FROM `visitor` WHERE `email`= '" . $email . "' AND `password`= '" . $password . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {

            $this->id = $result['id'];
            $visitor = $this->__construct($this->id);

            if (!isset($_SESSION)) {
                session_start();
                session_unset($_SESSION);
            }

            $_SESSION["login"] = TRUE;

            $_SESSION["id"] = $visitor->id;
            $_SESSION["first_name"] = $visitor->first_name;
            $_SESSION["second_name"] = $visitor->second_name;
            $_SESSION["email"] = $visitor->email;
            return TRUE;
        }
    }

    public function authenticate() {

        if (!isset($_SESSION)) {
            session_start();
        }

        $id = NULL;

        if (isset($_SESSION["id"])) {
            $id = $_SESSION["id"];
        }

        $query = "SELECT `id` FROM `visitor` WHERE `id`= '" . $id . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {

            return TRUE;
        }
    }

    public function logOut() {

        if (!isset($_SESSION)) {
            session_start();
        }

        unset($_SESSION["id"]);
        unset($_SESSION["first_name"]);
        unset($_SESSION["second_name"]);
        unset($_SESSION["email"]);

        return TRUE;
    }

    public function ChangeProPic($visitor, $file) {

        $query = "UPDATE  `visitor` SET "
                . "`image_name` ='" . $file . "' "
                . "WHERE `id` = '" . $visitor . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkOldPass($id, $password) {

        $enPass = md5($password);

        $query = "SELECT `id` FROM `visitor` WHERE `id`= '" . $id . "' AND `password`= '" . $enPass . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function changePassword($id, $password) {

        $enPass = md5($password);

        $query = "UPDATE  `visitor` SET "
                . "`password` ='" . $enPass . "' "
                . "WHERE `id` = '" . $id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
