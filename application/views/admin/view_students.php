	<div class="panel-body">
		<table id="tabble" class="table table-hover table-striped tablesorter">
			<thead>
				<tr>
					<th>S No.</th>
					<th>Roll Number</th>
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
					echo "<tr>";
					echo "<td>$num</td>";
					echo "<td>".$st["roll_number"]."</td>";
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
