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
		<form method="post" action="<?php echo base_url()?>main/updatedetails">
        <?php
        if(isset($user_data))
        {
            foreach ($user_data->result() as $row1) 
            {
                ?>
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" value="<?php echo $row1->Name;?>"></td>
                     </tr>
                     <tr>
                        <td>Address:</td>
                        <td><textarea name="address"> <?php echo $row1->Address;?></textarea></td>
                     </tr>
                     <tr>
                        <td>Gender:</td>
                       <td><select name="gender">
                           <option><?php echo $row1->Gender;?>
                       </option>
                        <option>male</option>
                        <option>female</option>
                    </select>
                        </td>
                     </tr>  
                     <tr>
                        <td>Age:</td>
                        <td><input type="text" name="age" value="<?php echo $row1->Age;?>"></td>
                     </tr> 
                     <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" value="<?php echo $row1->emailid;?>"></td>
                     </tr>
                     <tr>
                        <input type="hidden" name="id" value="<?php echo $row1->id;?>">
                        <td><input type="submit" name="update" value="Update"></td>
                     </tr>   
                </table>
                <?php
            }         
             }
            else{
               
                        ?>
        
    	
		<table>
			<thead>
			  <tr>	
				<th>Name</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Email</th>
				<th>Edit</th>
				<th>Delete</th>
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
			  					<input type="hidden" name="id" value="<?php echo $row->id;?>">
			  					<td><a href=" <?php echo base_url()?>main/updatedetails/<?php echo $row->id;?>">edit</a></td>
			  					<td><a href="<?php echo base_url()?>main/deletedetails/<?php echo $row->id;?> ">delete</a></td>
			  					</tr>
			  				<?php
			  			}
			  		}
			  		else
			  		{
			  			?>
			  			<tr>
			  				<td>No data found</td>
			  			</tr>
			  			<?php
			  		}
			  		 }

			  		?>
			</thead>
		</table>
	</form>
	</body>	
</html>