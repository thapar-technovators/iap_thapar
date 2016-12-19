
                <!--BEGIN CONTENT-->
<?php if($_SESSION['phase_num'] == 4){
    
?>

<div class="page-content">
  
        <?php       if(!isset($error)){ ?>
                <div class="panel panel-blue">
                                            <div class="panel-heading">
                                            Faculty details</div>
                                            <div class="panel-body pan">
                                                
                                                <div class="form-body pal"> 
                                                <div class = "row">
                                                    <div class="form-group">
                                                        <label for="company_name" class="col-sm-7 control-label">Faculty name<span style="color:red;">*</span></label>
                                                        <div class="col-sm-5 controls">
                                                        <?php echo $faculty[0]['name'] ;?>
                                                        </div>
                                                    </div>     
                                                </div>  
                                                    <div class = "row">
                                                    <div class="form-group">
                                                        <label for="company_name" class="col-sm-7 control-label">Email-id<span style="color:red;">*</span></label>
                                                        <div class="col-sm-5 controls">
                                                        <?php echo $faculty[0]['email']; ?>
                                                        </div>
                                                    </div>     
                                                </div>  
                                               <div class = "row">
                                                    <div class="form-group">
                                                        <label for="company_name" class="col-sm-7 control-label">Phone number<span style="color:red;">*</span></label>
                                                        <div class="col-sm-5 controls">
                                                        <?php echo $faculty[0]['phone']; ?>
                                                        </div>
                                                    </div>     
                                                </div>  
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
           
           <h4 style ="font-color:#000">Faculty will be assigned in phase 4 only.</h4>
           </div>
                <!--END CONTENT-->
<?php }?>