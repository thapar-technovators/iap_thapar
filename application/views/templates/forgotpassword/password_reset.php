<!-- Student Login -->
    <section id="student-login" class="section text-center">
        <div class="container">
            <div class="hidden-md hidden-lg"><hr></div>
            <h2 class="section-title">Password Reset</h2>

<?php if(isset($activation)){?>
<div class="alert alert-info alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo "The activation link has expired!";
                    //echo $_POST['code_sent'];?>
                </div>

          <?php 
                if(isset($error))
                {
                foreach ($error as $error_item):
                ?>
                <div class=<?php if($error_item[1]==0) echo "'alert alert-info alert-danger'";
                else echo "'alert alert-info alert-success'";?> role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $error_item[0];
                    //echo $_POST['code_sent'];?>
                </div>
                <?php endforeach;
                } 
                ?>      
<?php }else{ ?>

            <div class="row">

            <?php 
                if(isset($error))
                {
                foreach ($error as $error_item):
                ?>
                <div class=<?php if($error_item[1]==0) echo "'alert alert-info alert-danger'";
                else echo "'alert alert-info alert-success'";?> role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $error_item[0];
                    //echo $_POST['code_sent'];?>
                </div>
                <?php endforeach;
                } 
                ?>


                <!-- CONTACT FORM -->
                <div class="col-md-8 col-md-offset-2 text-left wow" data-wow-duration="1s">
                <?php $attributes = array('class' => 'contact-form  wow fadeInLeft');
                echo form_open('forgotpassword/reset_student_password', $attributes);?>

                    <?php if($this->input->post()){?>

                        <div class="form-group">
                            <input type="hidden" name="code_sent" id="code_sent" required class="form-control" value="<?php echo $_POST['code_sent'];?>">
                        </div>


                        <div class="form-group">
                            <input type="hidden" name="email" id="email" required class="form-control" value="<?php echo $_POST['email'];?>">
                        </div>
                        <?php } else{?>

                        <div class="form-group">
                            <input type="hidden" name="code_sent" id="code_sent" required class="form-control" value="<?php echo $_GET['code']; ?>">
                        </div>


                        <div class="form-group">
                            <input type="hidden" name="email" id="email" required class="form-control" value="<?php echo $_GET['email'];?>">
                        </div>
                        <?php } ?>
                        
                        <div class="form-group">
                            <label for="activation">Activation code</label>
                            <input type="text" name="activation" id="activation" required class="form-control" placeholder="Activation Code">
                        </div>
                        <div class="form-group">
                            <label for="newpass">New Password</label>
                            <input type="text" name="newpass" id="newpass" required class="form-control" placeholder="New Password">
                        </div>
                         <div class="form-group">
                            <label for="confirmpass">Confirm Password</label>
                            <input type="confirmpass" name="confirmpass" id="confirmpass" required class="form-control" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="pull-left send-button button">Submit</button>
                    </form>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 text-center wow" data-wow-duration="1s">
                        <a href="<?php echo base_url();?>index.php/register/student"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Click here to Register</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-center wow col-xs-12 " data-wow-duration="1s">
                        <a href="<?php echo base_url();?>index.php/forgotpassword/student"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Forgot Password</a>
                </div>
                <!-- END CONTACT FORM -->
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- END STUDENT LOGIN -->