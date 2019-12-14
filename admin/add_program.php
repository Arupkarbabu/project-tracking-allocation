<?php
session_start();
if(!isset($_SESSION['login_user']))
 die(header("location:index.php?msg=You are not logged in"));
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
 	<h2 style="text-align:center">PROGRAM ADD SECTION </h2></br></br>

 </div>
    	 <div class="row" style="text-align:right;font-family:Montserrat;font-size:100%;">
                <div class="col-md-6 col-md-offset-3">
			<div style="min-height:300px;background-color:#7f8c8d;padding-top:15%;border-radius:5px;">

<?php
if(isset($_GET['flg']))
{
	if($_GET['flg']==="true")
	{
		echo("Successfully added ");
	}
}
?>

<form action = "add_program.php" method = "POST">
 <div class="form-group">
 	
<label for="clgid">PROGRAM CODE:</label>
  <select name ="clgid">
						<option >BTECH</option>
						<option >MTECH</option>
						<option >MCA</option>
				
				
		</select></br>



 	<label for="name">PROGRAM NAME: </label>
 	  <input type = "text" name ="name" placeholder="bachalor of technology"></br>
 	  
					
		
				



<button type="submit" value="add program" class="btn btn-success">Submit</button>
 </div>



 <div id="footer"><a href="home.php" class="btn btn-primary" >HOME</a><br>
<a href="logout.php" class="btn btn-primary">LOG OUT</a></div>




<table class="table table-striped table-dark table-condensed table-hover table-bordered">
		   <thread>
			<tr>
			  <th style="text-align:center;" scope="col">program code</th>
			  <th style="text-align:center;" scope="col">program name</th>
        
			</tr>
		   </thread>
		   <tbody>'|
	<?php
include('../connection.php');
$q = "SELECT * FROM `program` WHERE 1";
$r = mysqli_query($db,$q);
while($a = mysqli_fetch_array($r)){
	echo('<tr>');
	echo('<td>'.$a['p_code'].'</td>');
		echo('<td>'.$a['p_name'].'</td>');
	
echo("</tr>");
}


?>





</form>
</div>
</body>
</html>

<?php
if(isset($_POST['clgid']) && isset($_POST['name']) ){
	include('../connection.php');
	$clgid = $_POST['clgid'];
	$name = $_POST['name'];
$dcode = $_POST['dcode'];
   // $intLng = !empty($intLng) ? "'$intLng'" : "NULL";
	$sq1 = 'INSERT INTO `program`(`p_code`, `p_name`) VALUES ("'.$clgid.'", "'.$name.'")';


	mysqli_query($db,$sq1);
	
	//$subject="USERNAME & PASSWORD";
	//$message="YOUR USERNAME IS $clgid & PASSWORD IS $random_string";

	header('location:add_program.php');
}
?>