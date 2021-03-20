<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style> table,th,tr,td{
			
            border:2px solid black;
            border-collapse:collapse;
            padding: 10px;
            margin:50px;
		}
	</style>
	</head>
	<body>
		<form method="post" action="">
			<table>
			<thead>
			  <tr>	
				<th>Full Name</th>
				<th>Address</th>
				<th>District</th>
				<th>City</th>
				<th>Pin</th>
				<th>Number</th>
				<th>Gender</th>
				<th colspan="2">Action</th>
				</tr>	
			  	<?php
			  		if($n->num_rows()>0)
			  		{
			  			foreach($n->result() as $row)
			  			{
			  				?>
			  				<tr>
			  					<td><?php echo $row->fname;?></td>
			  					<td><?php echo $row->address;?></td>
			  					<td><?php echo $row->district;?></td>
			  					<td><?php echo $row->city;?></td>
			  					<td><?php echo $row->pin;?></td>
			  					<td><?php echo $row->number;?></td>
			  					<td><?php echo $row->gender;?></td>
			  					<?php
			  						if($row->status==1)
			  						{
			  							?>
			  							<td>Approved</td>
			  							<td><a href="<?php echo base_url()?>main/reject/<?php echo $row->id;?>">reject</a></td>
			  							<?php
			  						}
			  						elseif($row->status==2)
			  						{
			  							?>
			  							<td>rejected</td>
			  							<td><a href="<?php echo base_url()?>main/approve/<?php echo $row->id;?>">approve</a></td>
			  							<?php
			  						}
			  						else
			  						{
			  							?>

			  					<td><a href="<?php echo base_url()?>main/approve/<?php echo $row->id;?>">approve</a></td>
			  					<td><a href="<?php echo base_url()?>main/reject/<?php echo $row->id;?>">reject</a></td>
			  					<?php
			  				}
			  				?>
			                </tr>
			                <?php
			            }
			        }?>

			</thead>
		</table>
	</form>
	</body>	
</html>  