<!DOCTYPE html>
<html>
<head>
	<title>registration</title>
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
            background-image: url(../img/16.jpg);
            background-size:cover;
            width: 400px;
        }
        a
        {
            color:white;
        }
	</style>
</head>
<body>
    <a href="<?php echo base_url()?>main/index">Home To Back</a>
        <div>
        </div>
	<form action="<?php echo base_url()?>main/pub_insrt" method="POST">
		<fieldset style="width:500px;">
			<h2 style="color: white">Welcome To Publishers Registration</h2>
		<input type="text" name="name" placeholder="Name"></br>
	    <textarea placeholder="Address" name="address" style="width:185px"></textarea></br>
       </br>
        <input type="text" name="number"  placeholder="Phone number"></br>
        <input type="email" name="email" placeholder="Email"></br>
        <input type="password" name="password" placeholder="password"></br>
        <input type="submit" name="submit">

    </fieldset>

   </form>
</body>
</html>

   