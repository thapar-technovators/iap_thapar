                <!--BEGIN CONTENT-->
                <div class="page-content">

                <div class="panel panel-pink">
                                            <div class="panel-heading">
                                                Review form</div>
                                            <div class="panel-body pan">
                                                <form action="#">
                                                <div class="form-body pal">
                                                    <div class="form-group">
                                                        <div class="input-icon right">
                                                        <label for="doj">Company Name</label>
                                                            <input list="companies" id="inputcompany" type="text" placeholder="eg. Tata Motors" class="form-control" />

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
                                                            <input list="cities" id="inputCity" type="text" placeholder="eg. Pune" class="form-control" /></div>
                                                            <datalist id="cities">

                                                            <?php
                                                            if(isset($company_data)){
                                                            foreach ($company_data as $x)
                                                                echo "<option value='".$x['city']."'></option>";
                                                        
                                                            }
                                                            ?>
                                                            </datalist>
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