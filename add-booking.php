<!-- line modal -->

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
<!--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
                <h3 class="modal-title" id="lineModalLabel">Tour Booking</h3>
            </div>

            <h4>Please login or create an account to continue this process.</h4>
            <div class="row">
                <a href="visitor-register.php?back=tour&tourid=<?php echo $tourid; ?>" class="col-md-offset-4 btn btn-default btn-position-rel">Register</a>
                <a href="visitor-login.php?back=tour&tourid=<?php echo $tourid; ?>" class="btn btn-default btn-position-rel">Login</a>
            </div>

        </div>
    </div>
</div>

<div id="myModalTransport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
<!--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
                <h3 class="modal-title" id="lineModalLabel">Transport Booking</h3>
            </div>

            <h4>Please login or create an account to continue this process.</h4>
            <div class="row">
                <a href="visitor-register.php?back=transport&rate=<?php echo $rate; ?>" class="col-md-offset-4 btn btn-default btn-position-rel">Register</a>
                <a href="visitor-login.php?back=transport&rate=<?php echo $rate; ?>" class="btn btn-default btn-position-rel">Login</a>
            </div>

        </div>
    </div>
</div>
