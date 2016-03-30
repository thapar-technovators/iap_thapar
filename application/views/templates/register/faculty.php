<!-- Faculty Register -->
    <section id="faculty-login" class="section text-center">
        <div class="container">
            <div class="hidden-md hidden-lg"><hr></div>
            <h2 class="section-title"><?php echo $title ?></h2>
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

                <?php $attributes = array('class' => 'contact-form  wow fadeInLeft');
                echo form_open('register/faculty', $attributes);?>

                        <div class="form-group">
                            <label for="registration">Registration ID<span style="color:red;">*</span></label>
                            <input type="number" name="registration" id="registration" required class="form-control" placeholder="Your Registration id (Eg. 101303034)">
                        </div>
                        <div class="form-group">
                            <label for="initials">Initials<span style="color:red;">*</span></label>
                            <select class="form-control" id="initials" name="initials">
                                <option value='Dr.'>Dr.</option>
                                <option value='Mr.'>Mr.</option>
                                <option value='Mrs.'>Mrs.</option>
                                <option value='Ms.'>Ms.</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Full Name<span style="color:red;">*</span></label>
                            <input type="text" name="name" id="name" required class="form-control" placeholder="Arush Nagpal">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation<span style="color:red;">*</span></label>
                            <select class="form-control" id="designation" name="designation">
                                <option value='Lecturer'>Lecturer</option>
                                <option value='Assistant Professor'>Assistant Professor</option>
                                <option value='Associate Professor'>Associate Professor</option>
                                <option value='Professor'>Professor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Contact Number<span style="color:red;">*</span></label>
                            <input type="number" autocomplete="off" name="phone" id="phone" required class="form-control" placeholder="9988776655 (10 digits. Please don't add country code)">
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID<span style="color:red;">*</span></label>
                            <input type="email" name="email" id="email" required class="form-control" placeholder="arush@gmail.com">
                        </div>
                        <button type="submit" class="pull-left send-button button">Register</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 text-center wow" data-wow-duration="1s">
                        <a href="<?php echo base_url();?>index.php/login/faculty"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Click here to Login</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-center wow col-xs-12 " data-wow-duration="1s">
                        <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Forgot Password</a>
                </div>
                <!-- END CONTACT FORM -->
            </div>
        </div>
    </section>
    <!-- END STUDENT LOGIN -->

<!---------- DATE INPUT FIX NOT WORKING IN FIREFOX------>

<!-- cdn for modernizr, if you haven't included it already -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
<!---------- END OF DATE INPUT FIX------>


    <!-------------------- JAVASCRIPT PHONE NUMBER VALIDATION CHECK PENDING  ------------------------>