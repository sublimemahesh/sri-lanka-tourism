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
    public $licence_front;
    public $licence_back;
    public $home_address;
    public $city;
    public $profile_picture;
    public $languages;
    public $password;
    public $facebookID;
    public $googleID;
    public $resetcode;
    public $authToken;
    public $about_me;
    public $rank;
    public $status;
    public $phoneVerificationCode;
    public $isPhoneVerified;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`email`,`nic_number`,`date_of_birthday`,`contact_number`,`driving_licence_number`,`licence_front`,`licence_back`,`home_address`,`city`,`profile_picture`,`languages`,`facebookID`,`googleID`,`resetcode`,`authToken`,`about_me`,`status`,`rank`,`phone_verification_code`,`isPhoneVerified` FROM `member` WHERE `id`= '" . $id . "'";

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->nic_number = $result['nic_number'];
            $this->date_of_birthday = $result['date_of_birthday'];
            $this->contact_number = $result['contact_number'];
            $this->driving_licence_number = $result['driving_licence_number'];
            $this->licence_front = $result['licence_front'];
            $this->licence_back = $result['licence_back'];
            $this->home_address = $result['home_address'];
            $this->city = $result['city'];
            $this->profile_picture = $result['profile_picture'];
            $this->languages = $result['languages'];
            $this->facebookID = $result['facebookID'];
            $this->googleID = $result['googleID'];
            $this->resetcode = $result['resetcode'];
            $this->authToken = $result['authToken'];
            $this->about_me = $result['about_me'];
            $this->rank = $result['rank'];
            $this->status = $result['status'];
            $this->phoneVerificationCode = $result['phone_verification_code'];
            $this->isPhoneVerified = $result['isPhoneVerified'];

            return $this;
        }
    }

    public function create() {



        $query = "INSERT INTO `member`(`name`,`email`,`nic_number`,`date_of_birthday`,`contact_number`,`driving_licence_number`,`licence_front`,`licence_back`,`home_address`,`city`,`profile_picture`,`languages`,`password`,`status`,`rank`) VALUES  ('"
                . $this->name . "','"
                . $this->email . "','"
                . $this->nic_number . "','"
                . $this->date_of_birthday . "','"
                . $this->contact_number . "','"
                . $this->driving_licence_number . "','"
                . $this->licence_front . "','"
                . $this->licence_back . "','"
                . $this->home_address . "','"
                . $this->city . "','"
                . $this->profile_picture . "','"
                . $this->languages . "','"
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

    public function createByFB($name, $email, $picture, $fbID, $password) {
//        date_default_timezone_set('Asia/Colombo');
//
//        $createdAt = date('Y-m-d H:i:s');

        $query = "INSERT INTO `member` (`name`,`email`,`profile_picture`,`facebookID`,`password`) VALUES  ('" . $name . "', '" . $email . "', '" . $picture . "', '" . $fbID . "', '" . $password . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        $last_id = mysql_insert_id();

        if ($result) {

            $this->loginByFB($fbID, $password);

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function loginByFB($FbId, $password) {

        $query = "SELECT * FROM `member` WHERE `facebookID`= '" . $FbId . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            $this->setAuthToken($result['id']);
            $member = $this->__construct($result['id']);
            $this->setUserSession($member);

            return TRUE;
        }
    }

    public function login($useremail, $password) {

        $query = "SELECT `id`,`name`,`email`,`profile_picture` FROM `member` WHERE `email`= '" . $useremail . "' AND `password`= '" . $password . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {

            $this->id = $result['id'];
            $this->setAuthToken($result['id']);
            $member = $this->__construct($this->id);

            $this->setUserSession($member);

            return $member;
        }
    }

    private function setAuthToken($id) {

        $authToken = md5(uniqid(rand(), true));

        $query = "UPDATE `member` SET `authToken` ='" . $authToken . "' WHERE `id`='" . $id . "'";

        $db = new Database();

        if ($db->readQuery($query)) {

            return $authToken;
        } else {
            return FALSE;
        }
    }

    private function setUserSession($member) {

        if (!isset($_SESSION)) {
            session_start();
            session_unset($_SESSION);
        }
        unset($_SESSION["id"]);
        unset($_SESSION["name"]);
        unset($_SESSION["email"]);
        unset($_SESSION["profile_picture"]);
        unset($_SESSION["authToken"]);
        unset($_SESSION["login"]);
        unset($_SESSION["isPhoneVerified"]);

        $_SESSION["login"] = TRUE;
        $_SESSION["id"] = $member->id;
        $_SESSION["name"] = $member->name;
        $_SESSION["email"] = $member->email;
        $_SESSION["profile_picture"] = $member->profile_picture;
        $_SESSION["authToken"] = $member->authToken;
        $_SESSION["isPhoneVerified"] = $member->isPhoneVerified;
        $_SESSION["member"] = TRUE;
    }

//    public function authenticate() {
//
//        if (!isset($_SESSION)) {
//            session_start();
//        }
//
//        $id = NULL;
//
//        if (isset($_SESSION["id"])) {
//            $id = $_SESSION["id"];
//        }
//
//        $query = "SELECT `id` FROM `member` WHERE `id`= '" . $id . "'";
//
//        $db = new Database();
//
//        $result = mysql_fetch_array($db->readQuery($query));
//
//        if (!$result) {
//            return FALSE;
//        } else {
//
//            return TRUE;
//        }
//    }

    public function authenticate() {

        if (!isset($_SESSION)) {
            session_start();
        }

        $id = NULL;
        $authToken = NULL;

        if (isset($_SESSION["id"])) {
            $id = $_SESSION["id"];
        }

        if (isset($_SESSION["authToken"])) {
            $authToken = $_SESSION["authToken"];
        }

        $query = "SELECT `id` FROM `member` WHERE `id`= '" . $id . "' AND `authToken`= '" . $authToken . "'";

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
//        unset($_SESSION["nic_number"]);
//        unset($_SESSION["date_of_birthday"]);
//        unset($_SESSION["contact_number"]);
//        unset($_SESSION["driving_licence_number"]);
//        unset($_SESSION["home_address"]);
//        unset($_SESSION["city"]);
        unset($_SESSION["profile_picture"]);
//        unset($_SESSION["username"]);
//        unset($_SESSION["password"]);
//        unset($_SESSION["status"]);
        unset($_SESSION["authToken"]);
//        unset($_SESSION["rank"]);
        unset($_SESSION["login"]);
        unset($_SESSION["isPhoneVerified"]);
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
                . "`licence_front` ='" . $this->licence_front . "', "
                . "`licence_back` ='" . $this->licence_back . "', "
                . "`home_address` ='" . $this->home_address . "', "
                . "`city` ='" . $this->city . "', "
                . "`languages` ='" . $this->languages . "', "
                . "`status` ='" . $this->status . "', "
                . "`about_me` ='" . $this->about_me . "', "
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

        $query = "SELECT `email` FROM `member` WHERE `email`= '" . $email . "'";

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

            $query = "SELECT `email`,`resetcode` FROM `member` WHERE `email`= '" . $email . "'";

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->email = $result['email'];
            $this->resetcode = $result['resetcode'];

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

    public function ChangeLicenceFrontPic($member, $file) {

        $query = "UPDATE  `member` SET "
                . "`licence_front` ='" . $file . "' "
                . "WHERE `id` = '" . $member . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function ChangeLicenceBackPic($member, $file) {

        $query = "UPDATE  `member` SET "
                . "`licence_back` ='" . $file . "' "
                . "WHERE `id` = '" . $member . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function isFbIdIsEx($userID) {

        $query = "SELECT * FROM `member` WHERE `facebookID` = '" . $userID . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if ($result === false) {
            return false;
        } else {
            return true;
        }
    }

    public function createByGoogle($name, $email, $picture, $googleID, $password) {
//        date_default_timezone_set('Asia/Colombo');
//
//        $createdAt = date('Y-m-d H:i:s');

        $query = "INSERT INTO `member` (`name`,`email`,`profile_picture`,`googleID`,`password`) VALUES  ('" . $name . "', '" . $email . "', '" . $picture . "', '" . $googleID . "', '" . $password . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        $last_id = mysql_insert_id();

        if ($result) {

            $this->loginByGoogle($googleID, $password);

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function loginByGoogle($googleID, $password) {

        $query = "SELECT * FROM `member` WHERE `googleID`= '" . $googleID . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            $this->id = $result['id'];
            $this->setAuthToken($result['id']);
            $member = $this->__construct($this->id);
            $this->setUserSession($member);

            if (!isset($_SESSION)) {
                session_start();
                session_unset($_SESSION);
            }

            $_SESSION["login"] = TRUE;

            $_SESSION["id"] = $member->id;

            return TRUE;
        }
    }

    public function isGoogleIdIsEx($googleID) {

        $query = "SELECT * FROM `member` WHERE `googleID` = '" . $googleID . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if ($result === false) {
            return false;
        } else {
            return true;
        }
    }

    public function generatePhoneNoVerifyCode($id) {

        $rand = rand(10000, 99990);

        $query = "UPDATE  `member` SET "
                . "`phone_verification_code` ='" . $rand . "' "
                . "WHERE `id` = '" . $id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $rand;
        } else {
            return FALSE;
        }
    }

    public function updateVerifiedStatus() {

        $query = "UPDATE  `member` SET "
                . "`isPhoneVerified` = 1 "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);
        if (!isset($_SESSION)) {
            session_start();
        }
        if ($result) {
            unset($_SESSION["isPhoneVerified"]);
            $_SESSION["isPhoneVerified"] = 1;
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function updateContactNumber() {

        $query = "UPDATE  `member` SET "
                . "`contact_number` = '" . $this->contact_number . "' "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
