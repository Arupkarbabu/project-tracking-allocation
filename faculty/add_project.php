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
 <div class="row">
 	<h2 style="text-align:center">PROJECT ADD SECTION </h2></br></br>

 </div>
    	 <div class="row" style="text-align:right;font-family:Montserrat;font-size:100%;">
                <div class="col-md-6 col-md-offset-3">
			<div style="min-height:300px;background-color:#7f8c8d;padding-top:15%;border-radius:5px;">

<?php
if(isset($_GET['msg'])){
	echo($_GET['msg']);
}
if(isset($_GET['flg']))
{
	if($_GET['flg']==="true")
	{
		echo("Successfully added ");
	}
}
?>




<form action = "add_project.php" method = "POST">
 <div class="form-group">
 	<label for="name">Project Name:</label>
 	  <input type = "text" name ="name" placeholder="name "></br>

 	     <label for="language">project_field</label>
  <input type = "text" name ="language" placeholder="Ex:TVR"></br>

<button type="submit" value="add project" class="btn btn-success">Submit</button>
 </div>



 <div id="footer"><a href="home.php" class="btn btn-primary" >HOME</a><br>
<a href="logout.php" class="btn btn-primary">LOG OUT</a></div>

</form>
</body>
<table class="table table-striped table-dark table-condensed table-hover table-bordered">
		   <thread>
			<tr>
			  <th style="text-align:center;" scope="col">project  id </th>
			  <th style="text-align:center;" scope="col">project Name</th>
			  <th style="text-align:center;" scope="col">project field</th>
			 
			            
			</tr>
		   </thread>
		   <tbody>'|


<?php
//session_start();
$fid = $_SESSION['faculty_id'];

	//echo "<br>";	
		include('../connection.php');
	//$connection=new PDO('mysql:host=localhost;dbname=project_allocation','root','root');
	//if($connection==null)
	//{
	//	echo "Failed to obtain connection please try again";
	//	die();
	//}

	$sq1 = "SELECT * FROM projectdata1 , research_field  where  projectdata1.pid=research_field.rid";
	//$query=$connection->prepare($sq1);
	//$row=$query->execute();
	$r = mysqli_query($db,$sq1)
	or die('aaa'.mysql_error());
	
	while($a = mysqli_fetch_array($r))
	{
	
		if($a['f_id']===$fid){
			echo("<tr>");
			echo '<td>'. $a['pid' ].' </td>
			<td>'. $a['name' ].' </td>
			<td>'.$a['rname'].'</td>';
 
			//echo '<br/>';
			echo("</tr>");
		}
	}
	



?>









</form>
</div>
</div>
</div>

</html>

<?php
if((isset($_POST['name'])))
{
//	$connection=new PDO('mysql:host=localhost;dbname=project_allocation','root','root');
//	if($connection==null)
//	{
//		echo "Failed to obtain connection please try again";
//		die();
//	}
include('../connection.php');
	$name = $_POST['name'];

	


	$language = $_POST['language'];
	$fid = $_SESSION['faculty_id'];
	$snk = 1;


	$sq1 = 'INSERT INTO `projectdata1` (`name`,`f_id`,`enable`) VALUES ("'.$name.'","'.$fid.'", "'.$snk.'")';
	//$query=$connection->prepare($sq1);
	//$query->execute();
	//print_r ($query->errorInfo());
	mysqli_query($db,$sq1);
	$q = "SELECT * FROM `facultydata1` WHERE `fid`='".$fid."'";
	$r = mysqli_query($db,$q);
	$asdf = 1;
	$a = mysqli_fetch_array($r);
    $a = 1;
	$sq2 = 'INSERT INTO `research_field` (`rname`) VALUES ("'.$language.'")';
	//$qqq = "UPDATE `facultydata1` SET `no_project`='".($a['no_project']-$asdf)."' WHERE `fid` = '".$fid."'";
	//echo('<br>'.$qqq);	
	//mysqli_query($db,$qqq)
	//or die(mysqli_error($db));
	mysqli_query($db,$sq2);
	header('location:add_project.php?flg=true');
}
?>

