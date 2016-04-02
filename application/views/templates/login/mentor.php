    <!-- Mentor Login -->
    <section id="mentor-login" class="section text-center">
        <div class="container">
            <div class="hidden-md hidden-lg"><hr></div>
            <h2 class="section-title">Mentor Login</h2>
            <div class="row">
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
                <!-- CONTACT FORM -->
                <div class="col-md-8 col-md-offset-2 text-left wow" data-wow-duration="1s">
                    <form action="<?php echo base_url();?>index.php/login/mentor ?>" method="post" class="contact-form  wow fadeInLeft">
                        <div class="form-group">
                            <label for="registration">Registration ID</label>
                            <input type="email" name="registration" id="registration" required class="form-control" placeholder="Registration ID">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" required class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="pull-left send-button button">Login</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 text-center wow" data-wow-duration="1s">
                        <a href="<?php echo base_url();?>index.php/register/mentor"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Click here to Register</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-center wow col-xs-12 " data-wow-duration="1s">
                        <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Forgot Password</a>
                </div>
                <!-- END CONTACT FORM -->
            </div>
        </div>
    </section>
    <!-- END MENTOR LOGIN -->
