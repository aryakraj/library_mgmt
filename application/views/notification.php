<!DOCTYPE html>
<html>
<head>
	<title>notification</title>
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
		}
		 body
        {
            background-image: url(../img/9.jpg);
            background-size:cover;
            width: 400px;
        }
        h2
        {
        	color: white;
        }
	</style>
</head>
<body>
	<form action="<?php echo base_url()?>main/notinsert" method="POST">
        
		<fieldset style="width:400px">
			<h2>Add Notification</h2>
		<input type="text" name="notification" placeholder="Enter the notication details">

        <input type="submit" name="submit" value="Submit">


    </fieldset>

   </form>
</body>
</html>