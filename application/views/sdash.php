<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

#navbar {
  overflow: hidden;
  background-color: black;
  padding: 90px 10px;
  transition: 0.4s;
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 99;
}

#navbar a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  background-color: dodgerblue;
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

#navbar-right {
  float: right;
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
}

</style>
</head>
<body>

<div id="navbar">
  <h1 style="color: white;">Online Library Management System</h1>
  <div id="navbar-right">
      <a href="#" align="left">SMS</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a class="active" href="<?php echo base_url()?>main/index">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo base_url()?>main/update">Update</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo base_url()?>main/viewusrdet">View Details</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo base_url()?>main/bookdet">Book Details</a>&nbsp;&nbsp;&nbsp;&nbsp;
     <a href="<?php echo base_url()?>main/index">Logout</a>
  </div>
</div>

<div style="margin-top:210px;padding:15px 15px 2500px;font-size:30px">
    <img src="img/8.jpg">
</div>

<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "30px 10px";
    document.getElementById("logo").style.fontSize = "25px";
  } else {
    document.getElementById("navbar").style.padding = "80px 10px";
    document.getElementById("logo").style.fontSize = "35px";
  }
}
</script>

</body>
</html>
