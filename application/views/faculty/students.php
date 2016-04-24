<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
<!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    	<div class="page-header pull-left">
    		<div class="page-title">
                  <?php if(isset($heading)) echo $heading; ?>
            </div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
        	<li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo base_url(); ?>index.php/faculty">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        	<li class="active">&nbsp;<a href="<?php echo base_url(); ?>index.php/faculty/view_students"><?php if(isset($heading)) echo $heading; ?></a></li>
        </ol>
        <div class="clearfix">
        </div>
    </div>
<!--END TITLE & BREADCRUMB PAGE-->                
<!--BEGIN CONTENT-->
<div class="page-content">
	<div id="tab-general">
		<div class="row mb1">
    <?php
    if(isset($student_alotted) && $student_alotted=='false') {
      echo "<div class='alert alert-danger'><strong>Administrator has not alotted any students to you yet</strong></div>";
    }
    ?>
			<div class="col-lg-12">
							 <div class="panel-body">
    <table id="tabble" class="table table-hover table-striped tablesorter">
      <thead>
        <tr>
          <th>S No.</th>
          <th>Roll Number</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Branch</th>
          <th>Branch</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $num=1;
        foreach($students as $st)
        {
          echo "<tr>";
          echo "<td>$num</td>";
          echo "<td>".$st["roll_number"]."</td>";
          echo "<td>".$st['name']."</td>";
          echo "<td>".$st['email']."</td>";
          echo "<td>".$st['phone']."</td>";
          echo "<td>".$st['branch']."</td>";
          echo "<td>".$st['branch']."</td>";
          echo "</tr>";
          $num++; 
        } 
          ?>
      </tbody>
    </table>
  </div>
			
      </div>
</div>
	</div>
</div>
<!--END CONTENT-->