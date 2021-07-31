<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) {
  $studno = $_POST['studno'];
  $password = $_POST['password'];
  $sql = "SELECT ID FROM tbluser WHERE StudentNum=:studno and Password=:password";
  $query=$dbh->prepare($sql);
  $query->bindParam(':studno', $studno,PDO::PARAM_STR);
  $query->bindParam(':password', $password,PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
    
  if($query->rowCount() > 0) {
      foreach($results as $result){
        $_SESSION['cpfursbid']=$result->ID;
      }
    
      $_SESSION['login']=$_POST['studno'];
      echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
      } 
      else {
        echo "<script>alert('Invalid Details');</script>";
      }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Curricular Portal for University of Rizal System Binangonan Campus</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
  </head>

  <body>

    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <div>
              <h2>Curricular Portal for University of Rizal System Binangonan Campus</h2>
              <p>Welcome to Student Panel </p>
              <p>Nurturing Tommorow's Noblest.</p>

              <hr>
              <p><br> <a href="../index.php">Back Home</a></p>
            </div>
          </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">Sign In to Your Account</h5>
 <form class="form-auth-small" action="" method="post">
            <div class="form-group">
              <label class="form-control-label">Student Number:</label>
              <input type="text" class="form-control" placeholder= "Enter Student Number" required="true" name="studno" maxlength="10" pattern="[0-9]+" minlength="10" >
            </div><!-- form-group -->

            <div class="form-group">
              <label class="form-control-label">Password:</label>
              <input type="password" class="form-control" placeholder="Enter Password" name="password" required="true" value="">
            </div><!-- form-group -->
<div class="form-group mg-b-0" style="padding-top: 0px"><a href="forgot-password.php">Reset password</a></div>
           

            <button type="submit" class="btn btn-block" name="login">Sign In</button>
             <div class="form-group mg-b-20" style="padding-top: 5%"><a href="signup.php">Not registered yet | Click here for registration </a></div>
          </div>
         </form>
        </div><!-- row -->
        <p class="tx-center tx-white-5 tx-12 mg-t-15">Copyright &copy; 2021. Curricular Portal for University of Rizal System Binangonan Campus</p>
      </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/amanda.js"></script>
  </body>
</html>
