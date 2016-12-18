<h2>Untagged Students</h2>
<div class="row">
	<form action="" method="post">
	<div class="col-md-6">
		<h3>Student:</h3><select name="student" class="form-control">
		<?php
		foreach($untagged as $ut){
			echo "<option value="."'".$ut['email']."'".">".$ut['email']."</option>";
		}
		?>
		</select>
	</div>
	<div class="col-md-6">
		<h3>Tag to Teacher:</h3><select name="teacher" class="form-control">
		<?php
		foreach($faculty as $ft){
			echo "<option value="."'".$ft['email']."'".">".$ft['name']."</option>";
		}
		?>
		</select>
		<br>
		<div class="pull-left form-group">
			<button class="btn btn-green" type="submit" value="Submit" name="Submit">Tag faculty with the student</button>
		</div>
	</div>
</div>
<br>
<br>
<h2>Tagged Students</h2>
<table class=" table table-hover table-bordered">
	<thead>
		<th>Student</th>
		<th>Allotted Faculty</th>
		<th>Company</th>
		<th>City</th>
	</thead>
	<tbody>
	<?php
	foreach($tagged as $t)
	{
		echo "<tr>";
	echo "<td>";
	echo $t['email'];
	echo "</td>";
	echo "<td>";
	echo $t['faculty_alotted'];
	echo "</td>";
	echo "<td>";
	echo $t['company'];
	echo "</td>";
	echo "<td>";
	echo $t['city'];
	echo "</td>";
	echo "</tr>";
	}
	?>
	
	<tbody>
</table>