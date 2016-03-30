<!-- Admin Login -->
    <section id="admin-login" class="section text-center">
        <div class="container">
            <div class="hidden-md hidden-lg"><hr></div>
            <h2 class="section-title">Admin Login</h2>
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
                    <?php $attributes = array('class' => 'contact-form  wow fadeInLeft');
                        echo form_open('login/admin', $attributes);?>
                        <div class="form-group">
                            <label for="registration">Administrator ID</label>
                            <input type="text" name="registration" id="registration" required class="form-control" placeholder="Administrator ID">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" required class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="pull-left send-button button">Login</button>
                    </form>
                </div>
            </div>
        <!-- END CONTACT FORM -->
            </div>
    </section>
    <!-- END ADMIN LOGIN -->