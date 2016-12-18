
<br>
<br>
<br>
<br>
<br>
<br>
<h2 class="text-center">
Training Data from Previous Year
</h2>
<div class="container-fluid">
		<table class="table table-hover table-striped">
			<thead>
				
					<th>S No.</th>
					<th>Name</th>
					<th>Company</th>
					<th>Place</th>
					<th>Period</th>
					<th>Stay At</th>
					<th>Stay Review</th>
					<th>Company Review</th>
					<th>Contact</th>
					<th>Email</th>
				
			</thead>
			<tbody>
				<?php 
				$num=1;
				foreach($trainingdata as $dt)
				{
					echo "<tr>";
					echo "<td>$num</td>";
					echo "<td>".$dt["name"]."</td>";
					echo "<td>".$dt['company']."</td>";
					echo "<td>".$dt['place']."</td>";
					echo "<td>".$dt['period']."</td>";
					echo "<td>".$dt['stayed_at']."</td>";
					echo "<td>".$dt['stay_review']."</td>";
					echo "<td>".$dt['company_review']."</td>";
					echo "<td>".$dt['contact']."</td>";
					echo "<td>".$dt['email']."</td>";
					echo "</tr>";
					$num++;
				}
					?>
			</tbody>
			</table>