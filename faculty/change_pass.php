<?php
session_start();
if(!isset($_SESSION['faculty_id']))
 die(header("location:index.php?msg=YOU ARE NOT LOGGED IN"));
?>



<!DOCTYPE html>
<html>
<head>
    <title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style>
	input {
            margin-right:30%;
	    border-radius:5px;
            width:200px;
        }
        select {
            margin-right:30%;
	    border-radius:5px;
	    width:200px;
        }
        button {
    	    margin-right:30%;
        }
</style>
</head>

<body>
    <div class="container-fluid">
	 <div class="row">
		<div style="height:12%;background-color:#4285f4;padding:0.3% 0;">
			<h1 style='text-align:center;color:white;font-family:Montserrat;'>  
An information system to keep track of the students’ project of an
University</h1>
   	        </div>
   	    </div>
	 </div>
 <div class="row">
 	<h2 style="text-align:center">PASSWORD CHANGE  SECTION </h2></br></br>

 </div>
    	 <div class="row" style="text-align:right;font-family:Montserrat;font-size:100%;">
                <div class="col-md-6 col-md-offset-3">
			<div style="min-height:300px;background-color:#7f8c8d;padding-top:15%;border-radius:5px;">

<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
}

?>

<form action = "change_pass.php" method = "POST">
 <div class="form-group">


 	<label for="opass">Old Password:</label>
 	  <input type = "password" name ="opass" placeholder="Old PASSWORD"></br>

 	     <label for="npass">New Password:</label>
  <input type = "password" name ="npass" placeholder="NEW PASSWORD"></br>


         <label for="cpass">Conform Password:</label>
  <input type = "text" name ="cpass" placeholder="Ex:CSE"></br>

<button type="submit" value="login" class="btn btn-success">Submit</button>
 </div>



 <div id="footer"><a href="home.php" class="btn btn-primary" >HOME</a><br>
<a href="logout.php" class="btn btn-primary">LOG OUT</a></div>

</form>
</div>
</body>
</html>


<?php

if(isset($_POST['opass']) && isset($_POST['npass']) && isset($_POST['cpass'])){

//echo("##".$row1['password']);
$opass=$_POST['opass'];
$npass=$_POST['npass'];
$cpass=$_POST['cpass'];
include('../connection.php');
//$sql = "SELECT * FROM flag where flag='admin_name'";
$sq2 = "SELECT * FROM `facultydata1` where `fid`='".$_SESSION['faculty_id']."'";
//$r = mysql_query($sql);
//$row = mysql_fetch_array($r);
$r = mysqli_query($db,$sq2);
$row1 = mysqli_fetch_array($r);
//echo("##".$row1['password']);
if($npass === $cpass){
if($row1['password']===$opass)
{
	$q = "UPDATE `facultydata1` SET `password` = '".$npass."' WHERE `fid`='".$_SESSION['faculty_id']."'";
	mysqli_query($db,$q)
	or die(mysql_error());
	header("Location:home.php?msg=password successfully changed");
}
else 
{
	header("Location:change_pass.php?msg=old password is incorrect");
}
}
else{
	header("Location:change_pass.php?msg=new password and conform password is not matched");
}
}

?>