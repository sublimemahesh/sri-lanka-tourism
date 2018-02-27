<?php

/**
 * Description of Transports
 *
 * @author official
 */
class Transports {

    public $id;
    public $title;
    public $vehicle_type;
    public $member;
    public $description;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`title`,`vehicle_type`,`member`,`description`,`sort` FROM `transports` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->title = $result['title'];
            $this->vehicle_type = $result['vehicle_type'];
            $this->member = $result['member'];
            $this->description = $result['description'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `transports` (`title`,`vehicle_type`,`member`,`description`,`sort`) VALUES  ("
                . "'" . $this->title .
                "','" . $this->vehicle_type .
                "', '" . $this->member .
                "','" . $this->description .
                "','" . $this->sort . "')";

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

        $query = "SELECT * FROM `transports` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `transports` SET "
                . "`title` ='" . $this->title . "', "
                . "`member` ='" . $this->member . "', "
                . "`description` ='" . $this->description . "', "
                . "`vehicle_type` ='" . $this->vehicle_type . "' "
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
        $this->deleteTransportRates();

        $query = 'DELETE FROM `transports` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function deletePhotos() {

        $TRANSPORT_PHOTO = new TransportPhoto(NULL);

        $allPhotos = $TRANSPORT_PHOTO->getTransportPhotosById($this->id);

        foreach ($allPhotos as $photo) {

            $IMG = $TRANSPORT_PHOTO->image_name = $photo["image_name"];
            unlink(Helper::getSitePath() . "upload/transport/transport-photo/gallery/" . $IMG);
            unlink(Helper::getSitePath() . "upload/transport/transport-photo/gallery/thumb/" . $IMG);

            $TRANSPORT_PHOTO->id = $photo["id"];
            $TRANSPORT_PHOTO->delete();
        }
    }

    public function deleteTransportRates() {

        $TRANSPORT_RATES = new TransportRates(NULL);

        $Rates = $TRANSPORT_RATES->GetTransportRatesByTransportId($this->id);

        foreach ($Rates as $Rate) {

            $TRANSPORT_RATES->id = $Rate["id"];
            $TRANSPORT_RATES->delete();
        }
    }

    public function getTransportsByMemberId($member) {

        $query = "SELECT * FROM `transports` WHERE `member`= $member";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

}
