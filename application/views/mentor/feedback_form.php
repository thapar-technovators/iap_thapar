BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
<!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
         <div class="page-header pull-right">
            <div class="page-title">
                Dashboard
            </div>
        </div> 
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo base_url(); ?>index.php/mentor">Home</a>&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Feedback</li>
        </ol>
        <div class="clearfix">
        </div>
    </div>
<!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->


<h5>
                <div class="panel panel-blue" style = "background:#fff" >
                                            <div class="panel-heading">
                                                Feedback form</div>
                                            <div >
                                                <form action="<?php echo base_url();?>index.php/mentor/feedback" method="post">

                                                    <div class="form-body pal">
                                                    
                                                   
                                                   <!-- <input type="hidden" name = 'xyz'>  -->
                                                    <div class="form-group">
                                                        <label for="company_name" class="col-sm-7 control-label">Student Roll number<span style="color:red;">*</span></label>
                                                        <div class="col-sm-5 controls">
                                                        <select class="form-control" id="student_name" name="student_name">
                                                        <?php
                                                            foreach ($students as $student) {
                                                                echo "<option name ='student' value='".$student["roll_number"]."'>".$student["roll_number"]."</option>";
                                                        }?>
                                                        </select>
                                                        </div>
                                                    </div>    
                                                    <!-- DATE FROM AND TO-->
                                                     
                        
                                                    
                                                </div>


                                                <div class="form-body pal">





                                                <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-7 control-label">1. Were the students serious about their work?</label>

                                                <div class="col-sm-5 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q1" checked="checked" value="Excellent"/>Excellent &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q1" value= "Good"/>Good&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q1" value = "Fair"/>Fair&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-7 control-label">2. Were they allotted specific projects?</label>

                                                <div class="col-sm-5 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                            
                                                                <input type="radio" name="q2" value="Yes"checked="checked"/>Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            
                                                                <input type="radio" name="q2" value="No"/>No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-7 control-label">3. Has the work done by students been value to the company?</label>

                                                <div class="col-sm-5 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                Yes
                                                                <input type="radio" name="q3" value="Yes"checked="checked"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                No
                                                                <input type="radio" name="q3" value = "No"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-7 control-label">4. Did the students have adequate background knowledge?</label>

                                                <div class="col-sm-5 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                A
                                                                <input type="radio" value="Excellent" name="q4" checked="checked"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                B
                                                                <input type="radio" name="q4" value="Good"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                C
                                                                <input type="radio" name="q4" value = "Fair"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-7 control-label">5. Did the students have adequate maturity and adjustability?</label>

                                                <div class="col-sm-5 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                A
                                                                <input type="radio" name="q5" value="Excellent"checked="checked"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                B
                                                                <input type="radio" name="q5" value="Good"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                C
                                                                <input type="radio" name="q5" value = "Fair"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                             <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-7 control-label">6. Do you think that the University can interact with the industry / organisation in some other way also? Please specify.</label>

                                                <div class="col-sm-5 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                Yes
                                                                <input type="radio" name="q6"value = "Yes" checked="checked"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                No
                                                                <input type="radio" name="q6" value = "No"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-7 control-label">7. How do you rate the student overall?</label>

                                                <div class="col-sm-5 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                A
                                                                <input type="radio" name="q7" value="Excellent" checked="checked"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                B
                                                                <input type="radio" name="q7"value="Good"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                C
                                                                <input type="radio" name="q7" value = "Fair"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-7 control-label">8. Will you consider the student to be absorbed in your organisation(if chance given)</label>

                                                <div class="col-sm-5 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                Yes
                                                                <input type="radio" name="q8" value = "Yes"checked="checked"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                No
                                                                <input type="radio" name="q8" value = "No"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-7 control-label">9. Will you like to take TU students again next year?</label>

                                                <div class="col-sm-5 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                Yes
                                                                <input type="radio" name="q9" value = "Yes"checked="checked"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                No
                                                                <input type="radio" value = "No"name="q9"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
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
                </div>
                </h5>
                <!--END CONTENT