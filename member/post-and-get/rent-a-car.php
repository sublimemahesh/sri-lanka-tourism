<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');






if (isset($_POST['update'])) {

    $RENT_A_CAR = New RentACar(NULL);
    $CHECK_OLD = $RENT_A_CAR->TransportExsist($_POST['id']);

    if ($CHECK_OLD == FALSE) {
        $RENT_A_CAR = New RentACar(NULL);
        $VALID = new Validator();

        $RENT_A_CAR->transport = $_POST['id'];
        $RENT_A_CAR->price_per_day = $_POST['price_p_day'];
        $RENT_A_CAR->price_per_excess_mileage = $_POST['price_p_extra'];

        $VALID->check($RENT_A_CAR, [
            'price_per_day' => ['required' => TRUE],
            'price_per_excess_mileage' => ['required' => TRUE]
        ]);

        if ($VALID->passed()) {
            $RENT_A_CAR->create();

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
    } else {
        $RENT_A_CAR = New RentACar($CHECK_OLD['id']);
        $VALID = new Validator();
        $RENT_A_CAR->transport = $_POST['id'];
        $RENT_A_CAR->price_per_day = $_POST['price_p_day'];
        $RENT_A_CAR->price_per_excess_mileage = $_POST['price_p_extra'];

        $VALID->check($RENT_A_CAR, [
            'price_per_day' => ['required' => TRUE],
            'price_per_excess_mileage' => ['required' => TRUE]
        ]);

        if ($VALID->passed()) {
            $RENT_A_CAR->update();

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
    }
}