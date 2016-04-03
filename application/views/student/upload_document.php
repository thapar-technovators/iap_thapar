
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


<?php echo $error;?>
                <div class="panel panel-pink">
                                            <div class="panel-heading">
                                                Joining Report</div>
                                            <div class="panel-body pan">
                                                <?php echo form_open_multipart('student/submit_file');?>
                                                <div class="form-body pal">
                                                    
                                                   

                                                    <!-- DATE FROM AND TO-->
                                                     <div class="form-group">
                            							<label for="userfile">Joining report</label>
                            							<input type="file" name="userfile" id="userfile" size="20">
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
