<?php

include_once(dirname(__FILE__) . '/../class/include.php');

if (isset($_POST['book'])) {


    $TRANSPORT_RATE = new TransportRates($_POST['transport_rate']);
    $TRANSPORT = new Transports($TRANSPORT_RATE->transport_id);
    $MEMBER = new Member($TRANSPORT->member);
    $VISITOR = new Visitor($_POST['visitor']);
    $CONDITION = new VehicleCondition($TRANSPORT->condition);
    $TYPE = new VehicleType($TRANSPORT->vehicle_type);
    $FUEL_TYPE = new FuelType($TRANSPORT->fuel_type);
    $CITY_FROM = new City($TRANSPORT_RATE->location_from);
    $CITY_TO = new City($TRANSPORT_RATE->location_to);

    $TRANSPORT_BOOKING = new TransportBooking(NULL);

    $VALID = new Validator();

    $TRANSPORT_BOOKING->visitor = $_POST['visitor'];
    $TRANSPORT_BOOKING->transport_rate = $_POST['transport_rate'];
    $TRANSPORT_BOOKING->date = $_POST['date'];
    $TRANSPORT_BOOKING->time = $_POST['time'];
    $TRANSPORT_BOOKING->no_of_passengers = $_POST['no_of_passengers'];
    $TRANSPORT_BOOKING->no_of_baggage = $_POST['no_of_baggage'];
    $TRANSPORT_BOOKING->date_time_booked = $_POST['date_time_booked'];
    $TRANSPORT_BOOKING->message = $_POST['message'];

    $VALID->check($TRANSPORT_BOOKING, [
        'date' => ['required' => TRUE],
        'time' => ['required' => TRUE],
        'no_of_passengers' => ['required' => TRUE]
    ]);


    if ($VALID->passed()) {
        $RESULT = $TRANSPORT_BOOKING->create();
        
        if (!isset($_SESSION)) {
            session_start();
        }

        if ($RESULT) {

            $visitor_f_name = $VISITOR->first_name;
            $visitor_l_name = $VISITOR->second_name;
            $visitor_email = $VISITOR->email;
            $visitor_contactno = $VISITOR->contact_number;

            $transport_title = $TRANSPORT->title;
            $transport_registerd_year = $TRANSPORT->registered_year;
            $transport_condition = $CONDITION->name;
            $transport_fuel = $FUEL_TYPE->name;
            $transport_type = $TYPE->name;

            $picking_up = $CITY_FROM->name;
            $dropping_off = $CITY_TO->name;

            $no_of_passangers = $RESULT->no_of_passengers;
            $no_of_baggage = $RESULT->no_of_baggage;
            $date_time_booked = $RESULT->date_time_booked;
            $booking_date = $RESULT->date;
            $booking_time = $RESULT->time;
            $message = $RESULT->message;

            $member_email = $MEMBER->email;

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
                                                Thank you for visiting ' . $website_name . ' web site and contacting us. You have been chosen to travel from ' . $picking_up . ' to ' . $dropping_off . ' on ' . $booking_date . ' at ' . $booking_time . '. One of representative will be contact you shortly. 
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="5%">&nbsp;<br /><br /></td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                The details of your Transport Booking are shown below.
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="2%">&nbsp;</td>
                                        <td width="96%" style="border-top:1px solid #000000" >

                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:14px; " >
                                                <h4>&nbsp;&nbsp;&nbsp;Visitor Details</h4>
                                            </font>
                                            <ul>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Name : ' . $visitor_f_name . '&nbsp;' . $visitor_l_name . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Email : ' . $visitor_email . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Contact Number : ' . $visitor_contactno . '
                                                    </font>
                                                </li>
                                            </ul>
                                        </td>
                                        <td width="2%">&nbsp;</td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="2%">&nbsp;</td>
                                        <td width="96%" style="border-top:1px solid #000000" >

                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:14px; " >
                                                <h4>&nbsp;&nbsp;&nbsp;Booking Details</h4>
                                            </font>
                                            <ul>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Title : ' . $transport_title . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Condition : ' . $transport_condition . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Vehicle Type : ' . $transport_type . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Registerd Year : ' . $transport_registerd_year . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Fuel Type : ' . $transport_fuel . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Number of Passengers : ' . $no_of_passangers . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Number of Baggages : ' . $no_of_baggage . '
                                                    </font>
                                                </li>
                                            </ul>
                                        </td>
                                        <td width="2%">&nbsp;</td>
                                    </tr>
                                </table>
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

                $RATE = new TransportRates($RESULT->transport_rate);
                $TRANSPORT = new Transports($RATE->transport_id);
                $MEMBER = new Member($TRANSPORT->member);
                $phoneno = $MEMBER->contact_number;
                $message = "Your have a new transport booking in Sri Lanka Tourism";
                $sendmsg = Helper::sendSMS($phoneno, $message);
                
                $VALID->addError("Booking was completed successfully.please check your email", 'success');
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


if (isset($_POST['book-rent-a-car'])) {

    $TRANSPORT = new Transports($_POST['transport']);
    $MEMBER = new Member($TRANSPORT->member);
    $VISITOR = new Visitor($_POST['visitor']);
    $CONDITION = new VehicleCondition($TRANSPORT->condition);
    $TYPE = new VehicleType($TRANSPORT->vehicle_type);
    $FUEL_TYPE = new FuelType($TRANSPORT->fuel_type);



    $TRANSPORT_BOOKING = new RentACarBooking(NULL);

    $VALID = new Validator();

    $TRANSPORT_BOOKING->visitor = $_POST['visitor'];
    $TRANSPORT_BOOKING->transport = $_POST['transport'];
    $TRANSPORT_BOOKING->date = $_POST['date'];
    $TRANSPORT_BOOKING->time = $_POST['time'];
    $TRANSPORT_BOOKING->no_of_passengers = $_POST['no_of_passengers'];
    $TRANSPORT_BOOKING->no_of_baggage = $_POST['no_of_baggage'];
    $TRANSPORT_BOOKING->date_time_booked = $_POST['date_time_booked'];
    $TRANSPORT_BOOKING->message = $_POST['message'];

    $VALID->check($TRANSPORT_BOOKING, [
        'date' => ['required' => TRUE],
        'time' => ['required' => TRUE],
        'no_of_passengers' => ['required' => TRUE],
        'no_of_baggage' => ['required' => TRUE]
    ]);


    if ($VALID->passed()) {
        $RESULT = $TRANSPORT_BOOKING->create();

        if (!isset($_SESSION)) {
            session_start();
        }


        if ($RESULT) {

            $visitor_f_name = $VISITOR->first_name;
            $visitor_l_name = $VISITOR->second_name;
            $visitor_email = $VISITOR->email;
            $visitor_contactno = $VISITOR->contact_number;

            $transport_title = $TRANSPORT->title;
            $transport_registerd_year = $TRANSPORT->registered_year;
            $transport_condition = $CONDITION->name;
            $transport_fuel = $FUEL_TYPE->name;
            $transport_type = $TYPE->name;


            $no_of_passangers = $RESULT->no_of_passengers;
            $no_of_baggage = $RESULT->no_of_baggage;
            $date_time_booked = $RESULT->date_time_booked;
            $booking_date = $RESULT->date;
            $booking_time = $RESULT->time;
            $message = $RESULT->message;

            $member_email = $MEMBER->email;

            $site_link = "http://" . $_SERVER['HTTP_HOST'];
            $website_name = 'www.srilankatourism.travel';
            $comany_name = 'Sri Lanka Tourism';
            $comConNumber = '09137347559';
            $comEmail = 'dinudhanusha@gmail.com';
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
                                                 Thank you for visiting ' . $website_name . ' and making an online booking with ' . $transport_title . ' .One of representative will be contact you shortly. 
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="5%">&nbsp;<br /><br /></td>
                                        <td width="90%" valign="middle">
                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                The details of your Transport Booking are shown below.
                                            </font>
                                        </td>
                                        <td width="5%">&nbsp;</td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="2%">&nbsp;</td>
                                        <td width="96%" style="border-top:1px solid #000000" >

                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:14px; " >
                                                <h4>&nbsp;&nbsp;&nbsp;Visitor Details</h4>
                                            </font>
                                            <ul>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Name : ' . $visitor_f_name . '&nbsp;' . $visitor_l_name . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Email : ' . $visitor_email . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Contact Number : ' . $visitor_contactno . '
                                                    </font>
                                                </li>
                                            </ul>
                                        </td>
                                        <td width="2%">&nbsp;</td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="2%">&nbsp;</td>
                                        <td width="96%" style="border-top:1px solid #000000" >

                                            <font style="font-family: Verdana, Geneva, sans-serif; color:#1400FF; font-size:14px; " >
                                                <h4>&nbsp;&nbsp;&nbsp;Booking Details</h4>
                                            </font>
                                            <ul>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Title : ' . $transport_title . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Condition : ' . $transport_condition . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Vehicle Type : ' . $transport_type . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Registerd Year : ' . $transport_registerd_year . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Fuel Type : ' . $transport_fuel . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Number of Passengers : ' . $no_of_passangers . '
                                                    </font>
                                                </li>
                                                <li>
                                                    <font style="font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:14px; " >
                                                        Number of Baggages : ' . $no_of_baggage . '
                                                    </font>
                                                </li>
                                            </ul>
                                        </td>
                                        <td width="2%">&nbsp;</td>
                                    </tr>
                                </table>
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
                
                $TRANSPORT = new Transport($RESULT->transport);
                $MEMBER = new Member($TRANSPORT->member);
                $phoneno = $MEMBER->contact_number;
                $message = "Your have a new rent a car booking in Sri Lanka Tourism";
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
