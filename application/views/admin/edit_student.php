<?php
if(isset($message))
{?>
<div class="alert alert-info">
<?php echo $message?>
</div>
<?php
}?>
<div class="row">	
	<div class="col-md-6">
		<div class="panel panel-green">
	        <div class="panel-heading">
	            Personal Details</div>
	        <div class="panel-body pan">
	            <form action="#" method="post">
	            <div class="form-body pal">
	                <div class="form-group">
                        <label for="inputName" class="control-label">
                            Name</label>
                        <div class="input-icon right">
                            <i class="fa fa-user"></i>
                            <input id="inputName" type="text" name="name" value="<?php echo $student_detail[0]['name']?>" placeholder="" class="form-control" /></div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="control-label">
                            E-mail</label>
                        <div class="input-icon right">
                            <i class="fa fa-envelope"></i>
                            <input id="inputEmail" type="text" name="email" value="<?php echo $student_detail[0]['email']?>" placeholder="" class="form-control" /></div>
	                </div>
	                <div class="form-group">
	                    <label for="inputSubject" class="control-label">
	                        Branch</label>
	                    <div class="input-icon right">
	                        <i class="fa fa-tag"></i>
	                        <input id="inputSubject" type="text" name="branch" value="<?php echo $student_detail[0]['branch']?>" placeholder="" class="form-control" /></div>
	                </div>
	                <div class="form-group">
	                    <label for="inputSubject" class="control-label">
	                        Semester</label>
	                    <div class="input-icon right">
	                        <i class="fa fa-tag"></i>
	                        <input id="inputSubject" type="number" name="semester" value="<?php echo $student_detail[0]['semester']?>" placeholder="" class="form-control" /></div>
	                </div>
	                	                <div class="form-group">
	                    <label for="inputSubject" class="control-label">
	                        Phone</label>
	                    <div class="input-icon right">
	                        <i class="fa fa-tag"></i>
	                        <input id="inputSubject" type="number" name="phone" value="<?php echo $student_detail[0]['phone']?>" placeholder="" class="form-control" /></div>
	                </div>
	            </div>
	            <div class="form-actions text-right pal">
	                <button type="submit" class="btn btn-primary">
	                    Change</button>
	            </div>
	            </form>
	        </div>
    	</div>
    </div>
    <div class="col-md-6">
		<div class="panel panel-green">
	        <div class="panel-heading">
	            Training Details</div>
	        <div class="panel-body pan">
	        <?php if(isset($training_detail[0]['email'])){ ?>
	            <form action="<?php echo base_url();?>index.php/admin/edit_student/<?php echo $training_detail[0]['roll_number']?>" method="post">
	            <div class="form-body pal">
	                <div class="form-group">
                        <label for="inputEmail" class="control-label">
                            E-mail</label>
                        <div class="input-icon right">
                            <i class="fa fa-envelope"></i>
                            <input id="inputEmail" type="email" name="email" value="<?php echo $training_detail[0]['email']?>" placeholder="" class="form-control" /></div>
                    </div>
	                <div class="form-group">
	                    <label for="inputSubject" class="control-label">
	                        Company</label>
	                    <div class="input-icon right">
	                        <i class="fa fa-tag"></i>
	                        <input id="inputSubject" type="text" name="company" value="<?php echo $training_detail[0]['company']?>" placeholder="" class="form-control" /></div>
	                </div>
	                <div class="form-group">
	                    <label for="inputSubject" class="control-label">
	                        City</label>
	                    <div class="input-icon right">
	                        <i class="fa fa-tag"></i>
	                        <input id="inputSubject" type="text" name="city" value="<?php echo $training_detail[0]['city']?>" placeholder="" class="form-control" /></div>
	                </div>
	                <div class="form-group">
	                    <label for="inputSubject" class="control-label">
	                        Date of Joining</label>
	                    <div class="input-icon right">
	                        <i class="fa fa-tag"></i>
	                        <input id="inputSubject" type="Date" name="date" value="<?php echo $training_detail[0]['date_of_join']?>" placeholder="" class="form-control" /></div>
	                </div>
	                <div class="form-group">
	                    <label for="inputSubject" class="control-label">
	                        Number of months</label>
	                    <div class="input-icon right">
	                        <i class="fa fa-tag"></i>
	                        <input id="inputSubject" type="number" name="months" value="<?php echo $training_detail[0]['months']?>" placeholder="" class="form-control" /></div>
	                </div>
	                
	            </div>
	            <div class="form-actions text-right pal">
	                <button type="submit" class="btn btn-primary">
	                    Approve</button>
	            </div>
	            </form>
	            <?php } else echo "<h3>Student has not yet filled his training details or he is in the wrong phase</h3>"?>
	        </div>
    	</div>
    </div>
</div>