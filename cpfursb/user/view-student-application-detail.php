<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cpfursbid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Curricular Portal for University of Rizal System Binangonan Campus</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
    <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
  </head>

  <body>

<?php
include_once('includes/header.php');
include_once('includes/sidebar.php');

 ?>


    <div class="am-pagetitle">
      <h5 class="am-title">Student Dean's Form Details</h5>
     
    </div><!-- am-pagetitle -->

    <div class="am-mainpanel">
      <div class="am-pagebody">

      <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4" id="divToPrint">
              <h2 style="text-align: center;color: black">Student Dean's Lister Form</h2>
        

            <?php
                               $vid=$_GET['viewid'];

$sql="SELECT tblregistration.*,tbluser.FirstName,tbluser.LastName,tbluser.StudentNum from  tblregistration join  tbluser on tblregistration.UserID=tbluser.ID where tblregistration.ID=:vid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{  ?>
            
          <table border="1" class="table table-bordered">
 
  <tr align="center">
    <th scope style="text-align: justify;">Last Name</th>
    <td><?php  echo strtoupper($row->LastName);?></td>
    <th scope>First Name: </th>
    <td><?php  echo strtoupper($row->FirstName);?></td>
    <th >Student Number: </th>
    <td><?php  echo $row->StudentNum;?></td>
    <td rowspan="2" style="text-align: center;"><img src="../user/images/<?php echo $row->Picture;?>"style="text-align: center;" width="200" height="200"><br />
Photo of Groom</td>
  </tr>
   
  <tr align="center">
  <th scope>Semester: </th>
    <td><?php  echo strtoupper($row->Semester);?></td>
    <th scope>School Year: </th>
    <td><?php  echo strtoupper($row->SchoolYR);?></td>
    <th scope>Course, Year & Section: </th>
    <td><?php  echo $row->CYS;?></td>
  </tr>
  <tr>
    <th scope>Address: </th>
    <td colspan="8"><?php  echo strtoupper($row->Address);?></td>
  </tr>
  <tr>
  <th scope>Birthday: </th>
    <td ><?php $row->Birthday;?></td>
    <th scope>Birth Place: </th>
    <td colspan="2"><?php  echo strtoupper($row->Birthplace);?></td>
    <th scope>Sex: </th>
    <td><?php  echo strtoupper($row->Sex);?></td>
  </tr>
  <tr>
  <th scope>Age: </th>
    <td ><?php  echo strtoupper($row->Age);?></td>
    <th scope>Email Address: </th>
    <td colspan="2"><?php  echo strtoupper($row->Email);?></td>
    <th scope>Contact Number: </th>
    <td><?php  echo $row->Contact;?></td>
  </tr>
  <tr>
  <th scope>Org Affiliation: </th>
    <td ><?php  echo strtoupper($row->Org);?></td>
    <th scope>Position: </th>
    <td colspan="2"><?php  echo strtoupper($row->Position);?></td>
    <th scope>Name of Guardian: </th>
    <td><?php  echo strtoupper($row->Guardian);?></td>
  </tr>
  <tr>
  <th scope>Relationship: </th>
    <td ><?php  echo strtoupper($row->Relationship);?></td>
    <th scope>Report of Rating: </th>
    <td colspan="2"><?php  echo strtoupper($row->Position);?></td>
    <th scope>Good Moral: </th>
    <td><?php  echo $row->Email;?></td>
  </tr>
  <tr>
    
    <th colspan="2">Order Final Status</th>

   <td colspan="2"> <?php  $status=$row->Status;
   
if($row->Status=="Verified")
{
 echo "Your application has been verified";
}

if($row->Status=="Rejected")
{
echo "Your application has been cancelled";
}


if($row->Status=="")
{
 echo "Pending";
}

    ;?></td>
    <th colspan="2">Admin Remark</th>
   <?php if($row->Status==""){ ?>

                    <td colspan="4"><?php echo "Your application has still pending"; ?></td>
<?php } else { ?>                  <td colspan="4"><?php  echo htmlentities($row->Status);?>
                 </td>
                 <?php } ?>
 </tr>

 <?php $cnt=$cnt+1;}} ?>
</table>
<?php 

if ($status==""){
?> 
<p align="center"  style="padding-top: 20px">                            
<button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                               <div class="modal-body">
                                               <table class="table table-bordered table-hover data-tables">

                               <form method="post" name="submit">

                               
                              
    <tr>
   <th>Remark :</th>
   <td>
   <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control" required="true"></textarea></td>
 </tr> 
  

 <tr>
   <th>Status :</th>
   <td>

  <select name="status" class="form-control" required="true" >
    <option value="Verified" selected="true">Verified</option>
    <option value="Rejected">Rejected</option>
  </select></td>
 </tr>
</table>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" name="submit" class="btn btn-primary">Update</button>
 
 </form>
 
             
                </div><!-- row -->
          </div><!-- table-wrapper -->
        

    
      </div><!-- am-pagebody -->
     <?php include_once('includes/footer.php');?>
    </div><!-- am-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/datatables/jquery.dataTables.js"></script>
    <script src="lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    <script src="js/amanda.js"></script>
  </body>
    </html>
<?php }?>