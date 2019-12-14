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
 	<h2 style="text-align:center">FACULTY ADD SECTION </h2></br></br>

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



<form action = "add_faculty.php" method = "POST">
 <div class="form-group">
 	<label for="fname">Name:</label>
 	  <input type = "text" name ="fname" placeholder="name surname"></br>

 	     <label for="sname">short name</label>
  <input type = "text" name ="sname" placeholder="Ex:TVR"></br>


</select>
		<label for="df_code">DEPARTMENT:</label>
         <select name ="df_code">
						<option >CIB</option>
						<option >CSE</option>
						<option >EIB</option>
						<option >FET</option>
						<option >MEB</option>
					
		
				
		</select></br>





  <label for="email">Faculty Email:</label>
  <input type = "text" name ="email" placeholder="Ex: abc@gmail.com"></br>

<button type="submit" value="add faculty" class="btn btn-success">Submit</button>
 </div>



 <div id="footer"><a href="home.php" class="btn btn-primary" >HOME</a><br>
<a href="logout.php" class="btn btn-primary">LOG OUT</a></div>

</form>
</div>
</body>
</html>



<?php

if ((isset($_POST['email'])))
{
	$random_string="";
	for($i=0;$i<10;$i++)
	{
		$random_string .= chr(rand(65,90));
	}
	include("../connection.php");
	$query = 'INSERT INTO `facultydata1` (`email`,`password`,`fname`,`sname` ,`df_code`) VALUES ("'.$_POST['email'].'","'.$random_string.'", "'.$_POST['fname'].'","'.$_POST['sname'].'","'.$_POST['df_code'].'")';
	$result = mysqli_query($db,$query)
	or die("sql query".mysqli_error($db));
	
	$to=$_POST['email'];
	$message="your USERNAME IS ".$_POST['email']." password is".$random_string;
	$subject="Project Allocation System";

	header('location:add_faculty.php?flg=true&email='.$_POST['email']);
}
?>