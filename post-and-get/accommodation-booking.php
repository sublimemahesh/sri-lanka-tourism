<?php

include_once(dirname(__FILE__) . '/../class/include.php');
$VALID = new Validator();
if (isset($_POST['book'])) {

    $date = $_POST["date_time_booked"];
    $visitor = $_POST["visitor"];
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $accommodation = $_POST["accommodation"];
    $total = $_POST["total"];


    $ROOM_BOOKING = new RoomBooking(NULL);

    $ROOM_BOOKING->booking_date = $date;
    $ROOM_BOOKING->visitor = $visitor;
    $ROOM_BOOKING->checkin = $checkin;
    $ROOM_BOOKING->checkout = $checkout;
    $ROOM_BOOKING->accommodation_id = $accommodation;
    $ROOM_BOOKING->total = $total;

    $result = $ROOM_BOOKING->create();



    if ($result) {
        $tr = '';
        foreach ($_POST['roomB'] as $key => $room) {
            $roomId = $key;
            foreach ($room as $key => $roomPrices) {
                $bookingId = $result->id;

                if ($roomPrices != 0) {
                    $roomBasis = $key;
                    $numberOfRoom = explode("XXX", $roomPrices)[0];
                    $roomPrice = explode("XXX", $roomPrices)[1];
                    $ROOM_BOOKING_DETAILS = new BookingRoomDetails(NULL);

                    $ROOM = new Room($roomId);
                    $BASIS = new RoomBasis($roomBasis);

                    $tr1 = '<tr>
                        <td class="table-td1">' . $ROOM->name . '</td>
                        <td class="table-td1">' . $BASIS->name . '</td>
                        <td class="table-td1">' . $numberOfRoom . '</td> 
                         <td class="table-td1">' . $roomPrice . '</td>
                    </tr>';


                    $tr = $tr . $tr1;


                    $ROOM_BOOKING_DETAILS->booking_id = $bookingId;
                    $ROOM_BOOKING_DETAILS->room_id = $roomId;
                    $ROOM_BOOKING_DETAILS->basis_id = $roomBasis;
                    $ROOM_BOOKING_DETAILS->no_of_rooms = $numberOfRoom;
                    $ROOM_BOOKING_DETAILS->price = $roomPrice;
                    $SUCCESS = $ROOM_BOOKING_DETAILS->create();
                }
            }
        }

        if ($SUCCESS) {

            $VISITOR = new Visitor($visitor);
            $ACCOMMODATION = new Accommodation($_POST["accommodation"]);
            $MEMBER = new Member($ACCOMMODATION->member);

            $visitor_f_name = $VISITOR->first_name;
            $visitor_l_name = $VISITOR->second_name;
            $visitor_email = $VISITOR->email;
            $visitor_contactno = $VISITOR->contact_number;

            $member_email = $MEMBER->email;

            $accommodation_title = $ACCOMMODATION->name;

            $no_of_adults = $_POST["no_of_adult"];

            $no_of_children = $_POST["no_of_children"];
            $date_time_booked = $_POST["date_time_booked"];
            $message = $_POST["message"];


            $site_link = "http://" . $_SERVER['HTTP_HOST'];
            $website_name = 'www.srilankatourism.travel';
            $comany_name = 'Sri Lanka Tourism';
            $comConNumber = '+94 71 890 5282';
            $comEmail = 'keerthiyaa@gmail.com';
            date_default_timezone_set('Asia/Colombo');

            $todayis = date("l, F j, Y, g:i a");

            $subject = 'Sri Lanka Tourism - Transport Booking';
            $from = 'noreply@srilankatourism.travel'; // give from email address


            $headers = "From: " . $from . "\r\n";
            $headers .= "Reply-To: " . $from . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Srilanka Tourism Email Template</title>
        <style type="text/css">
            
            th {
                border-bottom: 1px solid #d0d0d0;
                padding: 15px 10px 10px 25px;
                text-align: left;
                margin: 0px;
            }
            td {
                padding: 10px 10px 5px 10px;
                text-align: left;
                margin: 0px;
            }
            ul {
                list-style-type: square;
                margin: 0px 20px 30px 200px;
            }
            li {
                padding: 5px;
            }
            img {
                width: 120px;
                margin: 0px auto;
            }
            .bdr {
                border-left: 1px solid #d0d0d0;
            }
            .bdr-top {
                border-top: 1px solid #d0d0d0;
            }
            .bb {
                font-weight: bold;
            }
            .right {
                text-align: right;
            }
           
            .topic {
                font-size:22px;
                text-align:center;
                color:#E7AB14;
            }
            .sal {
                margin-left:100px;
            }
            .desc {
                margin-left:150px;
                text-align:justify;
                margin-right:100px;
            }
            .bor {
                border:1px solid #000;
            }
            .booking-details {
                margin-left:20px;
                border: none !important;
                margin-right:20px;
            }
            .footer{
                width:100%;
                margin-top: 20px;
                background-color:#E7AB14;
                color: #fff;
                padding-top:20px;
                padding-bottom:30px;
            }
            .footer-tr {
                font-size: 15px;
                line-height: 2px;
            }
            .footer-td1 {
                width: 150px;
            }
            .footer-td2 {
                width: 35%;
            }
            @media (max-width: 480px) {
                ul { font-size: 14px; }
                td { font-size: 12px; }
                .table {margin-left:0px;}
                .desc {margin-left:20px; text-align:justify; margin-right:10px;}
                .sal {margin-left:10px;}
                .booking-details {margin-left:10px; border: none !important; margin-right:10px;}
                ul {list-style-type: square; margin: 0px 20px 30px 10px;}
                .footer-tr {font-size: 15px; line-height: 15px;}
                .footer-td1 { width: 0px;}
                .footer-td2 {width: 50%;}
                .table-td1 {width: 20%;}
            }

        </style>
    </head>

    <body bgcolor="#8d8e90">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
            <tr>
                <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                        <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr style="background-color: #c8d6d8;">
                                        <td width="40"></td>
                                        <td width="144">
                                            <a href= "' . $site_link . '" target="_blank"> '
                    . '<img src="' . $site_link . '/images/booking/logo.png" border="0" alt=""/>
                                            </a>
                                        </td>
                                        <td width="393">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td height="46" align="right" valign="middle">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="67%" align="right">
                                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:16px; " >
                                                                        <a href= "' . $site_link . '" style="color:#224ee4; text-decoration:none; text-transform: uppercase;">
                                                                            <h4>www.srilankatourism.travel</h4>
                                                                        </a>
                                                                    </font>
                                                                </td>
                                                                <td width="4%">&nbsp;</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table></td>
                        </tr>
                        <tr>
                            <td align="center" valign="middle">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="2%">&nbsp;</td>
                                        <td width="96%" align="center" style="border-bottom:1px solid #000000" height="50">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#0B0B0E; font-size:18px; " >
                                                <h4>Transport Booking</h4>
                                            </font>
                                        </td>
                                        <td width="2%">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="5%">&nbsp;</td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; ">
                                                Hi ' . $visitor_f_name . ',
                                                <br /><br />
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="5%">&nbsp;</td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                Thank you for visiting ' . $website_name . ' and making an online booking with ' . $accommodation_title . ' One of representative will be contact you shortly. 
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="5%">&nbsp;<br /><br /></td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                The details of your Accommodation Booking are shown below.
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                </table>
                               
 <table class="booking-details">
           
            <tr>
                <td colspan="2"><strong><u>Customer Details</u></strong></td>
            </tr>
            <tr>
                <td>Customer name</td>
                <td>: ' . $visitor_f_name . ' ' . $visitor_l_name . '</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: ' . $visitor_email . '</td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td>: ' . $visitor_contactno . '</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"><strong><u>Accommodation Details</u></strong></td>
            </tr>
            <tr>
                <td>Accommodation name</td>
                <td>: ' . $ACCOMMODATION->name . '</td>
            </tr>
            <tr>
                <td>Hotel Address</td>
                <td>: <a href="" style="text-decoration:none;color: #000;">' . $ACCOMMODATION->address . '</a></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>: ' . $ACCOMMODATION->phone . '</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: ' . $ACCOMMODATION->email . '</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"><strong><u>Booking Summary</u></strong></td>
            </tr>
            <tr>
                <td>Arrival date</td>
                <td>: ' . $checkin . '</td>
            </tr>
            <tr>
                <td>Departure date</td>
                <td>: ' . $checkout . '</td>
            </tr>
        </table>
        <br>
   <table class="table" style="border: 1px solid #d0d0d0;">
            <tr>
                <th class="table-td1">Room</th>
                <th class="table-td1">Room Basis</th>
                <th class="table-td1">Number of rooms</th> 
                <th class="table-td1">Price (LKR)</th>
            </tr>' . $tr . '
        </table>
        <br>
        <table>
         <tr>
                <td colspan="2"><strong>Total Price : LKR ' . $total . '</strong></td>
            </tr>
        </table>
<br>
                             

                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="5%">&nbsp;</td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:11px; " >
                                                <h4>Message</h4>
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="5%">&nbsp;</td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                ' . $message . '
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><img src="' . $site_link . '/images/booking/bottom_bar.jpg" width="598" height="7" style="display:block" border="0" alt=""/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="2%" align="center">&nbsp;</td>
                                        <td width="29%" align="center">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                <strong>Phone No : <br/> ' . $comConNumber . ' </strong>
                                            </font>
                                        </td>
                                        <td width="2%" align="center">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                <strong>|</strong>
                                            </font>
                                        </td>
                                        <td width="30%" align="center">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                <strong>Website : <br/> ' . $website_name . '  </strong>
                                            </font>
                                        </td>
                                        <td width="2%" align="center">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                <strong>|</strong>
                                            </font>
                                        </td>
                                        <td width="25%" align="center">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:8px; " >
                                                <strong>E-mail :  <br/> ' . $comEmail . '</strong>
                                            </font>
                                        </td> 
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="3%" align="center">&nbsp;</td>
                                        <td width="28%" align="center"><font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:9px; " > © ' . date('Y') . ' Copyright ' . $comany_name . '</font> </td>
                                        <td width="10%" align="center"></td>
                                        <td width="3%" align="center"></td> 
                                        <td width="30%" align="right">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:9px; " > 
                                                <a href="http://www.sublime.lk/">
                                                    web solution by: Sublime Holdings</a>
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table></td>
            </tr>
        </table>
    </body>
</html>';
            if (mail($visitor_email, $subject, $html, $headers) &&
                    mail($comEmail, $subject, $html, $headers)) {
                if (!empty($member_email)) {
                    mail($member_email, $subject, $html, $headers);
                }
                $ACCOMMODATION = new Accommodation($result->accommodation_id);
                $MEMBER = new Member($ACCOMMODATION->member);
                $phoneno = $MEMBER->contact_number;
                $message = "Your have a new accommodation booking in Sri Lanka Tourism";
                $sendmsg = Helper::sendSMS($phoneno, $message);
                $VALID->addError("Booking was completed successfully. Please check your email", 'success');
                $_SESSION['ERRORS'] = $VALID->errors();
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                $VALID->addError("There was an error.please try again !", 'danger');
                $_SESSION['ERRORS'] = $VALID->errors();
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}


