
                <!--BEGIN CONTENT-->
                <div class="page-content">
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

                <div class="panel panel-pink">
                                            <div class="panel-heading">
                                                Change Password</div>
                                        <div class="panel-body pan">
                                                <?php echo form_open_multipart('mentor/change_password');?>
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
                                                    
                                                </div>
                                                <div class="form-actions text-right pal">
                                                    <button type="submit" class="btn btn-primary">
                                                        Submit a review</button>
                                                </div>
                                                </form>
                                        </div>
                                       
                                   </div>     
                    
                </div>
                <!--END CONTENT-->
