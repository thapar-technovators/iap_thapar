    <!-- Mentor Login -->
    <section id="mentor-login" class="section text-center">
        <div class="container">
            <div class="hidden-md hidden-lg"><hr></div>
            <h2 class="section-title"><?php echo $title?></h2>
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
            <div class="row">

                <!-- CONTACT FORM -->
                <div class="col-md-8 col-md-offset-2 text-left wow" data-wow-duration="1s">
                    <div class='success'>You have logged in successfully </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- END MENTOR LOGIN -->
