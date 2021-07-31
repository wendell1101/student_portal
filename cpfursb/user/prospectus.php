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
    <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
    <link rel="stylesheet" href="css/table2.css">
  </head>

  <body>

<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>

 


    <div class="am-pagetitle">
      <h5 class="am-title">Prospectus</h5>
     
    </div><!-- am-pagetitle -->

    <div class="am-mainpanel">
      <div class="am-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title" style="font-size: 20px">Prospectus</h6>
          <body>
<center>
    <br>
    <br>
    <h3>First Year</h3>
    <div class="row">
       <div class="column">
       <p><strong>First Semester</strong></p>
          <table>
            <tr>
              <th>Grade</th>
              <th>Course Code</th>
              <th>Instructor</th>
            </tr>
            <tr>
              <td>1.0</td>
              <td>Self 1</td>
              <td>Prof Ewan</td>
            </tr>
            <tr>
              <td>2.4</td>
              <td>Math 1</td>
              <td>Prof Bahala</td>
            </tr>
            <tr>
              <td>2.2</td>
              <td>Eng 1</td>
              <td>Prof Balyena</td>
            </tr>
            <tr>
              <td>1.5</td>
              <td>Filipino 1</td>
              <td>Prof Sayaw</td>
            </tr>
            <tr>
              <td>2.4</td>
              <td>ITE 3</td>
              <td>Prof Sarado</td>
            </tr>
            <tr>
              <td>1.9</td>
              <td>ITE 4</td>
              <td>Professor X</td>
            </tr>
            <tr>
              <td>2.4</td>
              <td>NSTP 1</td>
              <td>Professor Wolf</td>
            </tr>
            <tr>
              <td>1.3</td>
              <td>PE 1</td>
              <td>Professor Bagsak</td>
            </tr>
            </table>
        </div>
        <div class="column">
        <p><strong>Second Semester</strong></p>
          <table>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Points</th>
            </tr>
            <tr>
              <td>Richard</td>
              <td>Hakdog</td>
              <td>50</td>
            </tr>
            <tr>
              <td>Adam</td>
              <td>john</td>
              <td>25</td>
            </tr>
            <tr>
              <td>Eve</td>
              <td>Hakdog</td>
              <td>12</td>
            </tr>
        </table>
    </div>
</div>
    <br>
    <br>
    <h3>Second Year</h3>
    <div class="row">
       <div class="column">
       <p><strong>First Semester</strong></p>
          <table>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Points</th>
            </tr>
            <tr>
              <td>Richard</td>
              <td>Hakdog</td>
              <td>50</td>
            </tr>
            <tr>
              <td>Adam</td>
              <td>john</td>
              <td>25</td>
            </tr>
            <tr>
              <td>Eve</td>
              <td>Hakdog</td>
              <td>12</td>
            </tr>
            </table>
        </div>
        <div class="column">
        <p><strong>Second Semester</strong></p>
          <table>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Points</th>
            </tr>
            <tr>
              <td>Richard</td>
              <td>Hakdog</td>
              <td>50</td>
            </tr>
            <tr>
              <td>Adam</td>
              <td>john</td>
              <td>25</td>
            </tr>
            <tr>
              <td>Eve</td>
              <td>Hakdog</td>
              <td>12</td>
            </tr>
        </table>
    </div>
</div>  
    <br>
    <br>
    <h3>Third Year</h3>
    
    <div class="row">
       <div class="column">
       <p><strong>First Semester</strong></p>
          <table>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Points</th>
            </tr>
            <tr>
              <td>Richard</td>
              <td>Hakdog</td>
              <td>50</td>
            </tr>
            <tr>
              <td>Adam</td>
              <td>john</td>
              <td>25</td>
            </tr>
            <tr>
              <td>Eve</td>
              <td>Hakdog</td>
              <td>12</td>
            </tr>
            </table>
        </div>
        <div class="column">
        <p><strong>Second Semester</p>
          <table>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Points</th>
            </tr>
            <tr>
              <td>Richard</td>
              <td>Hakdog</td>
              <td>50</td>
            </tr>
            <tr>
              <td>Adam</td>
              <td>john</td>
              <td>25</td>
            </tr>
            <tr>
              <td>Eve</td>
              <td>Hakdog</td>
              <td>12</td>
            </tr>
        </table>
    </div>
</div>
<br>
    <br>
    <br>
    <h3>Fourth Year</h3>
    <div class="row">
       <div class="column">
       <p><strong>First Semester</strong></p>
          <table>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Points</th>
            </tr>
            <tr>
              <td>Richard</td>
              <td>Hakdog</td>
              <td>50</td>
            </tr>
            <tr>
              <td>Adam</td>
              <td>john</td>
              <td>25</td>
            </tr>
            <tr>
              <td>Eve</td>
              <td>Hakdog</td>
              <td>12</td>
            </tr>
            </table>
        </div>
        <div class="column">
        <p><strong>Second Semester</strong></p>
          <table>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Points</th>
            </tr>
            <tr>
              <td>Richard</td>
              <td>Hakdog</td>
              <td>50</td>
            </tr>
            <tr>
              <td>Adam</td>
              <td>john</td>
              <td>25</td>
            </tr>
            <tr>
              <td>Eve</td>
              <td>Hakdog</td>
              <td>12</td>
            </tr>
        </table>
    </div>
</div>
</center>
</body>      
    
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
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>
<?php }  ?>
