<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
<!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    	<div class="page-header pull-left">
    		<div class="page-title">
                Change Password
            </div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
        	<li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo base_url(); ?>index.php/faculty">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        	<li class="active">&nbsp;<a href="<?php echo base_url(); ?>index.php/faculty/city_preferences">City Preferences</a></li>
        </ol>
        <div class="clearfix">
        </div>
    </div>
<!--END TITLE & BREADCRUMB PAGE-->                
<!--BEGIN CONTENT-->
<div class="page-content">
	<div id="tab-general">
		<div class="row mb1">
    <?php
    if(isset($success) && $success=1) {
      echo "<div class='alert alert-success'><strong>Password Changed!</strong></div>";
    } elseif (isset($success) && $success=0 ) {
      echo "<div class='alert alert-danger'><strong>Password not updated. Please contact administrator.</strong></div>";
    }
    elseif (isset($success) && $success=2) {
      echo "<div class='alert alert-danger'><strong>Incorrect email.</strong></div>";
    }
    elseif (isset($success) && $success=3) {
      echo "<div class='alert alert-success'><strong>Please check your email for the Access Token.</strong></div>";
    }
    ?>
			<div class="col-lg-8">
										<div class="panel panel-orange">
                                            <div class="panel-heading">
                                                Change Password</div>
                                            <div class="panel-body pan">
                                            <form action="<?php echo base_url();?>index.php/faculty/change_password" method="post">
                                            <div class="form-body pal">
                                            <?php if (!isset($success) || (isset($success) && $success!=3)) { ?>
                                            <div class="form-group">
                                              <div class="input-icon right">
                                                <input id="inputSubject" type="text" name="email" placeholder="Please type your registered E-mail ID to confirm" class="form-control" />
                                              </div>
                                            </div>
                                            <?php } 
                                            else { ?>
                                            <div class="form-group">
                                              <div class="input-icon right">
                                                <input id="inputSubject" type="text" name="otp" placeholder="Please type the Access Token here" class="form-control" />
                                              </div>
                                            </div>
                                            <?php }; ?>
                                            <div class="form-actions text-right pal">
                                                <button type="submit" class="btn btn-primary">Send Email</button>
                                            </div>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
</div></div>
	</div>
</div>
<!--END CONTENT-->