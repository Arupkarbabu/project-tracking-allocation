<?php
session_start();
if(!isset($_SESSION['login_user']))
 die(header("location:index.php?msg=You are not logged in"));
?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style>
	input {
            margin-right:30%;
	    border-radius:5px;
            width:250px;
        }
        select {
            margin-right:35%;
	    border-radius:5px;
	    width:250px;
        }
        button {
    	    margin-right:35%;
        }
	.fa-1x {
	font-size: 1.5rem;
	}
	.navbar-toggler.toggler-example {
	cursor: pointer;
	}
	.dark-blue-text {
	color: #0A38F5;
	}
	.dark-pink-text {
	color: #AC003A;
	}
	.dark-amber-text {
	color: #ff6f00;
	}
	.dark-teal-text {
	color: #004d40;
	}
</style>
</head>

<body>
     <div class="container-fluid">
	 <div class="row">
		<div style="height:17%;background-color:#4285f4;padding:0.3% 0;">
			<h1 style='text-align:center; color:white;font-family:Montserrat; '>FACULTY DATA </h1>

			<a href="home.php" class="btn btn-primary"  style="position:fixed;right:1%;top:6.5%;color:white;font-size:140%;text-decoration:none;">HOME</a>


			<a href="logout.php" class="btn btn-primary" >LOG OUT</a>
   	        </div>
	 </div>


<div style="text-align:center">

<table class="table table-striped table-dark table-condensed table-hover table-bordered">
		   <thread>
			<tr>
			  <th style="text-align:center;" scope="col">Faculty id </th>
			  <th style="text-align:center;" scope="col">Short name</th>
			  <th style="text-align:center;" scope="col">name</th>
			   <th style="text-align:center;" scope="col">Email</th>
			  <th style="text-align:center;" scope="col">password</th>
			  <th style="text-align:center;" scope="col">department</th>
        
			</tr>
		   </thread>
		   <tbody>');



<?php
include('../connection.php');
$q = "SELECT * FROM `facultydata1` WHERE 1";
$r = mysqli_query($db,$q);
while($a = mysqli_fetch_array($r)){
	echo('<tr>');
	echo('<td>'.$a['fid'].'</td>');
		echo('<td>'.$a['sname'].'</td>');
	echo('<td>'.$a['fname'].'</td>');
			echo('<td>'.$a['email'].'</td>');
						echo('<td>'.$a['password'].'</td>');
						echo('<td>'.$a['df_code'].'</td>');

echo("</tr>");
}


?>
</table>
</div>
<br>
</center>
</body>
</html>