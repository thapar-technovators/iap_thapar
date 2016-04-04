	<div class="panel-body">
		<table id="tabble" class="table table-hover table-striped tablesorter">
			<thead>
				<tr>
					<th>S No.</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Designation</th>
					<th>Preference 1</th>
					<th>Preference 2</th>
					<th>Preference 3</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$num=1;
				foreach($faculty as $fac)
				{
					if($fac['pref1']=='')
						$fac['pref1']="Not Filled";
					if($fac['pref2']=='')
						$fac['pref2']="Not Filled";
					if($fac['pref3']=='')
						$fac['pref3']="Not Filled";
					echo "<tr>";
					echo "<td>$num</td>";
					echo "<td>".$fac["name"]."</td>";
					echo "<td>".$fac['email']."</td>";
					echo "<td>".$fac['phone']."</td>";
					echo "<td>".$fac['designation']."</td>";
					echo "<td>".$fac['pref1']."</td>";
					echo "<td>".$fac['pref2']."</td>";
					echo "<td>".$fac['pref3']."</td>";
					echo "</tr>";
					$num++;
				}
					?>
			</tbody>
 		</table>
 	</div>
