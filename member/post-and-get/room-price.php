<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['save'])) {

    $ROOMPRICE = new RoomPrice(NULL);
    $VALID = new Validator();

    foreach ($_POST["basis"] as $basis => $price) {

        if (!empty($price)) {
            $ROOMPRICE = new RoomPrice(NULL);
            $ROOMPRICE->room = $_POST['room'];
            $ROOMPRICE->basis = $basis;
            $ROOMPRICE->start = $_POST['start'];
            $ROOMPRICE->end = $_POST['start'];
            $ROOMPRICE->price = $price;

            $VALID->check($ROOMPRICE, [
                'room' => ['required' => TRUE],
                'start' => ['required' => TRUE],
                'end' => ['required' => TRUE]
            ]);

            if ($VALID->passed()) {
                $ROOMPRICE->create();

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

   

}