
                <!--BEGIN CONTENT-->
<?php if($_SESSION['phase_num'] == 2){
    
?>

<div class="page-content">
  
        <?php       if(!isset($error)){ ?>
                <div class="panel panel-blue">
                                            <div class="panel-heading">
                                                Mentor</div>
                                            <div class="panel-body pan">
                                                <?php echo form_open_multipart('student/mentor');?>
                                                <div class="form-body pal"> 

                                                    <div class="form-group">
                                                        <label for="company_name">Company Name<span style="color:red;">*</span></label>
                                                        <select class="form-control" id="company_name" name="company_name">
                                                        <?php
                                                            foreach ($companies as $Company) {
                                                                echo "<option value='$Company'>$Company</option>";
                                                        }?>
                                                        </select>
                                                    </div>    
                                                    <div class="form-group">
                                                        <div class="input-icon right">
                                                        <label for="mentorid">Mentor email:</label>
                                                            <input name="mentorid" id="mentorid" type="text" placeholder="abc@gmail.com" class="form-control" />

                                                        </div>
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
                                                Training 2</div>
                                            <div class="panel-body pan">

                                          <?php 
              
                foreach ($error as $error_item):
                ?>
                <div class=<?php if($error_item[1]==0) echo "'alert alert-info alert-danger'";
                else echo "'alert alert-info alert-success'";?> role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $error_item[0];?>
                </div>
                <?php endforeach;
                ?>
     
                                                
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
           
           <h4 style ="font-color:#000">You can link mentor in phase 2 only.</h4>
           </div>
                <!--END CONTENT-->
<?php }?>