<?php
session_start();
if(!isset($_SESSION['faculty_id']))
 die(header("location:index.php?msg=you are not logged in"));
?>

<HTML>
<HEAD>
<TITLE>admin page 
</TITLE>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</HEAD>
<style>
@media only screen and (min-width:990px){
	#col1 {
		margin-left:12%;	
	}
}
</style>
<BODY>



    <div class="container-fluid">
	 <div class="row">
		<div style="height:15%;background-color:#4285f4;padding:0.3% 0;">
			<h1 style='text-align:center;color:white;font-family:Montserrat;'> An information system to keep track of the students’ project of an
University </h1>
   	        </div>
	 </div>


         <div class="row">


         	<div class="row">
         <div class="row" 
         style="text-align:center;
         font-family:Montserrat;
         font-size:150%;;">
 <?php  
	include("../connection.php");
	$q = "SELECT * FROM `facultydata1` WHERE `fid`='".$_SESSION['faculty_id']."'";
	$r = mysqli_query($db,$q);
	$a = mysqli_fetch_array($r);

	echo("<h1>Welcome ".$a['fname']."</h1>");

 ?>
	 </div>




         <div class="row" style="text-align:center;font-family:Montserrat;font-size:150%;;">



<a href="logout.php" class="btn btn-primary"  style="position:fixed;left:1%;top:6.5%;color:white;font-size:140%;text-decoration:none;">LOGOUT</a>

                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
			<div style="height:25%;background-color:white;">


			</div>
		</div>

<br>
<br>
<br>
<br>
		 <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4">
			<div style="height:25%;background-color:#7f8c8d;">

</br></br><h2 style="text-decoration:none;color:black;padding-top:0%;">PROJECT ADD </h2></br></br>

				<a href="add_project.php" style="text-decoration:none;color:white;">Add Project</a><br>
				<a href="editdelete_project.php" style="text-decoration:none;color:white;">Show Project</a><br>

			</div>
		</div>



<a href="logout.php" class="btn btn-primary"  style="position:fixed;left:1%;top:6.5%;color:white;font-size:140%;text-decoration:none;">LOGOUT</a>




 

		</BODY>
</div>
</div>
 </div>

<br>
<br>
			
<center>
	<a href="change_pass.php"  style=" clear: left; color:white;font-size:140%;text-decoration:none; "class="btn btn-primary">Change Password</a>

</center>

</HTML>























