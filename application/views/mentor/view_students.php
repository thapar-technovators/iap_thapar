<!--BEGIN PAGE WRAPPER-->
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
            <li class="active">Students</li>
        </ol>
        <div class="clearfix">
        </div>
    </div>
<!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="panel-body">
        <table id="tabble" class="table table-hover table-striped tablesorter">
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $num=1;
                foreach($students as $st)
                {
                    echo "<tr>";
                    echo "<td>$num</td>";
                    echo "<td>".$st['name']."</td>";
                    echo "<td>".$st['email']."</td>";
                    echo "<td>".$st['phone']."</td>";
                    echo "</tr>";
                    $num++;
                }
                    ?>
            </tbody>
        </table>
    </div>
                <!--END CONTENT-->