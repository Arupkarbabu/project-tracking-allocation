






<!DOCTYPE html>
<html>
<head>
    <title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style>
	input {
            margin-right:35%;
	    border-radius:5px;
            width:250px;
        }
        button {
    	    margin-right:35%;
        }
</style>
</head>
<body>





    <div class="container-fluid">
	 <div class="row">
		<div style="height:16%;background-color:#4285f4;padding:0.3% 0;">
			<h1 style='text-align:center;color:white;font-family:Montserrat;'>An information system to keep track of the students’ project of an
University</h1>
		<a href="../index.php" class="btn btn-primary"  style="position:fixed;right:1%;top:6.5%;color:white;font-size:140%;text-decoration:none;">HOME</a>
   	        </div>
	 </div>
	 <div class="row">
		<h2 style="text-align:center">Student Search Section</h2></br></br>
    	 </div>
	 <div class="row" style="text-align:right;font-family:Montserrat;font-size:100%;">
        	<div class="col-md-10 col-md-offset-1">
			<div style="min-height:200px;background-color:#7f8c8d;padding-top:15%;border-radius:5px;">
				<form action = "" method = "POST">
                       		     <div class="form-group">
	    	  				<label for="roll_no">Enter Student Roll No:</label>
						<input type = "text" name ="roll_no" placeholder="Student Roll No"></br>





    	    		        		<button type="submit" name="getdata" class="btn btn-success">Submit</button>
				     </div>
				</form>

<div style="text-align:center">

<table class="table table-striped table-dark table-condensed table-hover table-bordered">
		   <thread>
			<tr>
			  <th style="text-align:center;" scope="col">Rollno</th>
			  <th style="text-align:center;" scope="col">Name</th>
			  <th style="text-align:center;" scope="col">CGPA</th>
			   <th style="text-align:center;" scope="col">Project Name</th>
			  <th style="text-align:center;" scope="col">Project Field</th>
			  <th style="text-align:center;" scope="col">Project Report</th>
 			 <th style="text-align:center;" scope="col">Faculty Name</th>
			  <th style="text-align:center;" scope="col">Faculty short name</th>
			    <th style="text-align:center;" scope="col">Email</th>


   	
			</tr>
		   </thread>
		   <tbody>




<?php

session_start();

    if(isset($_POST['getdata'])) {
        
        $roll_no = $_POST['roll_no'];

        $servername = "localhost";
		$username = "root";
		$password = "";



$db= mysqli_connect($servername, $username, $password);
	if (!$db )
			die( "Couldn't connect to MySQL: " .mysql_error());

	
	$db_selected =mysqli_select_db($db ,'project_allocation');
		
if (!$db_selected)
  {
  printf("Can\'t use test_db : ");
  }


  

        $sq1="SELECT * FROM  allocation, projectdata1 ,report ,research_field where allocation.rollno='$roll_no'  AND  allocation.fiid = projectdata1.f_id  AND projectdata1.pid= report.kpid AND projectdata1.pid=research_field.rid";
   
    

        $r = mysqli_query($db,$sq1)
        or die('aaa'.mysqli_error($db));
    
    $a = mysqli_fetch_array($r);

    if($a['rollno']===$roll_no){
echo('<td>'.$a['rollno'].'</td>');
echo('<td>'.$a['aname'].'</td>');
echo('<td>'.$a['cpi'].'</td>');
echo('<td>'.$a['name'].'</td>');
echo('<td>'.$a['rname'].'</td>');
echo('<td>'.$a['rreport'].'</td>');


echo('<td>'.$a['fname'].'</td>');
echo('<td>'.$a['sname'].'</td>');
echo('<td>'.$a['email'].'</td>');





}
//set ke lia
}
?>




</div>
	       			</div>
			</div>
 	 </div>
    </div>

    
</body>
</html>
