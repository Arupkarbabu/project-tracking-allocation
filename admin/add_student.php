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
University/College  </h1>
   	        </div>
	 </div>
 <div class="row">
 	<h2 style="text-align:center">STUDENT ADD SECTION </h2></br></br>

 </div>
    	 <div class="row" style="text-align:right;font-family:Montserrat;font-size:100%;">
                <div class="col-md-6 col-md-offset-3">
			<div style="min-height:300px;background-color:#7f8c8d;padding-top:15%;border-radius:5px;">

	<?php 
if(isset($_GET['flg']))
{
	if($_GET['flg']==="true")
	{
		echo("Successfully added ".$_GET['clgid']);
	}
}
?>

<form action = "add_student.php" method = "POST">
 <div class="form-group">
 	<label for="name">Name:</label>
 	  <input type = "text" name ="name" placeholder="name surname"></br>
 	     <label for="clgid">Rollno:</label>
  <input type = "text" name ="clgid" placeholder="CSB17031"></br>
         <label for="cpi">CGAP:</label>
  <input type = "text" name ="cpi" placeholder="9.8"></br>
  <label for="sem">Semester:</label>
  <input type = "text" name ="sem" placeholder="1"></br>

  <label for="email">Email:</label>
  <input type = "text" name ="email" placeholder="abc@gmail.com"></br>

  <label for="prg_code">program:</label>
  <select name ="prg_code">
						<option >BTECH</option>
						<option >MCA</option>
						<option >MTECH</option>
				
		</select></br>
		<label for="drg_code">DEPARTMENT:</label>
         <select name ="drg_code">
						<option >CIB</option>
						<option >CSE</option>
						<option >EIB</option>
						<option >FET</option>
						<option >MEB</option>
					
		
				
		</select></br>


<button type="submit" value="add student" class="btn btn-success">Submit</button>
 </div>
 <div id="footer"><a href="home.php" class="btn btn-primary" >HOME</a><br>
<a href="logout.php" class="btn btn-primary">LOG OUT</a></div>
</form>
</div>
</body>
</html>






<?php
if(isset($_POST['clgid']) && isset($_POST['name']) && isset($_POST['cpi']) && isset($_POST['sem'])&& isset($_POST['prg_code']) && isset($_POST['drg_code']) ){
	include('../connection.php');
	$clgid = $_POST['clgid'];
	$name = $_POST['name'];
	//$bdate = $_POST['bdate'];
	$cpi = $_POST['cpi'];
	$sem = $_POST['sem'];
	$email=$_POST['email'];
	$prg_code = $_POST['prg_code'];
	$drg_code = $_POST['drg_code'];
	$random_string="";
	for($i=0;$i<10;$i++)
	{
		$random_string .= chr(rand(65,90));
	}
	$prg=-1;
	$sq1 = 'INSERT INTO `studentdata1` (`clgid`, `mname`,`cpi`, `sem` ,`email`,`password`,`prg_code`,`drg_code`) VALUES ("'.$clgid.'", "'.$name.'","'.$cpi.'", "'.$sem.'","'.$email.'","'.$random_string.'","'.$prg_code.'","'.$drg_code.'")';


	mysqli_query($db,$sq1);
	$to=$email;
	//$subject="USERNAME & PASSWORD";
	//$message="YOUR USERNAME IS $clgid & PASSWORD IS $random_string";

	header('location:add_student.php?flg=true&clgid='.$clgid);
}
?>