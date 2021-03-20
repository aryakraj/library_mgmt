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
            background-image: url(../img/l1.jpg);
            background-size:cover;
            width: 400px;
        }
	</style>
</head>
<body>
   <a href="<?php echo base_url()?>main/index">Home To Back</a>
        <div>
        </div></br></br></br></br></br></br>
   <form action="<?php echo base_url()?>main/insrtreg" method="POST">
   	<fieldset style="width:450px">
      <h2>Welcome To User Registration</h2>
   		<input type="text" name="fname" placeholder="Enter Your   Name"></br>
   		
   		<textarea placeholder="Address" name="address" style="width:185px"></textarea></br>
        <input list="district" name="district" placeholder="District">
        	<datalist id="district">
        		<option value="Thiruvanathapuram">
              	<option value="Kollam">
              	<option value="Pathanamthitta">
              	<option value="Alappuzha">
                <option value="Kottayam">
                <option value="Idukki">
                <option value="Eranakulam">
                <option value="Thrissur">
            </datalist>

         </br>
         <input type="text" name="city"  placeholder="Enter Your City"></br>
        <input type="text" name="pin"  placeholder="Pincode"></br>
        <input type="text" name="number"  placeholder="Phone number"></br>
        GENDER:<input type="radio" name="gender" id="male" value="male"><label for="male">Male</label>
         <input type="radio" name="gender" id="female" value="female"><label for="female">Female</label></br>
        </br>
        <input type="email" name="email" placeholder="Email"></br>
        <input type="password" name="password" placeholder="password"></br>
        <input type="submit" name="submit">

    </fieldset>

   </form>
</body>
</html>