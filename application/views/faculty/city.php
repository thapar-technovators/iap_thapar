<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
<!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    	<div class="page-header pull-left">
    		<div class="page-title">
                City Preferences
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
			<div class="col-lg-8">
										<div class="panel panel-orange">
                                            <div class="panel-heading">
                                                City form</div>
                                            <div class="panel-body pan">
                                                <form action="#">
                                                <div class="form-body pal">
                                                <div class="form-group">
                                                <?php
                                                if(!isset($cities)) {
                                                	echo "City preferences unavailable.<br><br>";
                                                }
                                                ?>
                                                        <label for="pref1" class="control-label">
   	                                                        Preference 1
   	                                                    </label>
   	                                                    <select class="form-control" name="pref1">
   	                                                    	<?php
   	                                                    	foreach ($cities as $x) {
   	                                                    		echo "<option value='$x'>$x</option>";
   	                                                    	}
   	                                                    	?>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                        <label for="pref2" class="control-label">
   	                                                        Preference 2 
   	                                                    </label>
   	                                                    <select class="form-control" name="pref2">
                                                            <?php
   	                                                    	foreach ($cities as $x) {
   	                                                    		echo "<option value='$x'>$x</option>";
   	                                                    	}
   	                                                    	?>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                        <label for="pref3" class="control-label">
   	                                                        Preference 3
   	                                                    </label>
   	                                                    <select class="form-control" name="pref3">
                                                            <?php
   	                                                    	foreach ($cities as $x) {
   	                                                    		echo "<option value='$x'>$x</option>";
   	                                                    	}
   	                                                    	?>
                                                        </select>
                                                </div>
                                                </div>
                                                <div class="form-actions text-right pal">
                                                    <button type="submit" class="btn btn-primary">
                                                        Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
</div></div>
	</div>
</div>
<!--END CONTENT-->