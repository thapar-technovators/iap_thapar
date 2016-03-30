    <!-- Faculty Login -->
    <section id="faculty-login" class="section text-center">
        <div class="container">
            <div class="hidden-md hidden-lg"><hr></div>
            <h2 class="section-title">Faculty Login</h2>
            <div class="row">
                <!-- CONTACT FORM -->
                <?php 
                if(isset($error))
                {
                foreach ($error as $error_item): ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $error_item;?>
                </div>
                <?php endforeach;
                } ?>
                <div class="col-md-8 col-md-offset-2 text-left wow" data-wow-duration="1s">
                    <form action="<?php echo base_url();?>index.php/login/faculty" method="post" class="contact-form  wow fadeInLeft">
                        <div class="form-group">
                            <label for="registration">Registration ID</label>
                            <div class="input-group">
                            <input type="email" name="registration" id="registration" required class="form-control" placeholder="Registration ID" aria-describedby="addon">
                            <span class="input-group-addon" id="addon">@thapar.edu</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" required class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="pull-left send-button button">Login</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 text-center wow" data-wow-duration="1s">
                        <a href="<?php echo base_url();?>index.php/register/faculty"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Click here to Register</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-center wow col-xs-12 " data-wow-duration="1s">
                        <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Forgot Password</a>
                </div>
                <!-- END CONTACT FORM -->
            </div>
        </div>
    </section>
    <!-- END FACULTY LOGIN -->