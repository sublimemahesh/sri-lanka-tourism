<?php
require_once('ESMSWS.php');


class Helper {

    public function randamId() {

        $today = time();
        $startDate = date('YmdHi', strtotime('1912-03-14 09:06:00'));
        $range = $today - $startDate;
        $rand = rand(0, $range);
        $randam = $rand . "_" . ($startDate + $rand) . '_' . $today . "_n";
        return $randam;
    }

    public function calImgResize($newHeight, $width, $height) {
        $percent = $newHeight / $height;
        $result1 = $percent * 100;
        $result2 = $width * $result1 / 100;
        return array($result2, $newHeight);
    }

    public function getSitePath() {
//      return substr_replace(dirname(__FILE__), '', 70);
        $path = str_replace('class', '', dirname(__FILE__));
        return $path;
    }

    public function sendSMS($phoneno, $message) {
        if (substr_count ($_POST['contact_number'], '+') == 1) {
            $reciepientno = substr($phoneno, 1, strlen($phoneno));
        } else {
            $reciepientno = $phoneno;
        }
        
        $id = '';
        $username = 'esmsusr_adl';
        $password = 'Keerthi@1994';
        $customer = '';
        $alias = 'TRAVEL SL';
        $recipient = $reciepientno; // All local number should be in 94XXXXXXXXX
        
//==================== Create a new session =================//
        $session = createSession($id, $username, $password, $customer);
        
        $sendmsg = sendMessages($session, $alias, $message, array($recipient)); // This is to send English/alphanumeric messages;
//=========== Close the session ============================//
        closeSession($session);
        return $sendmsg;
    }

}
