<?php
session_start();
if(!isset($_SESSION['studentid']))
 die(header("location:student_home.php?flg=redirect"));
$var = $_SESSION['studentid'];
?>


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
			<h1 style='text-align:center; color:white;font-family:Montserrat; '>PROJECT LIST </h1>

			<a href="./index.php" class="btn btn-primary"  style="position:fixed;right:1%;top:6.5%;color:white;font-size:140%;text-decoration:none;">HOME</a>


			<a href="logout.php" class="btn btn-primary" >LOG OUT</a>
   	        </div>
	 </div>


<div style="text-align:center">

<table class="table table-striped table-dark table-condensed table-hover table-bordered">
		   <thread>
			<tr>
			  <th style="text-align:center;" scope="col">Faculty name</th>
			  <th style="text-align:center;" scope="col">Short name</th>
			  <th style="text-align:center;" scope="col">Email</th>
			   <th style="text-align:center;" scope="col">project Id</th>
			  <th style="text-align:center;" scope="col">Project Name</th>
			  <th style="text-align:center;" scope="col">Research field</th>
			  <th style="text-align:center;" scope="col">Department</th>
   	
			</tr>
		   </thread>
		   <tbody>





<?php

//session_start();
$fid = $_SESSION['studentid'];

	//$connection=new PDO('mysql:host=localhost;dbname=project_allocation','root','root');
	//if($connection==null)
	//{
	//	echo "Failed to obtain connection please try again";
	//	die();
	//}
include('../connection.php');
$sq1= " SELECT  * FROM  studentdata1,projectdata1 ,facultydata1 ,department,research_field ,program ,com  WHERE 
studentdata1.prg_code= program.p_code AND studentdata1.drg_code= department.d_code AND program.p_code=com.pc AND department.d_code=com.dc AND  department.d_code=facultydata1.df_code  AND facultydata1.fid=projectdata1.f_id AND projectdata1.pid =research_field.rid";

//studentdata1.prg_code=program.p_code AND program.dcode=department.d_code";
	//$sq1 = "SELECT * FROM projectdata1 , research_field  where  projectdata1.pid=research_field.rid";
	//$query=$connection->prepare($sq1);
	//$row=$query->execute();
	$r = mysqli_query($db,$sq1)
	or die('aaa'.mysqli_error($db));
	
	while($a = mysqli_fetch_array($r))
		{

		

	
	
		if($a['studentid']===$fid){


         //$sql2 = " SELECT  * FROM  allocation;
       

			echo '<td>'. $a['fname' ].' </td><td>'. $a['sname' ].'</td><td>'.$a['email'].'</td><td>'.$a['pid' ].'</td><td>'.$a['name' ].'</td><td>'. $a['rname' ].'</td><td>'. $a['df_code' ].'</td></td>';

			//echo '<td>'. $a['pid' ].' </td><td>'. $a['name' ].'</td><td>'. $a['name' ].'</td><td>';
   

                

                $rk= mysqli_query($db,$sq1)
                or die('aaa'.mysqli_error($db));
                  
                  $k = mysqli_fetch_array($rk);
                 $p=$a['clgid'];
                  $t=$a['mname'];
                  $g=$a['cpi'];
                
                    $j=$a['name'];
                    $l=$a['rname'];
                  $h=$a['fname'];
                  $i=$a['sname'];
                   $q=$a['email'];
                    $pp=$a['fid'];
                 
               
                 
 $aq="SELECT * FROM allocation where  allocation.rollno='$p'";
           $ll = mysqli_query($db,$aq)

	or die('aaa'.mysqli_error($db));

 $data = mysqli_fetch_array($ll, MYSQLI_NUM);
 if($data[0] >1) {
    echo "<br/>";
}

else
{

   $sql3="INSERT INTO allocation(rollno,aname,cpi,pname,rname,fname,sname,email,fiid)VALUES('".$p."','".$t."','".$g."','".$j."','".$l."','".$h."','".$i."','".$q."','".$pp."')";
        

$result = $db->query($sql3);
        if ($result === TRUE){
         	echo "You are now registered<br/>";
         }
         else
    {
        echo "Error adding user in database<br/>";
    }
  
}
  

			/*if ($a['enable']=='1' )
			{
				echo '<form action="unenable_project.php"><input type="hidden" name="id" value="'.$a['pid'].'"><input type="submit" value="disable"></form>';
			}
			else
			{
				echo '<form action="enable_project.php"><input type="hidden" name="id" value="'.$a['pid'].'"><input type="submit" value="enable"></form>';
			}*/
		
			//echo '<br/>';
			echo("</tr>");

		


		
	

	
}
}

?>

 
<div style="text-align:center">

<form action = "student_home.php" method = "POST">
 <div class="form-group">
 	<br>
 	<label for="pid">PROJECT ID :</label>

 	  <input type = "text" name ="pid" placeholder="ex:1"></br>
 	  <br>
 	  <label for="language">PROJECT _REPORT :: </label>
 	      <textarea name="language" rows="7" cols="50">
 	      </textarea>
  

<button type="submit" value="add report" class="btn btn-success">Submit</button>
<br>
<br>
 </div>
</form>
</tbody>

</div>
</tbody>
</table>
</div>
</div>

<?php

if(isset($_POST['pid'])&& isset($_POST['language']))
{


$pid=$_POST['pid'];
$language=$_POST['language'];

include('../connection.php');
$sq1= " SELECT  * FROM  allocation WHERE allocation.pid='$pid'";
 $r = mysqli_query($db,$sq1)
	or die('aaa'.mysqli_error($db));
	
$a = mysqli_fetch_array($r);

    
	
	$sql2='INSERT INTO `report` (kpid,rreport) VALUES ( "'.$pid.'","'.$language.'")';
	mysqli_query($db,$sql2);
		header('location:student_home.php?flg=true');
	
	
}

?>











</center>
</body>
</html>