<?php

class Accommodation {

    public $id;
    public $name;
    public $address;
    public $email;
    public $phone;
    public $website;
    public $city;
    public $type;
    public $member;
    public $rank;
    public $description;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`address`,`email`,`phone`,`website`,`city`,`type`,`member`,`rank`,`description` FROM `accommodation` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->address = $result['address'];
            $this->email = $result['email'];
            $this->phone = $result['phone'];
            $this->website = $result['website'];
            $this->city = $result['city'];
            $this->type = $result['type'];
            $this->member = $result['member'];
            $this->rank = $result['rank'];
            $this->description = $result['description'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `accommodation` (`name`,`address`,`email`,`phone`,`website`,`city`,`type`,`member`,`rank`,`description`) VALUES  ('"
                . $this->name . "','"
                . $this->address . "','"
                . $this->email . "','"
                . $this->phone . "','"
                . $this->website . "','"
                . $this->city . "','"
                . $this->type . "','"
                . $this->member . "','"
                . $this->rank . "','"
                . $this->description . "')";

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

        $query = "SELECT * FROM `accommodation`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `accommodation` SET "
                . "`name` ='" . $this->name . "', "
                . "`address` ='" . $this->address . "', "
                . "`phone` ='" . $this->phone . "', "
                . "`email` ='" . $this->email . "', "
                . "`website` ='" . $this->website . "', "
                . "`city` ='" . $this->city . "', "
                . "`type` ='" . $this->type . "', "
                . "`member` ='" . $this->member . "', "
                . "`rank` ='" . $this->rank . "', "
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

         $this->deletePhotos();
         
        $query = 'DELETE FROM `accommodation` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function deletePhotos() {

        $ACCMMODATION_PHOTO = new AccommodationPhoto(NULL);

        $allPhotos = $ACCMMODATION_PHOTO->getAccommodationPhotosById($this->id);

        foreach ($allPhotos as $photo) {

            $IMG = $ACCMMODATION_PHOTO->image_name = $photo["image_name"];
            unlink(Helper::getSitePath() . "upload/accommodation/" . $IMG);
            unlink(Helper::getSitePath() . "upload/accommodation/thumb/" . $IMG);

            $ACCMMODATION_PHOTO->id = $photo["id"];
            $ACCMMODATION_PHOTO->delete();
        }
    }
    
     public function getAccommodationByMemberId($member) {

        $query = "SELECT * FROM `accommodation` WHERE `member`= $member";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

}
