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
            <form action="verification.php" method="post">
                <div class="panel panel-success">
                     <div class="panel-heading">
                        LOGIN
                           </div>
                          <div class="panel-body">
                            <div class="form-group">
                              <label>Email</label>  
                            <input type="email" name="uname"   placeholder=" type your email  " class="form-control">
</div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="pass" placeholder=" type your password" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="btnSubmit" value="login" class="form-control btn btn-success" >
                        

                    </div>
                    </div>

                </div>
                <a href="../index.php" class="btn btn-primary">HOME</a>
<input type ="button" VALUE="Back"  class="btn btn-primary"  onClick="history.go(-1);">
    <p>Don't have an account please contract admin.</p>
            </form>
            

        </div>
        


    </div> 


</div>




</body>
</html>