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
    public $facebookID;
    public $googleID;
    public $resetcode;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`first_name`,`second_name`,`email`,`password`,`address`,`city`,`contact_number`,`image_name`,`facebookID`,`googleID`,`resetcode` FROM `visitor` WHERE `id`=" . $id;

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
            $this->facebookID = $result['facebookID'];
            $this->googleID  = $result['googleID'];
            $this->resetcode = $result['resetcode'];

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
        unset($_SESSION["login"]);

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

    public function GenarateCode($email) {

        $rand = rand(10000, 99999);

        $query = "UPDATE  `visitor` SET "
                . "`resetcode` ='" . $rand . "' "
                . "WHERE `email` = '" . $email . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function SelectForgetMember($email) {

        if ($email) {

            $query = "SELECT `email`,`resetcode` FROM `visitor` WHERE `email`= '" . $email . "'";

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->email = $result['email'];
            $this->restCode = $result['resetcode'];

            return $result;
        }
    }

    public function SelectResetCode($code) {

        $query = "SELECT `id` FROM `visitor` WHERE `resetcode`= '" . $code . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {

            return TRUE;
        }
    }

    public function updatePassword($password, $code) {

        $enPass = md5($password);

        $query = "UPDATE  `visitor` SET "
                . "`password` ='" . $enPass . "' "
                . "WHERE `resetcode` = '" . $code . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkEmail($email) {

        $query = "SELECT `email` FROM `visitor` WHERE `email`= '" . $email . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return $result;
        }
    }

    public function isFbIdIsEx($visitorID) {

        $query = "SELECT * FROM `visitor` WHERE `facebookID` = '" . $visitorID . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if ($result === false) {
            return false;
        } else {
            return true;
        }
    }

    public function createByFB($name, $email, $picture, $visitorID, $password) {
//        date_default_timezone_set('Asia/Colombo');
//
//        $createdAt = date('Y-m-d H:i:s');

        $query = "INSERT INTO `visitor` (`first_name`,`email`,`image_name`,`facebookID`,`password`) VALUES  ('" . $name . "', '" . $email . "', '" . $picture . "', '" . $visitorID . "', '" . $password . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        $last_id = mysql_insert_id();

        if ($result) {

            $this->loginByFB($visitorID, $password);

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function loginByFB($visitorID, $password) {

        $query = "SELECT * FROM `visitor` WHERE `facebookID`= '" . $visitorID . "' AND `password`= '" . $password . "'";

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

            return TRUE;
        }
    }

    public function isGoogleIdIsEx($visitorID) {

        $query = "SELECT * FROM `visitor` WHERE `googleID` = '" . $visitorID . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if ($result === false) {
            return false;
        } else {
            return true;
        }
    }

    public function createByGoogle($name, $email, $picture, $visitorID, $password) {
//        date_default_timezone_set('Asia/Colombo');
//
//        $createdAt = date('Y-m-d H:i:s');

        $query = "INSERT INTO `visitor` (`first_name`,`email`,`image_name`,`googleID`,`password`) VALUES  ('" . $name . "', '" . $email . "', '" . $picture . "', '" . $visitorID . "', '" . $password . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        $last_id = mysql_insert_id();

        if ($result) {

            $this->loginByGoogle($visitorID, $password);

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function loginByGoogle($visitorID, $password) {

        $query = "SELECT * FROM `visitor` WHERE `googleID`= '" . $visitorID . "' AND `password`= '" . $password . "'";

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

            return TRUE;
        }
    }

}
