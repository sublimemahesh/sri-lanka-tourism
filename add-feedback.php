<!-- line modal -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
<!--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
                <h3 class="modal-title" id="lineModalLabel">Visitor Feedback</h3>
            </div>
            <?php
            if (isset($_SESSION["login"])) {
                ?>
                <form  method="post" id="client-comment" action="post-and-get/feedback.php" enctype="multipart/form-data"> 
                    <div class="modal-body"> 

                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required/>
                            <input type="hidden" name="status" value="0" />
                            <span id="spantitle"></span>
                        </div> 
                        <div class="form-group">
                            <label for="name">Rate</label>
                            <select name="rate" class="form-control" id="rate" placeholder="Enter rates" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select> 
                            <span id="spantitle"></span>
                        </div> 

                        <div class="form-group">
                            <label for="description">Message</label>
                            <textarea id="description" name="message" class="form-control" rows="5" placeholder="Enter your Message" required> </textarea>
                            <span id="spandescription" ></span>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6 col-xs-12">
                                <br> 
                                <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter the security code >> " required>
                                <span id="capspan" ></span> 
                            </div>   
                            <div class="col-sm-6 col-xs-12"> 
                                <?php include("./visitor-feedback/captchacode-widget.php"); ?> 
                            </div>   
                            <!--                        <div class="col-xs-12 col-sm-12">
                                                        <div class="col-sm-4">
                                                            <div class="div-check" >
                                                                <img src="contact-form/img/checking.gif" id="checking"/>
                                                            </div>
                                                        </div>
                                                    </div>-->
                        </div> 
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default btn-position-rel" data-dismiss="modal">Close</button>  
                        <input type="hidden" name="visitor" value="<?php echo $_SESSION['id']; ?>">
                        <input type="hidden" name="transport" value="<?php echo $id ?>">
                        <button type="submit" class="btn btn-default btn-position-rel" name="create" id="create">Save Comment</button>
                        <input type="hidden" name="save" value="TRUE">
                    </div>
                </form>
                <?php
            } else {
                ?>
                <h4>Please login or create an account to continue this process.</h4>
                <div class="row">
                    <a href="visitor-register.php?back=true" class="col-md-offset-4 btn btn-default btn-position-rel">Register</a>
                    <a href="visitor-login.php?back=true" class="btn btn-default btn-position-rel">Login</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<div id="myModaltour" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
<!--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
                <h3 class="modal-title" id="lineModalLabel">Visitor Feedback</h3>
            </div>
            <?php
            if (isset($_SESSION["login"])) {
                ?>
                <form  method="post" id="client-comment" action="post-and-get/feedback.php" enctype="multipart/form-data"> 
                    <div class="modal-body"> 

                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required/>
                            <input type="hidden" name="status" value="0" />
                            <span id="spantitle"></span>
                        </div> 
                        <div class="form-group">
                            <label for="name">Rate</label>
                            <select name="rate" class="form-control" id="rate" placeholder="Enter rates" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <span id="spantitle"></span>
                        </div> 

                        <div class="form-group">
                            <label for="description">Message</label>
                            <textarea id="description" name="message" class="form-control" rows="5" placeholder="Enter your Message" required> </textarea>
                            <span id="spandescription" ></span>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6 col-xs-12">
                                <br> 
                                <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter the security code >> " required>
                                <span id="capspan" ></span> 
                            </div>   
                            <div class="col-sm-6 col-xs-12"> 
                                <?php include("./visitor-feedback/captchacode-widget.php"); ?> 
                            </div>   
                            <!--                        <div class="col-xs-12 col-sm-12">
                                                        <div class="col-sm-4">
                                                            <div class="div-check" >
                                                                <img src="contact-form/img/checking.gif" id="checking"/>
                                                            </div>
                                                        </div>
                                                    </div>-->
                        </div> 
                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-default btn-position-rel" data-dismiss="modal">Close</button>  
                        <input type="hidden" name="visitor" value="<?php echo $_SESSION['id']; ?>">
                        <input type="hidden" name="tourpackage" value="<?php echo $tourid; ?>">
                        <button type="submit" class="btn btn-default btn-position-rel" name="create" id="create">Save Comment</button>
                        <input type="hidden" name="save" value="TRUE">

                    </div>

                </form>
                <?php
            } else {
                ?>
                <h4>Please login or create an account to continue this process.</h4>
                <div class="row">
                    <a href="visitor-register.php?back=true" class="col-md-offset-4 btn btn-default btn-position-rel">Register</a>
                    <a href="visitor-login.php?back=true" class="btn btn-default btn-position-rel">Login</a>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
</div>

<div id="myModalaccommodation" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
<!--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
                <h3 class="modal-title" id="lineModalLabel">Visitor Feedback</h3>
            </div>
            <form  method="post" id="client-comment" action="post-and-get/feedback.php" enctype="multipart/form-data"> 
                <div class="modal-body"> 

                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required/>
                        <input type="hidden" name="status" value="0" />
                        <span id="spantitle"></span>
                    </div> 
                    <div class="form-group">
                        <label for="name">Rate</label>
                        <select name="rate" class="form-control" id="rate" placeholder="Enter rates" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <span id="spantitle"></span>
                    </div> 

                    <div class="form-group">
                        <label for="description">Message</label>
                        <textarea id="description" name="message" class="form-control" rows="5" placeholder="Enter your Message" required> </textarea>
                        <span id="spandescription" ></span>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6 col-xs-12">
                            <br> 
                            <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter the security code >> " required>
                            <span id="capspan" ></span> 
                        </div>   
                        <div class="col-sm-6 col-xs-12"> 
                            <?php include("./visitor-feedback/captchacode-widget.php"); ?> 
                        </div>   
                        <!--                        <div class="col-xs-12 col-sm-12">
                                                    <div class="col-sm-4">
                                                        <div class="div-check" >
                                                            <img src="contact-form/img/checking.gif" id="checking"/>
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div> 
                </div>

                <div class="modal-footer">
                    <?php
                    if (isset($_SESSION["login"])) {
                        ?>
                        <button type="submit" class="btn btn-default btn-position-rel" data-dismiss="modal">Close</button>  
                        <input type="hidden" name="visitor" value="<?php echo $_SESSION['id']; ?>">
                        <input type="hidden" name="accommodation" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-default btn-position-rel" name="create" id="create">Save Comment</button>
                        <input type="hidden" name="save" value="TRUE">
                        <?php
                    } else {
                        echo 'You must create an visiter account to continue this process';
                    }
                    ?>
                </div>

            </form>

        </div>
    </div>
</div>

<div id="myModalarticle" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
<!--                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>-->
                <h3 class="modal-title" id="lineModalLabel">Visitor Feedback</h3>
            </div>
            <?php
            if (isset($_SESSION["login"])) {
                ?>
                <form  method="post" id="client-comment" action="post-and-get/feedback.php" enctype="multipart/form-data"> 
                    <div class="modal-body"> 

                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required/>
                            <input type="hidden" name="status" value="0" />
                            <span id="spantitle"></span>
                        </div> 
                        <div class="form-group">
                            <label for="name">Rate</label>
                            <select name="rate" class="form-control" id="rate" placeholder="Enter rates" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <span id="spantitle"></span>
                        </div> 

                        <div class="form-group">
                            <label for="description">Message</label>
                            <textarea id="description" name="message" class="form-control" rows="5" placeholder="Enter your Message" required> </textarea>
                            <span id="spandescription" ></span>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6 col-xs-12">
                                <br> 
                                <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter the security code >> " required>
                                <span id="capspan" ></span> 
                            </div>   
                            <div class="col-sm-6 col-xs-12"> 
                                <?php include("./visitor-feedback/captchacode-widget.php"); ?> 
                            </div>   
                            <!--                        <div class="col-xs-12 col-sm-12">
                                                        <div class="col-sm-4">
                                                            <div class="div-check" >
                                                                <img src="contact-form/img/checking.gif" id="checking"/>
                                                            </div>
                                                        </div>
                                                    </div>-->
                        </div> 
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-default btn-position-rel" data-dismiss="modal">Close</button>  
                        <input type="hidden" name="visitor" value="<?php echo $_SESSION['id']; ?>">
                        <input type="hidden" name="article" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-default btn-position-rel" name="create" id="create">Save Comment</button>
                        <input type="hidden" name="save" value="TRUE">

                    </div>
                </form>
                <?php
            } else {
                ?>
                <h4>Please login or create an account to continue this process.</h4>
                <div class="row">
                    <a href="visitor-register.php?back=true" class="col-md-offset-4 btn btn-default btn-position-rel">Register</a>
                    <a href="visitor-login.php?back=true" class="btn btn-default btn-position-rel">Login</a>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
</div>