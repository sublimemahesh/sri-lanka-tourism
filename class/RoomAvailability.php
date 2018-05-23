<?php

class RoomAvailability {

    public $id;
    public $room;
    public $date;
    public $booked_rooms;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`room`,`date`,`booked_rooms` FROM `room_avilability` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->room = $result['room'];
            $this->date = $result['date'];
            $this->booked_rooms = $result['booked_rooms'];
            return $this;
        }
    }

    public function all() {

        $query = "SELECT * FROM `room_avilability`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function create() {

        $query = "INSERT INTO `room_avilability` (`room`,`date`,`booked_rooms`) VALUES  ('"
                . $this->room . "','"
                . $this->date . "','"
                . $this->booked_rooms . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function update() {

        $query = "UPDATE  `room_avilability` SET "
                . "`room` ='" . $this->room . "', "
                . "`date` ='" . $this->date . "', "
                . "`booked_rooms` ='" . $this->booked_rooms . "' "
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

        $query = 'DELETE FROM `room_avilability` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getAvailableRoomByDate($date, $room) {

        $db = new Database();

        $query = "SELECT * FROM `room_avilability` WHERE (`room` = '" . $room . "') AND (`date` = '" . $date . "') ";

        $result = $db->readQuery($query);

        $row = mysql_fetch_assoc($result);

        return $row;
    }

    public function setAvailable($room, $date, $setAv) {

        $query = "INSERT INTO `room_avilability` (`date`,`room`,`booked_rooms`) VALUES  ('" . $date . "','" . $room . "','" . $setAv . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function updateAvailable($room, $date, $setAv) {

        $query = "UPDATE `room_avilability` SET "
                . "booked_rooms=booked_rooms+" . $setAv . " "
                . " WHERE (`room` = '" . $room . "') AND (`date` = '" . $date . "') ";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getBookedRoomByRoomAndDate($date, $room) {

        $db = new Database();

        $query = "SELECT * FROM `room_avilability` WHERE (`room` = '" . $room . "') AND (`date` = '" . $date . "') ";

        $result = $db->readQuery($query);

        $row = mysql_fetch_assoc($result);

        if ($row['booked_rooms']) {
            $booked = (int) $row['booked_rooms'];
        } else {
            $booked = 0;
        }
        return $booked;
    }

    public function getMainAvailableForDateById($date, $room) {

        $subTypes = RoomType::getSubTypesByMain($type_id);
        $subBooked = 0;

        foreach ($subTypes as $subType) {

            $subBooked += BookedRooms::getSubBookedByDate($date, $subType['id']);
        }

        $roomType = RoomType::getAllRoomTypeById($type_id);
        $total = (int) $roomType['num_of_room'];

        $available = $total - $subBooked;

        return $available;
    }

    public function drawAvailabiltyCalendar($month, $year, $room) {

        /* draw table */
        $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

        /* table headings */
        $headings = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $calendar .= '<tr class="calendar-row"><td class="calendar-day-head">' . implode('</td><td class="calendar-day-head">', $headings) . '</td></tr>';

        /* days and weeks vars now ... */
        $running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
        $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
        $days_in_this_week = 1;
        $day_counter = 0;
        $dates_array = array();

        /* row for week one */
        $calendar .= '<tr class="calendar-row">';

        /* print "blank" days until the first of the current week */
        for ($x = 0; $x < $running_day; $x++):
            $calendar .= '<td class="calendar-day-np"> </td>';
            $days_in_this_week++;
        endfor;

        $ROOM = new Room($room);

        for ($list_day = 1; $list_day <= $days_in_month; $list_day++):

            $thisDate = $year . '-' . $month . '-' . $list_day;

            $bookedRoom = $this->getBookedRoomByRoomAndDate($thisDate, $room);

            if ($bookedRoom) {
                $number_of_rooms = $ROOM->number_of_room - $bookedRoom;
            } else {
                $number_of_rooms = $ROOM->number_of_room;
            }

            $calendar .= '<td class="calendar-day">';
            /* add in the day number */
            $calendar .= '<div>';
            $calendar .= $list_day;

            $calendar .= '<div class="row">';
            $calendar .= '<div class="col-md-6">';
            $calendar .= 'Available Rooms';
            $calendar .= '</div>';
            $calendar .= '<div class="col-md-6">';
            $calendar .= '<input type="text" value="' . $number_of_rooms . '" class="roomtype" id="room_' . $list_day . '" available="' . $number_of_rooms . '" day="' . $list_day . '" roomid="' . $room . '">';
            $calendar .= '<input type="hidden" year="' . $year . '" month="' . $month . '" day="' . $list_day . '" days-in-month="' . $days_in_month . '" class="date new-date">';
            $calendar .= '</div>';
            $calendar .= '</div>';

            $calendar .= '</div>';

            $calendar .= '</td>';
            if ($running_day == 6):
                $calendar .= '</tr>';
                if (($day_counter + 1) != $days_in_month):
                    $calendar .= '<tr class="calendar-row">';
                endif;
                $running_day = -1;
                $days_in_this_week = 0;
            endif;
            $days_in_this_week++;
            $running_day++;
            $day_counter++;
        endfor;

        /* finish the rest of the days in the week */
        if ($days_in_this_week < 8):
            for ($x = 1; $x <= (8 - $days_in_this_week); $x++):
                $calendar .= '<td class="calendar-day-np"> </td>';
            endfor;
        endif;

        /* final row */
        $calendar .= '</tr>';

        /* end the table */
        $calendar .= '</table>';


        /* all done, return result */
        return $calendar;
    }

    public function createDateRange($startDate, $endDate, $format = "Y-m-d") {
        $begin = new DateTime($startDate);
        $end = new DateTime($endDate);

        $interval = new DateInterval('P1D'); // 1 Day
        $dateRange = new DatePeriod($begin, $interval, $end);

        $range = [];
        foreach ($dateRange as $date) {
            $range[] = $date->format($format);
        }

        return $range;
    }

    public static function getByDateAndRoom($date, $room) {

        $query = "SELECT * FROM `room_avilability` WHERE date = ' " . $date . " ' AND room = ' " . $room . " ' ";
        $db = new Database();


        $result = mysql_fetch_array($db->readQuery($query));


        return $result;
    }

}
