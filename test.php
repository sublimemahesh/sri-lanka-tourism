<?php
foreach ($ROOM_BASIS as $room_basis) {
    $initial = 0;
    $date = date("Y-m-d");
    $bookedData = $ROOM_AVILABILITY->getByDateAndRoom($date, $ROOM->id);
    $booked = (int) $bookedData['booked_rooms'];
    $totalbooked = $initial + $booked;
    $totalRooms = (int) $ACCOMMODATION->number_of_room;
    $available = $totalRooms - $totalbooked;

    $price = $ROOM_PRICE_OBJ->getPrice($room_basis['id'], $date);
    ?>

    <div class="col-sm-6 col-xs-6 form-group">
        <label><?php echo $room_basis['name']; ?></label>
        <input type="hidden" id="<?php echo $room_basis['id']; ?>-available">
        <small class="hidden"> - <span id="<?php echo $ACCOMMODATION->id; ?>-available"><?php echo $available; ?></span> Rooms Available</small>
        <select id="<?php echo $ACCOMMODATION->id . '-' . $room_basis['id']; ?>" basisname="<?php echo $room_basis['name']; ?>" rbasis="<?php echo $room_basis['id']; ?>" name="<?php echo $ACCOMMODATION->id . '-' . $room_basis['id']; ?>-price" class="form-control prices-list">
            <option selected="" value="0" each-price="0" id="price">- Please Select -</option>
            <?php
            for ($i = 1; $i <= $available; $i++) {
                if ($i == 1) {
                    $rm = 'Room';
                } else {
                    $rm = 'Rooms';
                }
                $eachPrice = $price['price'] * $i;
                $eachPrice = number_format($eachPrice, 2, '.', '');
                echo '<option value="' . $i . '" each-price="' . $eachPrice . '">' . $i . ' ' . $rm . ' - US$ ' . $eachPrice . '</option>';
            }
            ?>
        </select>
    </div>
    <?php
}
?>