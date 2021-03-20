<!DOCTYPE html>
<html>
<head>
	<title>updation</title>
	<style>
		fieldset{
			padding: 10px;
			margin-left:450px;
			text-align:center;
		}
		input{
			padding:10px;
			margin-top: 5px;
			text-align:center;
		}
		textarea{

			margin-top: 5px;
			text-align:center;
		}body
        {
            background-image: url(../img/8.jpg);
            background-size:cover;
            width: 600px;
        }


	</style>
</head>
<body>
    <a href="<?php echo base_url()?>main/sdash">Back To dashboard</a>
	<form action="<?php echo base_url()?>main/updatdetails" method="POST">
       <?php
        if(isset($user_data))
        {
            foreach($user_data->result() as $row1) 
            {
                ?>
		<fieldset style="width:400px">
			<legend>Updation Here!!!!!</legend>
		<input type="text" name="name" placeholder="Name" value="<?php echo $row1->name;?>"></br>

	    <textarea placeholder="Address" name="address" style="width:185px"><?php echo $row1->address;?></textarea></br>

        <input type="text" name="number"  placeholder="Phone number" value="<?php echo $row1->number;?>" ></br>
      <button type="submit" name="submit">Update</buttons      
    <?php
}
    }
?>
    </fieldset>

   </form>
</body>
</html>