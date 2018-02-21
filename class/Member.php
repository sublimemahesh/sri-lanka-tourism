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
    public $contact_number;
    public $profile_picture;
    public $username;
    public $password;
    public $rank;
    public $status;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`email`,`contact_number`,`profile_picture`,`username`,`status`,`rank` FROM `member` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->contact_number = $result['contact_number'];
            $this->profile_picture = $result['profile_picture'];
            $this->username = $result['username'];
            $this->rank = $result['rank'];
            $this->status = $result['status'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `member` (`name`,`email`,`contact_number`,`profile_picture`,`username`,`password`,`status`,`rank`) VALUES  ('"
                . $this->name . "','"
                . $this->email . "','"
                . $this->contact_number . "','"
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
            $_SESSION["contact_number"] = $member->contact_number;
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
        unset($_SESSION["contact_number"]);
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
                . "`contact_number` ='" . $this->contact_number . "', "
                . "`profile_picture` ='" . $this->profile_picture . "', "
                . "`username` ='" . $this->username . "', "
                . "`password` ='" . $this->password . "', "
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

}
