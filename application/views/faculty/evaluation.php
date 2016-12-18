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
            <li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo base_url(); ?>index.php/faculty">Home</a>&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Evaluation</li>
        </ol>
        <div class="clearfix">
        </div>
    </div>
<!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->


<h5>
                <div class="panel panel-blue" style = "background:#fff" >
                                            <div class="panel-heading">
                                                Evaluate Students</div>
                                            <div >
                                                <form action="<?php echo base_url();?>index.php/faculty/evaluation" method="post">

                                                    <div class="form-body pal">
                                                    <div class ="row">
                                                    <div class="form-group">
                                                        <label for="company_name" class="col-sm-7 control-label">Student Roll number<span style="color:red;">*</span></label>
                                                        <div class="col-sm-5 controls">
                                                        <select class="form-control" id="student_name" name="roll_number">
                                                        <?php
                                                            foreach ($students as $student) {
                                                                echo "<option  value='".$student["roll_number"]."'>".$student["roll_number"]."&nbsp;".$student["email"]."</option>";
                                                        }?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    </div> 
                                                    </br> 
                                                    <div class = "row">
                                                  <div class="form-group">
                                                        <label for="company" class="col-sm-7 control-label">Student Company<span style="color:red;">*</span></label>
                                                        <div class="col-sm-5 controls">
                                                        <select class="form-control" id="student_name" name="company">
                                                        <?php

                                                            foreach ($company_data as $x)
                                                                echo "<option value='".$x['company']."'>".$x['company']." </option>";
                                                        
                                                        ?>
                                                        </select>
                                                        </div>
                                                    </div>  
                                                    </div>
                                                    
                                                </div>
                                                <h4>&nbsp;&nbsp;<u>ATTRIBUTES (10 marks)</u> </h4>
                                                <div class="form-body pal">
                                                <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">1. JOB KNOWLEDGE <br> (refers to knowledge, clarity of fundamentals, and latest development)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q1" checked="checked" value=5/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q1" value=4 />4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q1" value =3/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q1" value=2/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q1" value =1/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">2. CREATIVITY <br> (refer to the ability to generate new and practical ideas for improvement of systems and operations related to the job.)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q2" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q2" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q2" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q2" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q2" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">3. INITIATIVE </br> (refers to the ability to conceptualise all aspects of the project and to systematically plan the series of activities to achieve the goals)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q3" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q3" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q3" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q3" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q3" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">4. PLANNING SKILLS </br> (refers to the ability to conceptualise all aspects of the project and to systematically plan the series of activities to achieve the goals)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q4" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q4" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q4" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q4" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q4" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">5. ORGANISING SKILLS <br> (refers to the ability to mobilise, coordinate, integrate various activities/resources to achieve fast completion.)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q5" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q5" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q5" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q5" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q5" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">6. APPLICATION SKILLS <br> (refer to the ability to apply knowledge to real life situations.)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q6" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q6" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q6" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q6" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q6" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                             <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">7. JOB INVOLVEMENT <br> (refer to the concern and deligence shown in execution of the project.)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q7" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q7" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q7" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q7" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q7" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">8. INTERPERSONAL RELATIONSHIP <br> (refer to the ability to work harmoniously with superiors and subordinates .)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q8" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q8" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q8" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q8" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q8" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">9. REGULARITY AND PUNCTUALITY <br> (refers to (i)Sanctioned authorised leave, absence without permission (ii)Late coming and leaving work place early.)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q9" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q9" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q9" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q9" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q9" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">10. ADAPTABILITY TO NEW ENVIRONMENT <br> (refer to the ability to acclamatise himself/herself to new work environment/culture.)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q10" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q10" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q10" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q10" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q10" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            <br>
                                     <!--v class="col-xs-9"> 
                                                            <div>
                                                                <input type="text" name="total1" id ="total1" readonly><br>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            -->
                                            <script type="text/javascript" >
                                              



                                                $(function(){

    $("input:radio[name='q9']").change(function(){
        //var _val = $('#q2').val();
        //var x = parseInt("1000", 10);
       // alert(typeof $('#q2').val());
        //document.getElementById('total1').value = parseInt(_val,10);
        //document.getElementById('total1').value =  parseInt(("#q1").val) + ("#q2").val+ ("#q3").val+ ("#q4").val+ ("#q5").val+ ("#q6").val+ ("#q7").val+ ("#q8").val+ ("#q9").val+ ("#q10").val;
    });

});
                                            </script>
                                            
                                            </div>
                                                <h4>&nbsp;&nbsp;<u>PERFORMANCE (10 marks)</u> </h4>
                                                <div class="form-body pal">
                                                <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">1. PROBLEM FORMULATION <br> (refers to initiative shown in converging to project formulation)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q11" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q11" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q11" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q11" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q11" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">2. APPROACH / METHODS used </label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q12" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q12" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q12" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q12" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q12" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">3. TECHNIQUES / TOOLS used at various stages</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q13" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q13" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q13" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q13" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q13" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">4. INFORMATION COLLECTON UPDATE </br> (refers to (a) Literature survey (b) Guidance from others in industry and the institute)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q14" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q14" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q14" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q14" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q14" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">5. EXECUTION OF THE PROJECT </br> (refers to (a) setting time frames (b) efforts put into complete the project (c) maintenance of work diary)   </label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q15" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q15" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q15" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q15" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q15" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">6.STATUS AND FEASIBILITY OF IMPLEMENTATION</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q16" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q16" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q16" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q16" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q16" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                             <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">7. PROJECT REPORT AND DEFENCE</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q17" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q17" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q17" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q17" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q17" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>  
                                            </div>
                                                <h4>&nbsp;&nbsp;<u>COMMUNICATION SKILLS (5 marks)</u> </h4>
                                                <div class="form-body pal">
                                                <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">1. PRESENTATION <br> (refers to style and effectiveness)</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q18" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q18" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q18" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q18" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q18" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">2. WRITTEN EXPRESSION </label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q19" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q19" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q19" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q19" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q19" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            </br>
                                            <div class="row">
                                                <div class="form-group">
                                                <label class="col-sm-8 control-label">3. ORAL EXPRESSION</label>

                                                <div class="col-sm-4 controls">
                                                    
                                                        <div class="col-xs-9"> 
                                                            <div>
                                                                
                                                                <input type="radio" name="q20" checked="checked" value="5"/>5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q20" value= "4"/>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q20" value = "3"/>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="radio" name="q20" value= "2"/>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                
                                                                <input type="radio" name="q20" value = "1"/>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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