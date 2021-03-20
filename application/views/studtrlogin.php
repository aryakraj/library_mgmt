<!DOCTYPE html>
<html>
	<head>
		<title></title>
        <style>
        	fieldset{
        		width:50px;
        		margin-top:15%;
        		margin-left:35%; 
        	}
        	table,td,tr{
        		text-align:center;
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
		 <a href="<?php echo base_url()?>main/index">Home To Back</a>
        <div>
        </div></br></br></br></br></br></br>
		<form method="post" action="<?php echo base_url()?>main/logins">
			<fieldset>
				<legend>login</legend>
			<table>

			<tr>
				<td><h2>Email id:<h2></td>
			    <td><input type="email" name="email"></td>
			<tr>
				<td><h2>Password:</h2></td>
			   <td><input type="Password" name="Password"></td>
			</tr>  
			<tr>			
				<td ><input type="submit" value="login" ></td>
			</tr>
			</table>
            </fieldset>
	</form>
	</body>	
</html>  