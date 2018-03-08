<?php

include_once(dirname(__FILE__) . '/../../class/include.php');


if (isset($_POST['save-changes'])) {

    $ACCOMODATION_FACILITY_DETAILS = new AccommodationFacilityDetails(NULL);


    $result = $ACCOMODATION_FACILITY_DETAILS->getFacilitiesByAccommodationId($_POST['accommodation_id']);

    $ResultAccomodationID = $result['accommodation'];

    if ($ResultAccomodationID == $_POST['accommodation_id']) {

        $ACCOMODATION_FACILITY_DETAILS = new AccommodationFacilityDetails($result['id']);

        $ACCOMODATION_FACILITY_DETAILS->facility = implode(",", $_POST['facility']);


        $VALID = new Validator();
        $VALID->check($ACCOMODATION_FACILITY_DETAILS, [
            'facility' => ['required' => TRUE]
        ]);

        if ($VALID->passed()) {
            $ACCOMODATION_FACILITY_DETAILS->update();

            if (!isset($_SESSION)) {
                session_start();
            }
            $VALID->addError("Your changes saved successfully", 'success');
            $_SESSION['ERRORS'] = $VALID->errors();

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['ERRORS'] = $VALID->errors();

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } else {

        $ACCOMODATION_FACILITY_DETAILS->accommodation = mysql_real_escape_string($_POST['accommodation_id']);
        $ACCOMODATION_FACILITY_DETAILS->facility = implode(",", $_POST['facility']);

        $VALID = new Validator();
        $VALID->check($ACCOMODATION_FACILITY_DETAILS, [
            'accommodation' => ['required' => TRUE],
            'facility' => ['required' => TRUE],
        ]);

        if ($VALID->passed()) {
            $ACCOMODATION_FACILITY_DETAILS->create();

            if (!isset($_SESSION)) {
                session_start();
            }
            $VALID->addError("Your data was saved successfully", 'success');
            $_SESSION['ERRORS'] = $VALID->errors();

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['ERRORS'] = $VALID->errors();

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}