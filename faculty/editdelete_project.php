<?php
session_start();
if(!isset($_SESSION['faculty_id']))
 die(header("location:index.php?msg=YOU ARE NOT LOGGED IN"));
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
			<h1 style='text-align:center; color:white;font-family:Montserrat; '>PROJECT  DATA </h1>

			<a href="home.php" class="btn btn-primary"  style="position:fixed;right:1%;top:6.5%;color:white;font-size:140%;text-decoration:none;">HOME</a>


			<a href="logout.php" class="btn btn-primary" >LOG OUT</a>
   	        </div>
	 </div>


<div style="text-align:center">

<table class="table table-striped table-dark table-condensed table-hover table-bordered">
		   <thread>
			<tr>
			  <th style="text-align:center;" scope="col">Project Id </th>
			  <th style="text-align:center;" scope="col">project Title</th>
			  <th style="text-align:center;" scope="col">Project Field</th>
			   <th style="text-align:center;" scope="col">Delete</th>
			  <th style="text-align:center;" scope="col">Edit</th>
			  
        
			</tr>
		   </thread>
		   <tbody>');








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

			/*if ($a['enable']=='1' )
			{
				echo '<form action="unenable_project.php"><input type="hidden" name="id" value="'.$a['pid'].'"><input type="submit" value="disable"></form>';
			}
			else
			{
				echo '<form action="enable_project.php"><input type="hidden" name="id" value="'.$a['pid'].'"><input type="submit" value="enable"></form>';
			}*/
			echo '<td><form action="delete_project.php">
			<input type="hidden" name="id" value="'.$a['pid'].'">
			<input type="submit" value="delete"></form></td><td>
			<form action="edit_project.php">
			<input type="hidden" name="id" value="'.$a['pid'].'">
			<input type="submit" value="edit"></form></td>'; 
			//echo '<br/>';
			echo("</tr>");
		}
	}
	



?>
</table>
</center>
</body>
</html>