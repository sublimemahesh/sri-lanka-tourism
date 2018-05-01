<?php
$OTHER_TRANSPORT = Transports::all();
foreach ($OTHER_TRANSPORT as $other_transports) {
    ?>
    <div class="car-pack col-md-12">
        <div class="col-md-4 hover01">
            <?php
            foreach ($TRANSPORTS_PHOTO->getTransportPhotosById($other_transports['id']) as $key => $TRANSPORTS_P) {
                if ($key == 1) {
                    break;
                }
                ?>
                <figure><img src="upload/transport/thumb/<?php echo $TRANSPORTS_P['image_name']; ?>" alt="" class="img-responsive" style="width: 100px; height: 75px;"/></figure>
                <?php
            }
            ?>
        </div>
        <div class="col-md-8">
            <div class="transports-desc">
                <?php echo substr($other_transports ['description'], 0, 75) . '...'; ?>
            </div>
            <div class="t-more text-center">
                <a href="transportation-view.php?id=<?php echo $other_transports['id']; ?>" class="btn btn-sm blue">
                    <span class="fa fa-eye"></span>View
                </a>
            </div>


        </div>
    </div>

    <?php
}
?>