<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RentACar
 *
 * @author HP
 */
class RentACar {

    public $id;
    public $transport;
    public $price_per_day;
    public $price_per_excess_mileage;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`transport`,`price_per_day`,`price_per_excess_mileage` FROM `rent_a_car` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->transport = $result['transport'];
            $this->price_per_day = $result['price_per_day'];
            $this->price_per_excess_mileage = $result['price_per_excess_mileage'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `rent_a_car` (`transport`,`price_per_day`,`price_per_excess_mileage`) VALUES  ('"
                . $this->transport . "','"
                . $this->price_per_day . "','"
                . $this->price_per_excess_mileage . "')";

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

        $query = "UPDATE  `rent_a_car` SET "
                . "`transport` ='" . $this->transport . "', "
                . "`price_per_day` ='" . $this->price_per_day . "', "
                . "`price_per_excess_mileage` ='" . $this->price_per_excess_mileage . "' "
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

        $query = 'DELETE FROM `rent_a_car` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function TransportExsist($transport) {
     

            $query = "SELECT * FROM `rent_a_car` WHERE `transport`=" . $transport;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

          if($result){
               return $result;
          }else
          {
              return FALSE;
          }
           
        
    }

}
