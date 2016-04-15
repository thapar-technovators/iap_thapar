<!-- Student Login -->
    <section id="student-login" class="section text-center">
        <div class="container">
            <div class="hidden-md hidden-lg"><hr></div>
            <h2 class="section-title">Forgot Password | Mentor</h2>
            <div class="row">

                <!-- CONTACT FORM -->
                
                <?php 
                if(isset($error))
                {
                foreach ($error as $error_item):
                ?>
                <div class=<?php if($error_item[1]==0) echo "'alert alert-info alert-danger'";
                else echo "'alert alert-info alert-success'";?> role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $error_item[0];?>
                </div>
                <?php endforeach;
                }
                if(isset($success)){ ?>
                    <div class=  "alert alert-info alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo "The link and Activation code has been sent to your email ID to reset passowrd. Please check your mail.";?>
                </div>
             <?php   }?>

                <div class="col-md-8 col-md-offset-2 text-left wow" data-wow-duration="1s">
                    
                <?php $attributes = array('class' => 'contact-form  wow fadeInLeft');
                echo form_open('forgotpassword/mentor', $attributes);?>

                        <div class="form-group">
                            <label for="email">Email ID<span style="color:red;">*</span></label>
                            <input type="email" name="email" id="email" required class="form-control" placeholder="arush@gmail.com">
                        </div>
                        
                        <button type="submit" class="pull-left send-button button">Retrieve Password</button>
                    </form>
                </div>
            </div>
            <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12 text-center wow" data-wow-duration="1s">
                        <a href="<?php echo base_url();?>index.php/login/mentor"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Click here to Login</a>
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