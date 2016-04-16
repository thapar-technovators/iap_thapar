
                <!--BEGIN CONTENT-->
                <div class="page-content">
<?php /*
            
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
                */
                ?>


<?php if(isset($error)) echo $error;
        if($access){
            if(!isset($file1)){ ?>
                <div class="panel panel-blue">
                                            <div class="panel-heading">
                                                Training 1</div>
                                            <div class="panel-body pan">
                                                <?php echo form_open_multipart('student/submit_final');?>
                                                <div class="form-body pal">
                                                    
                                                   
                                                   <!-- <input type="hidden" name = 'xyz'>  -->
                                                    <div class="form-group">
                                                        <label for="company_name">Company Name<span style="color:red;">*</span></label>
                                                        <select class="form-control" id="company_name" name="company_name">
                                                        <?php
                                                            foreach ($companies as $company) {
                                                                echo "<option value='$company'>$company</option>";
                                                        }?>
                                                        </select>
                                                    </div>    
                                                    <!-- DATE FROM AND TO-->
                                                     <div class="form-group">
                                                        <label for="userfile">Final Report</label>
                                                        <input type="file" name="userfile" id="userfile" size="20">
                                                    </div>
                        
                                                    
                                                </div>
                                                <div class="form-actions text-right pal">
                                                    <button type="submit" class="btn btn-primary">
                                                        Submit</button>
                                                </div>
                                                </form>
                                            </div>
                </div>
            <?php }else{ ?>


            <div class="panel panel-blue">
                                            <div class="panel-heading">
                                                Training 1</div>
                                            <div class="panel-body pan">

                                            <h3>Your file was successfully uploaded!</h3>
     
                                                
                                            </div>
            </div>

            <?php
                    }
                }
                else{
            ?>

            <div class="panel panel-blue">
                                            <div class="panel-heading">
                                                Training 1</div>
                                            <div class="panel-body pan">

                                            <h3>You have already submitted the files</h3>
     
                                                
                                            </div>
            </div>
            <?php
                    }
            ?>

       
                                        
                    
                </div>
                <!--END CONTENT-->
