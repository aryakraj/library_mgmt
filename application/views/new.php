<!DOCTYPE html>
<html lang="en">
<head>
<title>LIBRARY</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<style>

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
  background-color: green;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  color: green;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: white;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

/* Header/logo Title */
.header {
  padding: 250px;
  text-align: center;
  background: #1abc9c;
  color: black;
  background-image: url(../img/14.jpg);
background-attachment:fixed;
  background-size: cover;
  font-family: segoe print;

}

/* Increase the font size of the heading */
.header h1 {
  font-size: 48px;
}
.header p{
  font-size: 24px;
}

/* Style the top navigation bar */
.navbar {
  overflow: hidden;
  background-color: black;
  height: 150px
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: blue;
  color: black;
}

/* Column container */
.row {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
 
}

.footer {
  padding: 20px;
  text-align: center;
  background: black;
}
.col-1{
  width:8.33%;
}
.col-2{
  width:16.66%;
}

.col-3{
  width:24.99%;
}
.col-4{
  width:33.33%;
}
.col-5{
  width:41.66%;
}
.col-6{
  width:50%;
}
.col-7{
  width:58.33%;
}
.col-8{
  width:66.66%;
}
.col-9{
  width:75%;
}
.col-10{
  width:83.33%;
}
.col-11{
  width:91.66%;
}
.col-12{
  width:100%;
}
.mar{
  background-image:url("../img/m1.jpg");
}
 .head1{
  font-family: segoe print;
  font-size: 48px;
  color: red;
  background-color: black;
}
.jammu{
  color: white;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {  
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>

<div class="header">
  <marquee>
  <h1>Library Management System</h1>
  <p>Your Future Begins Here!!</p>
</marquee>
</div>

<div class="navbar">
  <a href="#">Home</a>
  <div class="dropdown">
      <button class="dropbtn">Register</button>
      <div class="dropdown-content">
      <a href="<?php echo base_url()?>main/newreg">User</a>
      <a href="<?php echo base_url()?>main/treg">Publisher</a>
     
      </div>
</div>
  <div class="dropdown">
      <button class="dropbtn">Login</button>
      <div class="dropdown-content">
      <a href="<?php echo base_url()?>main/strlogin">Admin</a>
      <a href="<?php echo base_url()?>main/strlogin">User</a>
      <a href="<?php echo base_url()?>main/strlogin">Publisher</a>
      </div>
</div>
<a href="#cont">Contact Us</a>
<a href="#gal" >Gallery</a>
  <a href="#" class="right">About Us</a>
  <h1 style="text-align: center" class="head1">Book World....</h1>
</div>

 
<marquee behavior="scroll" direction="right" scrollamount="16" class="mar" id="gal">
 
<div class="row">
 
  <div class="col-2">
    <img src="../img/l7.jpg">
  </div>
  <div class="col-2">
    <img src="../img/l2.jpg">
  </div>
  <div class="col-2">
    <img src="../img/l3.jpg">
  </div>
  <div class="col-2">
    <img src="../img/l4.jpg">
  </div>
  <div class="col-2">
    <img src="../img/l1.jpg">
  </div>
  <div class="col-2">
    <img src="../img/l5.jpg">
  </div>
 
</div>
</marquee>
</div>
 </div>
<div class="footer">
  <h2 style="color: white;">K & K Institute of Management.  </h2>
<div id="cont" class="jammu">
  <h5>K & K Institute of Management<br>
    Trikuta Nagar,Jammu & Kashmir<br>
    Pincode:789654<br>
    Call us:+91 9356426745,7898765432<br>
    email:kkim@gmail.com
 </h5>

</div>
</div>

</body>
</html>