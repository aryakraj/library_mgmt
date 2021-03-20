<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style> table{
			
            
		}
		form{
			
			margin-left:300px;
			margin-top: 20px; 

		}
		h1{
			margin-top:10px;
			margin-left: 275px;
		}
        input{
            padding:10px;

        }
        body
        {
            background-image: url(../img/8.jpg);
            background-size:cover;
            width: 600px;
        }


	</style>
    </head>
    <body>
        <a href="<?php echo base_url()?>main/index">Home To Back</a>
        <div>
        </div></br></br></br></br></br></br>
        <h1>REGISTER</h1>
    	<form method="post" action="<?php echo base_url()?>main/reg">
    		<fieldset style="width:100px">
    		<table>
    			<tr>
    				<td>Name:</td>
    		        <td><input type="text" name="name"></td>
    			</tr>
    			<tr>
    				<td>Address:</td>
    				<td><textarea style="width:175px" name="address"></textarea></td>
    			</tr>
    			<tr>
    				<td>Gender:</td>
    				<td><input type="radio" name="gender" value="male" id="male"><label for="male">male</label>
    				<input type="radio" name="gender" value="female" id="female"><label for="female">female</label></td>
    			</tr>	
    		<tr>
    			<td>Age:</td>
    			<td><input type="text" name="age"></td>
    		</tr>
    		<tr>

    		<td>Email:</td>
    		<td><input type="email" name="email"></td>
    	</tr>
    	<tr>

    		<td>Password</td>
    		<td><input type="password" name="password"></td>
    	</tr>
        <tr class="a">
    		<td ><input type="submit" value="submit" name="submit"></td>
    	</tr>
    </table>
    </fieldset>
    	</form>
    </form>
    </body>
</html>