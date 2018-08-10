<?php

/**
 * Description of Article
 *
 * @author official
 */
class Article {

    public $id;
    public $created_date;
    public $title;
    public $article_type;
    public $city;
    public $location;
    public $member;
    public $description;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`created_date`,`title`,`article_type`,`city`,`location`,`member`,`description`,`sort` FROM `article` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->created_date = $result['created_date'];
            $this->title = $result['title'];
            $this->article_type = $result['article_type'];
            $this->city = $result['city'];
            $this->location = $result['location'];
            $this->member = $result['member'];
            $this->description = $result['description'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `article` (`created_date`, `title`, `article_type`,`city`, `location`, `member`,`description`,`sort`) VALUES  ('" . $this->created_date .
                "','" . $this->title .
                "','" . $this->article_type .
                "', '" . $this->city .
                "','" . $this->location .
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

        $query = "SELECT * FROM `article` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `article` SET "
                . "`title` ='" . $this->title . "', "
                . "`location` ='" . $this->location . "', "
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

        $query = 'DELETE FROM `article` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }
    
    public function getLocationsByKeyword($keyword) {
        
        $query = "SELECT * FROM `article` WHERE `location` LIKE '%".$keyword."%' ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

}
