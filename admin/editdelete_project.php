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
			<h1 style='text-align:center; color:white;font-family:Montserrat; '>PROJECT  DATA </h1>

			<a href="home.php" class="btn btn-primary"  style="position:fixed;right:1%;top:6.5%;color:white;font-size:140%;text-decoration:none;">HOME</a>


			<a href="logout.php" class="btn btn-primary" >LOG OUT</a>
   	        </div>
	 </div>

<?php 
	//session_start();
	if(isset($_GET['msg'])){
		echo $_GET['msg'];
		echo("<br>");
		}
		
?>

<div style="text-align:center">

<table class="table table-striped table-dark table-condensed table-hover table-bordered">
		   <thread>
			<tr>
			  <th style="text-align:center;" scope="col">Project ID </th>
			  <th style="text-align:center;" scope="col">Project title</th>
			  <th style="text-align:center;" scope="col">Project field</th>
			  <th style="text-align:center;" scope="col">Faculty Name</th>
			   <th style="text-align:center;" scope="col">Faculty Email</th>
			   <th style="text-align:center;" scope="col">Department</th>

			   <th style="text-align:center;" scope="col">Enable/Disable</th>
			     <th style="text-align:center;" scope="col">Delete</th>
			  <th style="text-align:center;" scope="col">Edit</th>
			
        
			</tr>
		   </thread>
		   <tbody>');


<?php
echo("<tr>");
	//echo "<br>";	
		include('../connection.php');
	//$connection=new PDO('mysql:host=localhost;dbname=project_allocation','root','root');
	//if($connection==null)
	//{
	//	echo "Failed to obtain connection please try again";
	//	die();
	//}

	$sq1 = "SELECT * FROM projectdata1 , research_field ,facultydata1 where  projectdata1.pid=research_field.rid AND projectdata1.f_id=facultydata1.fid";
	//$query=$connection->prepare($sq1);
	//$row=$query->execute();
	$r = mysqli_query($db,$sq1)
	or die('aaa'.mysql_error());
	
	while($a = mysqli_fetch_array($r))
	{
		
		      
		

			echo '<td>'. $a['pid' ].' </td><td>'. $a['name' ].'</td><td>'. $a['rname' ].'</td><td>'. $a['fname' ].'</td><td>'. $a['email' ].'</td><td>'. $a['df_code' ].'</td><td>';



			if ($a['enable']=='1')
			{
				echo '<form action="unenable_project.php"><input type="hidden" name="id" value="'.$a['pid'].'"><input type="submit" value="disable"></form>';
			}
			else
			{
				echo '<form action="enable_project.php"><input type="hidden" name="id" value="'.$a['pid'].'"><input type="submit" value="enable"></form>';
			}
			echo '</td><td><form action="delete_project.php"><input type="hidden" name="id" value="'.$a['pid'].'"><input type="submit" value="delete"></form></td><td>
			<form action="edit_project.php"><input type="hidden" name="id" value="'.$a['pid'].'"><input type="submit" value="edit"></form></td>'; 
			//echo '<br/>';
			echo("</tr>");
		
	}
	



?>
</table>
</div>
<br>
</center>
</body>
</html>