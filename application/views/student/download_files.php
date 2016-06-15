
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


<?php if(isset($error)) echo $error; ?>
        
                <div class="panel panel-blue">
                                            <div class="panel-heading">
                                                Files</div>
                                            <div class="panel-body pan">
                                            <?php
                                                foreach ($filenames as $fn) {
                                                    ?>
                                                    <a title="Click to download" href="<?php echo base_url(); ?>index.php/student/download_function/<?php echo $fn.'.pdf' ?>"  > <?php echo $fn."<br>" ?> </a>
                                                    <?php
                                                }?>

                                            
                                            </div>
                                                
                                                    
                                                   
                                                   
                </div>
            

       
                                        
                    
                </div>
                <!--END CONTENT-->
