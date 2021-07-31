<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fn=$_POST['fn'];
    $ln=$_POST['ln'];
    $studno=$_POST['studno'];
    $add=$_POST['address'];
    $college=$_POST['college'];
    $course=$_POST['course'];
    $password=$_POST['password'];
    $ret="select StudentNum from tbluser where StudentNum=:studno";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':studno', $studno, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FirstName,LastName,StudentNum,Address,College,Course,Password)Values(:fn,:ln,:studno,:add,:college,:course,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fn',$fn,PDO::PARAM_STR);
$query->bindParam(':ln',$ln,PDO::PARAM_STR);
$query->bindParam(':studno',$studno,PDO::PARAM_INT);
$query->bindParam(':college',$college,PDO::PARAM_STR);
$query->bindParam(':course',$course,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have signup  Succesfully');</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{

echo "<script>alert('This Mobile Number already exist. Please try again');</script>";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1
    /css/bootstrap.min.css">
  </head>

  <body>

    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <div>
              <h2>Curricular Portal for University of Rizal System Binangonan Campus</h2>
              <p>Nurturing Tommorow's Noblest</p>

              <hr>
              <p><br> <a href="../index.php">Back Home</a></p>
            </div>
          </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">Student Registration Form</h5>
 <form class="form-auth-small" action="" method="post">
            <div class="form-group">
              <label class="form-control-label">First Name:</label>
              <input type="text" class="form-control" placeholder="Enter First Name." required="true" name="fn" value="" >
            </div><!-- form-group -->
            <div class="form-group">
              <label class="form-control-label">Last Name:</label>
              <input type="text" class="form-control" placeholder="Enter Last Name" required="true" name="ln" value="" >
            </div><!-- form-group -->
            
            <div class="form-group">
              <label class="form-control-label">Student Number:</label>
              <input type="text" class="form-control" placeholder="Student Number" required="true" name="studno" pattern="[0-9]+" maxlength="10" minlength="10">
            </div>
            <div class="form-group">
              <label class="form-control-label">Address:</label>
              <input type="text" class="form-control" placeholder="Address" required="true" name="address" value="" >
            </div>
            <div class="form-group">
            <label class="form-control-label">College:</label>
                <select  type="text" class="form-control college selectFilter" data-target="course" name="college"required='true'>
                    <option value="" hidden >--Select College--</option>
                    <option data-ref="coa">College of Accountancy</option>
                    <option data-ref="cob">College of Business</option>
                    <option data-ref="ccs">College of Computer Studies</option>
                </select>
            </div>
            <div class="form-group">
            <label class="form-control-label">Course:</label>
                <select class="form-control course selectFilter" name="course"required="true">
                    <option value="" hidden>--Select Course--</option>
                    <option data-belong="coa">Bachelor of Science in Accountacy </option>
                    <option data-belong="cob">Bachelor of Science in Business Adminstration (FM)</option>
                    <option data-belong="cob">Bachelor of Science in Business Adminstration (HRM) </option>
                    <option data-belong="cob">Bachelor of Science in Business Adminstration (MM) </option>
                    <option data-belong="cob">Bachelor of Science in Office Adminstration </option>
                    <option data-belong="ccs">Bachelor of Science in Information Technology </option>
                    <option data-belong="ccs">Bachelor of Science in Information System</option>
                </select>
               </div> 
            
            
            
            <div class="form-group">
              <label class="form-control-label">Password:</label>
              <input type="password" class="form-control" placeholder="Password" name="password" required="true" value="">
            </div>
            <!-- form-group -->
            <button type="submit" class="btn btn-block" name="submit">Sign Up</button>
             <div class="form-group mg-b-20" style="padding-top: 20px"><a href="login.php">Do you have an account ? || Sign In</a></div>
          </div>
         </form>
        </div><!-- row -->
        <p class="tx-center tx-white-5 tx-12 mg-t-15">Copyright &copy; 2021. All Rights Reserved. Curricular Portal for University of Rizal System Binangonan</p>
      </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/amanda.js"></script>

    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Popper JS-->
    <script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled Javascript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="./js/selectFilter.min.js"> </script>
  </body>
</html>
