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
				<th>Name</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Email</th>
				<th colspan="2">Action</th>
				</tr>	
			  	<?php
			  		if($n->num_rows()>0)
			  		{
			  			foreach($n->result() as $row)
			  			{
			  				?>
			  				<tr>
			  					<td><?php echo $row->Name;?></td>
			  					<td><?php echo $row->Address;?></td>
			  					<td><?php echo $row->Gender;?></td>
			  					<td><?php echo $row->Age;?></td>
			  					<td><?php echo $row->emailid;?></td>
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