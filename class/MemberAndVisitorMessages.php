<?php

/**
 * Description of MemberAndVisitorMessages
 *
 * @author K Nisansala
 */
class MemberAndVisitorMessages {

    public $id;
    public $date_and_time;
    public $member;
    public $visitor;
    public $messages;
    public $sender;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`date_and_time`,`member`,`visitor`,`messages`,`sender` FROM `member_visitor_messages` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->date_and_time = $result['date_and_time'];
            $this->member = $result['member'];
            $this->visitor = $result['visitor'];
            $this->messages = $result['messages'];
            $this->sender = $result['sender'];

            return $this;
        }
    }

    public function create() {
        date_default_timezone_set('Asia/Colombo');
        $createdAt = date('Y-m-d H:i:s');

        $query = "INSERT INTO `member_visitor_messages` (`date_and_time`,`member`,`visitor`,`messages`,`sender`) VALUES  ('"
                . $createdAt . "','"
                . $this->member . "', '"
                . $this->visitor . "', '"
                . $this->messages . "', '"
                . $this->sender . "')";

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

        $query = "SELECT * FROM `member_visitor_messages` ORDER BY `date_and_time` DESC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `member_visitor_messages` SET "
                . "`date_and_time` ='" . $this->date_and_time . "', "
                . "`member` ='" . $this->member . "', "
                . "`visitor` ='" . $this->visitor . "', "
                . "`messages` ='" . $this->messages . "' "
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

        $query = 'DELETE FROM `member_visitor_messages` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getMessagesByMemberId($member) {

        $query = "SELECT * FROM `member_visitor_messages` WHERE `member`= $member ORDER BY date_and_time DESC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function getDistinctVisitorsByMemberId($member) {
        $query = "SELECT distinct(visitor) FROM `member_visitor_messages` WHERE `member`= $member";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function getMaxIDOfDistinctMember($member) {

        $query = "SELECT max(id) AS `max` FROM `member_visitor_messages` WHERE `member`= $member";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));
        return $result;
    }

    public function getMaxIDOfDistinctVisitor($visitor) {

        $query = "SELECT max(id) AS `max` FROM `member_visitor_messages` WHERE `visitor`= $visitor";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));
        return $result;
    }

    public function getLatestMessageByVisitorAndMember($visitor, $member) {

        $query = "SELECT * FROM `member_visitor_messages` WHERE `visitor`= $visitor AND `member`= $member ORDER BY date_and_time DESC LIMIT 1";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));
        return $result;
    }

    public function getMessagesByVisitorAndMemberASC($visitor, $member) {

        $query = "SELECT * FROM `member_visitor_messages` WHERE `visitor`= $visitor AND `member`= $member ORDER BY date_and_time ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function arrange($key, $img) {
        $query = "UPDATE `member_visitor_messages` SET `messages` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public static function getDistinctMembersByVisitorId($visitor) {
        $query = "SELECT distinct(member) FROM `member_visitor_messages` WHERE `visitor`= $visitor";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

}
