<html>
    <head>
        <title>' . "Coralsands Hotel - Repay Payment" . '</title>
        <style type="text/css">
            table {
                border: 1px solid #d0d0d0;
            }
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
            .table {
                margin-left:150px;
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
                margin-left:150px;
                border: none !important;
                margin-right:100px;
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
    <body class="bor">
        <div style="width: 100%; text-align: center; font-size: 20px; margin: 10px 0px 30px 0px;">
            <!--            <b style="font-size: 25px; text-decoration: underline;">Coral Sands Hotel</b><br/>-->
            <img src="http://' . $site . '/images/logo/logo.png" alt="Coral Sands"/><br/>
            <span><a href="" style="text-decoration:none;color: #000;">No.326, Galle Rd, Hikkaduwa, Sri Lanka</a></span><br/>
            <span>Email: coralsands@stmail&#173;.lk</span><br/>
            <span>Phone: +94 91 227 7513 / +94 91 227 7436</span>
        </div>
        <h2 class="topic">Booking Confirmation | Coral Sands Hotel - Hikkaduwa | #1001' . $bookingid . '</h2>
        <h4 class="sal"><strong>Dear ' . $BOOKING->name . '</strong></h4>
        <div class="desc">
            <p>Thank you for making an online booking with Coral Sands Hotel. Your booking reference is :  #1001' . $bookingid . ' Your booking is subject to the terms & conditions listed on the website. This is your booking confirmation and is not valid as an accommodation voucher.</p>
            <p>A separate accommodation voucher has been issued and e-mailed to you with respect to this reservation. Please produce a copy on arrival.</p>
            <p>The holder of the Credit Card used to make the booking should be present at the time of check-in</p>
        </div>

        <table class="booking-details">
           
            <tr>
                <td colspan="2"><strong><u>Customer Details</u></strong></td>
            </tr>
            <tr>
                <td>Customer name</td>
                <td>: ' . $BOOKING->name . '</td>
            </tr>
            <tr>
                <td>Country</td>
                <td>: ' . $BOOKING->country . '</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: ' . $BOOKING->email . '</td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td>: ' . $BOOKING->contact . '</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"><strong><u>Accommodation Details</u></strong></td>
            </tr>
            <tr>
                <td>Hotel name</td>
                <td>: Coral Sands Hotel</td>
            </tr>
            <tr>
                <td>Hotel Address</td>
                <td>: <a href="" style="text-decoration:none;color: #000;">No.326, Galle Rd, Hikkaduwa, Sri Lanka</a></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>: +94 91 227 7513</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: coralsands@stmail&#173;.lk</td>
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
                <td>: ' . $BOOKING->checkin . '</td>
            </tr>
            <tr>
                <td>Departure date</td>
                <td>: ' . $BOOKING->checkout . '</td>
            </tr>
        </table>

        <br>
        <table class="table">
            <tr>
                <th class="table-td1">Rooms</th>
                <th class="table-td1">Room Type</th>
                <th class="table-td1">Meal Type</th> 
                <th class="table-td1">Room Rate (USD)</th>
            </tr>' . $tr . '
        </table>
     
        <table class="booking-details">
            <tr>
                <td colspan="2"><strong><u>Total Booking Cost</u></strong></td>
            </tr>
            <tr>
                <td>Total Accommodation Amount</td>
                <td>: US $ ' . number_format($totRoomPrice * $nights, 2) . '</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table class="footer">
            <tr>
                <td class="footer-td1"></td>
                <td colspan="2" style="font-size: 15px;"><strong>Thank You !</strong></td>
            </tr>
            <tr class="footer-tr">
                <td></td>
                <td class="footer-td2">Coral Sands Hotel</td>
                <td>Phone: +94 91 227 7513</td>
            </tr>
            <tr class="footer-tr">
                <td></td>
                <td><a href="" style="text-decoration:none;color: #fff;">No.326, Galle Rd, Hikkaduwa, Sri Lanka</a></td>
                <td>Email: coralsands@stmail&#173;.lk</td>
            </tr>

        </table>
    </body>
</html>'