<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
<!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                Dashboard
            </div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li class="active"><i class="fa fa-home"></i>&nbsp;<a href="<?php echo base_url(); ?>index.php/mentor">Home</a></li>
        </ol>
        <div class="clearfix">
        </div>
    </div>
<!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                        	<div class="col-lg-8">
                        		<div class="portlet box">
                                    <div class="portlet-header">
                                        <div class="caption">
                                            Todo List</div>
                                    </div>
                                    <div style="overflow: hidden;" class="portlet-body">
                                        <ul class="todo-list sortable">
                                            <li class="clearfix"><span class="drag-drop"><i></i></span>
                                                <div class="todo-check pull-left">
                                                    <input type="checkbox" value="" /></div>
                                                <div class="todo-title">
                                                    City Preferences</div>
                                                <div class="todo-actions pull-right clearfix">
                                                    <a href="#" class="todo-complete"><i class="fa fa-check"></i></a><a href="#" class="todo-edit">
                                                        <i class="fa fa-edit"></i></a><a href="#" class="todo-remove"><i class="fa fa-trash-o">
                                                        </i></a>
                                                </div>
                                            </li>
                                            <li class="clearfix"><span class="drag-drop"><i></i></span>
                                                <div class="todo-check pull-left">
                                                    <input type="checkbox" value="" /></div>
                                                <div class="todo-title">
                                                    Student Evaluation</div>
                                                <div class="todo-actions pull-right clearfix">
                                                    <a href="#" class="todo-complete"><i class="fa fa-check"></i></a><a href="#" class="todo-edit">
                                                        <i class="fa fa-edit"></i></a><a href="#" class="todo-remove"><i class="fa fa-trash-o">
                                                        </i></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php if(isset($data)) {?>
                            <div class="col-lg-4">
                                <h4 class="box-heading">Basic Information</h4>
                                <ul class="list-group">
                                    
                                    <?php
                                        foreach($data as $x=>$x_value){
                                        echo "<li class='list-group-item'><b>".$x."</b> -> ".$x_value."</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php }; ?>
                        	</div>
                        </div>
                    </div>
                <!--END CONTENT-->