<!DOCTYPE html>
<html>
<head>
	<title>Request Send</title>
	<style>
		* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.bi
{
	background-image: url("../img/11.jpg");
	background-size: cover;
}

#navbar {
  overflow: hidden;
  background-color: black;
  padding: 60px 10px;
  transition: 0.4s;
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 99;
}

#navbar a {
  float: left;
  color: white;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

#navbar #logo {
  font-size: 35px;
  font-weight: bold;
  transition: 0.4s;
}

#navbar a:hover {
  background-color: dodgerblue;
  color: black;
}

#navbar a.active {
  background-color: dodgerblue;
  color: white;
}
.req
{
	margin-top: -10%;
}

#navbar-right {
  float: right;
}
fieldset
{

	margin-top: 15%;
	width: 330px;
	padding: 10px;
	margin-left: 35%;
	background-color:rgba(0,0,0,0.6);
	color: white;

}
input
{
	padding: 10px;
	margin:10px;
	width: 250px;
}

@media screen and (max-width: 580px) {
  #navbar {
    padding: 20px 10px !important;
  }
  #navbar a {
    float: none;
    display: block;
    text-align: left;
  }
  #navbar-right {
    float: none;
  }
  h1
  {
   color: white;
  }
  .dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
	</style>
</head>
<body class="bi">
	<div id="navbar">
  	<div id="navbar-right">
    <a class="active" href="<?php echo base_url()?>main/adash">Home</a>
    <a href="<?php echo base_url()?>main/tview">View User Details</a>
    <a href="<?php echo base_url()?>main/pview">View Publishers Details</a>
    <a href="<?php echo base_url()?>main/nview">View Notification</a>
   <!--  <a href="<?php echo base_url()?>main/nview">View Notification</a> -->
   <a href="<?php echo base_url()?>main/viewissuez">Issue Book</a>
    <a href="<?php echo base_url()?>main/req">Send Request</a>
    <a href="<?php echo base_url()?>main/index">Logout</a>
	<!-- <a href="<?php echo base_url()?>main/adash" align="right">Home To Back</a> -->
	</div>
</div>
	<form action="<?php echo base_url()?>main/insrtreq" method="post">
    
		<fieldset>
			<h3>Request For Books</h3>
		<input type="text" name="bname" placeholder="Enter Book Name"><br>
		<input type="text" name="type" placeholder="Enter Book Type"><br>
		<input type="text" name="author" placeholder="Enter Author Name"><br>
		<input type="text" name="qty" placeholder="Enter count"><br>
		<input type="submit" name="submit">
		</fieldset>
	</form>

</body>
</html>