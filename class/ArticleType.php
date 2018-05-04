<?php

/**
 * Description of ArticleType
 *
 * @author official
 */
class ArticleType {

    public $id;
    public $name;
    public $picture_name;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`picture_name`,`sort` FROM `article_type` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->picture_name = $result['picture_name'];
            $this->sort = $result['sort'];
            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `article_type` (`name`,`picture_name`,`sort`) VALUES  ('"
                . $this->name . "','"
                . $this->picture_name . "','"
                . $this->sort . "')";

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

        $query = "SELECT * FROM `article_type`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `article_type` SET "
                . "`name` ='" . $this->name . "', "
                . "`picture_name` ='" . $this->picture_name . "', "
                . "`sort` ='" . $this->sort . "' "
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

        unlink(Helper::getSitePath() . "upload/article-type/" . $this->picture_name);

        $query = 'DELETE FROM `article_type` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

}
