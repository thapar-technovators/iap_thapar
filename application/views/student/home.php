                <!--BEGIN CONTENT-->
                <div class="page-content">
<?php 
            /*   unset($_POST['submit']);
               unset($_POST['inputcompany']);
               unset($_POST['inputcity']);
               unset($_POST['doj']);
               unset($_POST['timeoftraining']);*/
               //unset($_POST);

             //   header('Location: http://localhost/iap_thapar/index.php/student/company_details');
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
                                                Review form</div>
                                            <div class="panel-body pan">
                                                <form action="<?php echo base_url();?>index.php/student/company_details" method="post">
                                                <div class="form-body pal">
                                                    <div class="form-group">
                                                        <div class="input-icon right">
                                                        <label for="doj">Company Name</label>
                                                            <input list="companies" name="inputcompany" id="inputcompany" type="text" placeholder="eg. Tata Motors" class="form-control" />

                                                            <datalist id="companies">

                                                            <?php
                                                            if(isset($company_data)){
                                                            foreach ($company_data as $x)
                                                                echo "<option value='".$x['company']."'></option>";
                                                        
                                                            }
                                                            ?>
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-icon right">
                                                        <label for="doj">City Name</label>
                                                            <input list="cities" name="inputcity" id="inputcity" type="text" placeholder="eg. Pune" class="form-control" />
                                                            <datalist id="cities">

                                                            <?php
                                                            if(isset($company_city_list)){
                                                            foreach ($company_city_list as $x)
                                                                echo "<option value='".$x['city']."'></option>";
                                                        
                                                            }
                                                            ?>
                                                            </datalist>
                                                            </div>
                                                    </div>

                                                    <!-- DATE FROM AND TO-->
                                                     <div class="form-group">
                            <label for="doj">Date of Joining</label>
                            <input type="date" name="doj" id="doj" required class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="timeoftraining">Training time Confirmation (in Months)<span style="color:red;">*</span></label>
                            <select class="form-control" id="timeoftraining" name="timeoftraining">
                                <?php
                                 for ($i=2;$i<=6;$i++) {
                                    echo "<option value='$i'>$i</option>";
                                }?>
                            </select>
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