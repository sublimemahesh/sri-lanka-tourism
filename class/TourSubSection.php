<?php

/**
 * Description of TourSubSection
 *
 * @author official
 */
class TourSubSection {

    public $id;
    public $tour;
    public $title;
    public $description;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`tour`,`title`,`description`,`sort` FROM `tour_sub_section` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->tour = $result['tour'];
            $this->title = $result['title'];
            $this->description = $result['description'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `tour_sub_section` (`tour`, `title`,`description`,`sort`) VALUES  ('" . $this->tour . "','" . $this->title . "','" . $this->description . "', '" . $this->sort . "')";

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

        $query = "SELECT * FROM `tour_sub_section` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `tour_sub_section` SET "
                . "`title` ='" . $this->title . "', "
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
      
        $query = 'DELETE FROM `tour_sub_section` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function deletePhotos() {

        $TOUR_SUB_PHOTO = new TourSubSectionPhoto(NULL);

        $allPhotos = $TOUR_SUB_PHOTO->getTourSubSectionPhotosById($this->id);

        foreach ($allPhotos as $photo) {

            $IMG = $TOUR_SUB_PHOTO->image_name = $photo["image_name"];
            unlink(Helper::getSitePath() . "upload/tour-package/sub-section/" . $IMG);
            unlink(Helper::getSitePath() . "upload/tour-package/sub-section/thumb/" . $IMG);

            $TOUR_SUB_PHOTO->id = $photo["id"];
            $TOUR_SUB_PHOTO->delete();
        }
    }

    public function GetTourSubSectionByTourPackage($tour) {

        $query = "SELECT * FROM `tour_sub_section` WHERE `tour` = '" . $tour . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function arrange($key, $img) {
        $query = "UPDATE `tour_sub_section` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }
    
    public function CountDaysInTour($tour) {

        $query = "SELECT count(id) AS days FROM `tour_sub_section` WHERE `tour` = '" . $tour . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        return $result;
    }

}
