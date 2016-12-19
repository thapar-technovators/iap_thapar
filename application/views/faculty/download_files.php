
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
                                            <?php echo "<br>" ?>
                                            <?php
                                                
                                                foreach ($filenames as $fn) {
                                                    ?>
                                                    <div class="alert alert-info alert-dismissible"><h4><a title="Click to download" href="<?php echo base_url(); ?>index.php/faculty/download_function/<?php echo $fn[0].'.pdf' ?>" download="<?php echo $fn[1].'.pdf'?>" > <?php echo $fn[1] ?> </a> </h4></div>
                                                    <?php
                                                 }?>

                                            
                                            </div>
                                                
                                                    
                                                   
                                                   
                </div>
            

       
                                        
                    
                </div>
                <!--END CONTENT-->
