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
		body
        {
            background-image: url(../img/8.jpg);
            background-size:cover;
            width: 400px;
        }
        	
	</style>
	</head>
	<body>
		<a href="<?php echo base_url()?>main/adash" align="right">Home To Back</a>
		
        <div>
        </div></br></br></br></br></br></br>
		<form method="post" action="">
			<table>
			<thead>
			  <tr>	
				<th>Teacher Name</th>
				<th>Phone</th>
				<th>Notification</th>
				<th>Current Date</th>
				</tr>	
			 		<?php
			  		if($n->num_rows()>0)
			  		{
			  			foreach($n->result() as $row)
			  			{
			  				?>
			  				<tr>
			  					<td><?php echo $row->name;?></td>
			  					<td><?php echo $row->number;?></td>
			  					<td><?php echo $row->notification;?></td>
			  					<td><?php echo $row->currdate;?></td>
			  				</tr>
			  	 		<?php
			            }
			        }?>
			  	</tr>
			</thead>
		</table>
	</form>
	</body>	
</html>  