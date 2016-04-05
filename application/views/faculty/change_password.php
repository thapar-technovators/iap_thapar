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
                unset($error);
                ?>
			<div class="col-lg-8">
										<div class="panel panel-orange">
                                            <div class="panel-heading">
                                                Change Password</div>
                                            <div class="panel-body pan">
                                            <form action="<?php echo base_url();?>index.php/faculty/change_password" method="post">
                                            <div class="form-body pal">
                                            <div class="form-group">
                                                        <label for="oldpass">Old Password</label>
                                                        <input type="text" name="oldpass" id="oldpass" required class="form-control" placeholder="Old password">
                                                    </div>
                        
                                                    <div class="form-group">
                                                        <label for="newpass">New Password</label>
                                                        <input type="text" name="newpass" id="newpass" required class="form-control" placeholder="New password">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="confirmpass">Confirm Password</label>
                                                        <input type="text" name="confirmpass" id="confirmpass" required class="form-control" placeholder="Confirm password">
                                                    </div>
                                            <div class="form-actions text-right pal">
                                                <button type="submit" class="btn btn-primary">Confirm</button>
                                            </div>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
</div></div>
	</div>
</div>
<!--END CONTENT-->