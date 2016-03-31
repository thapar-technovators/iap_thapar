    <!-- HOME -->
    <div id="home-area">
        <div class="overlay">
            <div class="container">
                <div class="row">

                    <!-- HOME CONTENT -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="home-content wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
                            <h1>Thapar University</h1>
                            <p>Industrial Training Panel for <strong>Thapar University</strong></p>
                            <a class="button home" href="#">Student Login</a>
                        </div>
                    </div>
                    <!-- END HOME CONTENT -->

                    <!-- HOME FEATURE IMAGE -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="home-feature pull-right center-block wow" data-wow-duration="1s" data-wow-delay="1s">
                            <img class="img-responsive" src="<?php echo base_url();?>assets/img/banner.png" alt="">
                        </div>
                    </div>
                    <!-- END HOME FEATURE IMAGE -->

                </div>
            </div>
        </div>
    </div>
    <!-- END HOME -->



    <!-- CONTACT US -->
    <section id="contact" class="section text-center">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <div class="row">

                <!-- CONTACT FORM -->
                <div class="col-md-7 col-md-offset-1 text-left wow fadeInLeft" data-wow-duration="1s">
                    <form action="#" method="post" class="contact-form  wow fadeInLeft">
                        <div class="form-group">
                            <input type="text" required class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" required class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea required class="form-control" rows="5" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="pull-left send-button button">Send Message</button>
                    </form>
                </div>
                <!-- END CONTACT FORM -->

                <!-- CONTACT INFO -->
                <div class="col-md-3">
                    <div class="contact-info text-left wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                        <h3>Get In Touch</h3>
                        <p><span><i class="fa fa-map-marker"></i></span> P.O. Box 32,Bhadson Road, Patiala</p>
                        <p><span><i class="fa fa-phone"></i></span> +91-175-2393021</p>
                        <p><span><i class="fa fa-envelope-o"></i></span> iapthapar@gmail.com</p>
                    </div>
                    <div class="business-hours text-left wow fadeInRight" data-wow-duration="1s" data-wow-delay=".6s">
                        <h3>IAP Coordinator</h3>
                        <p>iapthapar_coordinator@gmail.com</p>
                    </div>
                </div>
                <!-- END CONTACT INFO -->
            </div>
        </div>
    </section>
    <!-- END CONTACT US -->
    <div class="footer-content text-center">
        <p>Your IP Address: <?php echo $ip_address; //$ip_address and $user_agent not working after faculty log out function
        ?> accessing from <?php echo $user_agent; ?> is being monitored for Security Purposes.</p>
                        
    </div>