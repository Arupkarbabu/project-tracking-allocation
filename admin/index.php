<?php


include('../connection.php');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>


<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <title>Faculty Login </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xm-12 col-md-offset-4" style="padding-top:100px ">
            <form action="" method="post">
                <div class="panel panel-success">
                     <div class="panel-heading">
                        LOGIN
                           </div>
                          <div class="panel-body">
                            <div class="form-group">
                              <label>Email</label>  
                            <input type="text" name="username"   placeholder=" type your email  " class="form-control">
</div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="password" placeholder=" type your password" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="btnSubmit" value="submit" class="form-control btn btn-success" >
                        

                    </div>
                    </div>

                </div>
                <a href="../index.php" class="btn btn-primary">HOME</a>

    <p>Don't have an account please contract technical .</p>

            </form>
            

        </div>
        


    </div> 


</div>




</body>
</html>





















