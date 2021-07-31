<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
  if(strlen($_SESSION['cpfursbid']==0)) {
  header('location:logout.php');
  } else {

?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Curricular Portal for University of Rizal System Binangonan Campus: Dashboard</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
  </head>


  <?php include_once ('includes/header.php');?>
  <?php include_once ('includes/sidebar.php');?>
  <body>
    <div class="am-pagetitle">
        <h5 class="am-title">Dashboard</h5>
      </div><!-- am-pagetitle -->
      <div class="am-mainpanel">
      <div class="am-pagebody">
        <div class="row row-sm">
          <div class="col-lg-12">
            <div class="card">
              <div id="rs1" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div><?php
$uid=$_SESSION['cpfursbid'];
$sql="SELECT FirstName,LastName from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{              ?>
                  <h4>Welcome to Our System ||<?php  echo $row->FirstName;?> <?php  echo $row->LastName;?></h4><?php $cnt=$cnt+1;}} ?>
                    
                  </div>
                                  </div><!-- d-flex -->
               
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->
         
          
        </div><!-- row -->



      </div><!-- am-pagebody -->
     <?php include_once('includes/footer.php');?>
    </div><!-- am-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/d3/d3.js"></script>
    <script src="lib/rickshaw/rickshaw.min.js"></script>
    <script src="lib/gmaps/gmaps.js"></script>
    <script src="lib/Flot/jquery.flot.js"></script>
    <script src="lib/Flot/jquery.flot.pie.js"></script>
    <script src="lib/Flot/jquery.flot.resize.js"></script>
    <script src="lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="js/amanda.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
  </body>
</html>
<?php } ?>