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

                <div class="panel panel-pink">
                                            <div class="panel-heading">
                                                Joining report</div>
                                            <div class="panel-body pan">

                                            <h3>Your file was successfully uploaded!</h3> 

                                            <ul> 
         <?php foreach ($upload_data as $item => $value):?> 
         <li><?php echo "'$item' : '$value'"; ?></li> 
         <?php endforeach; ?>
      </ul>  
      <p><?php echo anchor('student/upload_document', 'Upload Another File!'); ?></p>  
                                                
                                            </div>
                                        </div>
                                        
                    
                </div>
                <!--END CONTENT-->
