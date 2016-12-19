
                <!--BEGIN CONTENT-->
                
<?php if($_SESSION['phase_num'] == 3){
    
?>
<div class="page-content">

<?php if(isset($error)) echo $error;
        if($access){
            if(!isset($file1)){ ?>
                <div class="panel panel-blue">
                                            <div class="panel-heading">
                                                Training 1</div>
                                            <div class="panel-body pan">
                                                <?php echo form_open_multipart('student/submit_joining');?>
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
                                                        <label for="userfile">Joining Report</label>
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
<?php }
else{?>
            </br>
           <div class="panel panel-blue" >
           
           <h4 style ="font-color:#000">You can upload joining report in phase 3 only.</h4>
           </div>
<?php }?>    
                
                <!--END CONTENT-->
