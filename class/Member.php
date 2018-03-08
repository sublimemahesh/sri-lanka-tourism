<?php

/**
 * Description of Member
 *
 * @author HP
 */
class Member {

    public $id;
    public $name;
    public $email;
    public $nic_number;
    public $date_of_birthday;
    public $contact_number;
    public $driving_licence_number;
    public $home_address;
    public $city;
    public $profile_picture;
    public $username;
    public $password;
    public $resetcode;
    public $rank;
    public $status;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`email`,`nic_number`,`date_of_birthday`,`contact_number`,`driving_licence_number`,`home_address`,`city`,`profile_picture`,`username`,`status`,`rank` FROM `member` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->nic_number = $result['nic_number'];
            $this->date_of_birthday = $result['date_of_birthday'];
            $this->contact_number = $result['contact_number'];
            $this->driving_licence_number = $result['driving_licence_number'];
            $this->home_address = $result['home_address'];
            $this->city = $result['city'];
            $this->profile_picture = $result['profile_picture'];
            $this->username = $result['username'];
            $this->rank = $result['rank'];
            $this->status = $result['status'];

            return $this;
        }
    }

    public function create() {



        $query = "INSERT INTO `member` (`name`,`email`,`nic_number`,`date_of_birthday`,`contact_number`,`driving_licence_number`,`home_address`,`city`,`profile_picture`,`username`,`password`,`status`,`rank`) VALUES  ('"
                . $this->name . "','"
                . $this->email . "','"
                . $this->nic_number . "','"
                . $this->date_of_birthday . "','"
                . $this->contact_number . "','"
                . $this->driving_licence_number . "','"
                . $this->home_address . "','"
                . $this->city . "','"
                . $this->profile_picture . "','"
                . $this->username . "','"
                . $this->password . "','"
                . $this->status . "','"
                . $this->rank . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function login($username, $password) {

        $query = "SELECT * FROM `member` WHERE `username`= '" . $username . "' AND `password`= '" . $password . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {

            $this->id = $result['id'];
            $member = $this->__construct($this->id);

            if (!isset($_SESSION)) {
                session_start();
                session_unset($_SESSION);
            }

            $_SESSION["login"] = TRUE;

            $_SESSION["id"] = $member->id;
            $_SESSION["name"] = $member->name;
            $_SESSION["email"] = $member->email;
            $_SESSION["nic_number"] = $member->nic_number;
            $_SESSION["date_of_birthday"] = $member->date_of_birthday;
            $_SESSION["contact_number"] = $member->contact_number;
            $_SESSION["driving_licence_number"] = $member->driving_licence_number;
            $_SESSION["home_address"] = $member->home_address;
            $_SESSION["city"] = $member->city;
            $_SESSION["profile_picture"] = $member->profile_picture;
            $_SESSION["username"] = $member->username;
            $_SESSION["status"] = $member->status;
            $_SESSION["rank"] = $member->rank;

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

        $query = "SELECT `id` FROM `member` WHERE `id`= '" . $id . "'";

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
        unset($_SESSION["name"]);
        unset($_SESSION["email"]);
        unset($_SESSION["nic_number"]);
        unset($_SESSION["date_of_birthday"]);
        unset($_SESSION["contact_number"]);
        unset($_SESSION["driving_licence_number"]);
        unset($_SESSION["home_address"]);
        unset($_SESSION["city"]);
        unset($_SESSION["profile_picture"]);
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        unset($_SESSION["status"]);
        unset($_SESSION["rank"]);

        return TRUE;
    }

    public function all() {

        $query = "SELECT * FROM `member`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `member` SET "
                . "`name` ='" . $this->name . "', "
                . "`email` ='" . $this->email . "', "
                . "`nic_number` ='" . $this->nic_number . "', "
                . "`date_of_birthday` ='" . $this->date_of_birthday . "', "
                . "`contact_number` ='" . $this->contact_number . "', "
                . "`driving_licence_number` ='" . $this->driving_licence_number . "', "
                . "`home_address` ='" . $this->home_address . "', "
                . "`city` ='" . $this->city . "', "
                . "`profile_picture` ='" . $this->profile_picture . "', "
                . "`username` ='" . $this->username . "', "
                . "`status` ='" . $this->status . "', "
                . "`rank` ='" . $this->rank . "' "
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

        $query = 'DELETE FROM `member` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function checkOldPass($id, $password) {

        $enPass = md5($password);

        $query = "SELECT `id` FROM `member` WHERE `id`= '" . $id . "' AND `password`= '" . $enPass . "'";

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

        $query = "UPDATE  `member` SET "
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

    public function checkEmail($email) {

        $query = "SELECT `email`,`username` FROM `member` WHERE `email`= '" . $email . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return $result;
        }
    }

    public function GenarateCode($email) {

        $rand = rand(10000, 99999);

        $query = "UPDATE  `member` SET "
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

            $query = "SELECT `email`,`username`,`resetcode` FROM `member` WHERE `email`= '" . $email . "'";

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->username = $result['username'];
            $this->email = $result['email'];
            $this->restCode = $result['resetcode'];

            return $result;
        }
    }

    public function SelectResetCode($code) {

        $query = "SELECT `id` FROM `member` WHERE `resetcode`= '" . $code . "'";

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

        $query = "UPDATE  `member` SET "
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

    public function ChangeProPic($member, $file) {

        $query = "UPDATE  `member` SET "
                . "`profile_picture` ='" . $file . "' "
                . "WHERE `id` = '" . $member . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
