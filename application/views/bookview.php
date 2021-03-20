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
}

	</style>
	</head>
	<body>
		 <a class="active" href="<?php echo base_url()?>main/tdash">Back To Dashboard</a>
    	
		<table>
			<thead>
			  <tr>	
				<th>Book Name</th>
				<th>Type Of Book</th>
				<th>Author</th>
				<th>Quantity</th>
				<th colspan="2">Action</th>
				
		       </tr>
		    </thead>
		    <tbody>
		    	<?php
			        if($n->num_rows()>0)  
			  		{
			  			foreach($n->result() as $row)
			  			{
			  				?>
			  				<tr>
			  					<td><?php echo $row->bname;?></td>
			  					<td><?php echo $row->type;?></td>
			  					<td><?php echo $row->author;?></td>
			  					<td><?php echo $row->qty;?></td>
			  					
			  					<?php
			  						if($row->status==1)
			  						{
			  							?>
			  							<td>Approved</td>
			  							<td><a href="<?php echo base_url()?>main/newreject/<?php echo $row->id;?>">Reject</a></td>
			  							<?php
			  						}
			  						elseif($row->status==2)
			  						{
			  							?>
			  							<td>Rejected</td>
			  							<td><a href="<?php echo base_url()?>main/newapprove/<?php echo $row->id;?>">Approve</a></td>
			  							<?php
			  						}
			  						else
			  						{
			  							?>

			  					<td><a href="<?php echo base_url()?>main/newapprove/<?php echo $row->id;?>">approve</a></td>
			  					<td><a href="<?php echo base_url()?>main/newreject/<?php echo $row->id;?>">reject</a></td>
			  				
			  				<?php
			  			}
                        		   }
			  		}
			  		?>
		
		    </tbody>


				
		   </table>
	</form>
	</body>	
</html>