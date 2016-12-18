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
				</tr>
			</thead>
			<tbody>
				<?php 
				$num=1;
				foreach($students as $st)
				{

					$str="edit_student/";
					echo "<tr>";
					echo "<td>$num</td>";
					echo "<td><a href=".$str.$st['roll_number'].">".$st["roll_number"]."</td>";
					echo "<td>".$st['name']."</td>";
					echo "<td>".$st['email']."</td>";
					echo "<td>".$st['phone']."</td>";
					echo "<td>".$st['branch']."</td>";
					echo "</tr>";
					$num++;
				}
					?>
			</tbody>
 		</table>
 	</div>
