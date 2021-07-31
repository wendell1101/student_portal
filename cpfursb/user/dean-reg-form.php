<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cpfursbid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
    {
      $uid=$_SESSION['cpfursbid'];
      $regnumber=mt_rand(100000000, 999999999);
      $fn=$_POST['fn'];
      $studno=$_POST['studno']; 
      $CYS=$_POST['CYS'];
      $semester=$_POST['semester'];
      $address=$_POST['address'];
      $sy=$_POST['sy'];
      $dob=$_POST['dob'];
      $birth=$_POST['birth'];
      $sex=$_POST['sex'];
      $age=$_POST['age'];
      $contact=$_POST['contact'];
      $email=$_POST['email'];
      $org=$_POST['org'];
      $pos=$_POST['pos'];
      $guardian=$_POST['guardian'];
      $relation=$_POST['relation'];
      
          //student image
      $simg=$_FILES['simg']['name'];

      // allowed extensions

        $ret="select UserID from tblregistration where Semester=:semester and SchoolYR=:sy";
         $query= $dbh -> prepare($ret);
         $query->bindParam(':semester',$semester,PDO::PARAM_STR);
         $query->bindParam(':sy',$sy,PDO::PARAM_STR); 
         $query-> execute();
         $results = $query -> fetchAll(PDO::FETCH_OBJ);
             if($query -> rowCount() == 0) {

              $sql="insert into tblregistration(RegistrationNumber,UserID,StudentNum,FullName,CYS,Address,Semester,SchoolYR,Picture,Birthday,Birthplace,Sex,Age,Contact,Email,Org,Position,Guardian,Relationship)values(:regnumber,:uid,:studno,:fn,:CYS,:address,:semester,:sy,:simg,:dob,:birth,:sex,:age,:contact,:email,:org,:pos,:guardian,:relation)";
              $query=$dbh->prepare($sql);
              $query->bindParam(':regnumber',$regnumber,PDO::PARAM_STR);
              $query->bindParam(':uid',$uid,PDO::PARAM_STR);
              $query->bindParam(':studno',$studno,PDO::PARAM_STR);
              $query->bindParam(':fn',$fn,PDO::PARAM_STR);
              $query->bindParam(':CYS',$CYS,PDO::PARAM_STR);
              $query->bindParam(':address',$address,PDO::PARAM_STR);
              $query->bindParam(':semester',$semester,PDO::PARAM_STR);
              $query->bindParam(':sy',$sy,PDO::PARAM_STR);
              $query->bindParam(':simg',$simg,PDO::PARAM_STR);
              $query->bindParam(':dob',$dob,PDO::PARAM_STR);
              $query->bindParam(':birth',$birth,PDO::PARAM_STR);
              $query->bindParam(':sex',$sex,PDO::PARAM_STR);
              $query->bindParam(':age',$age,PDO::PARAM_STR);
              $query->bindParam(':contact',$contact,PDO::PARAM_STR);
              $query->bindParam(':email',$email,PDO::PARAM_STR);
              $query->bindParam(':org',$org,PDO::PARAM_STR);
              $query->bindParam(':pos',$pos,PDO::PARAM_STR);
              $query->bindParam(':guardian',$guardian,PDO::PARAM_STR);
              $query->bindParam(':relation',$relation,PDO::PARAM_STR);
              $query->execute();
              
                 $LastInsertId=$dbh->lastInsertId();
                 if ($LastInsertId>0) {
              
              echo '<script>alert("Registration form has been filled successfully.")</script>';
                }
                else
                  {
                       echo '<script>alert("Something Went Wrong. Please try again")</script>';
                  }                
              
              }
              
              else
              {
              
              echo "<script>alert('Semester  is  already exist and School Year please try again');</script>";
                
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
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="lib/spectrum/spectrum.css" rel="stylesheet">
    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
  </head>

  <body>
 <?php   
  include_once('includes/header.php');  
  include_once('includes/sidebar.php');
 ?>

 

    <div class="am-pagetitle">
      <h5 class="am-title">Dean's Lister Registration Form</h5>

    </div><!-- am-pagetitle -->

    <div class="am-mainpanel">
      <div class="am-pagebody">

      

        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
            
              <h3 style="color: black;text-align:center;padding:20px 20px">Dean's Lister Registration Form</h3>
               <form id="basic-form" method="post" enctype="multipart/form-data">
      
          

          <!-- wd-200 -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Student Number: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" name="studno" value="" required="true" placeholder="Enter Student Number" class="form-control" maxlength="10"minlength="10">
                </div>
              </div>
              
          <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Full Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="fn" value="" placeholder="LastName, FirstName MI." class="form-control" required='true'>
                </div>
              </div>

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Course, YR & Section: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="CYS" value="" placeholder="eg. BSIT 3-1" class="form-control" required='true'>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Complete Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="address" value="" placeholder="Complete Address" class="form-control" required='true'>
                </div>
              </div>
          <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Semester: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select type="text" name="semester" value="" class="form-control" required="true">
                    <option value="" hidden>Select Semester</option>
                    <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>
                  </select>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">School Year: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select type="text" name="sy" value="" class="form-control" required='true'>
                  <option hidden>Select School Year</option>
                    <option value="SY 2020 - 2021">SY 2020 - 2021</option>
                    <option value="SY 2021 - 2022">SY 2021 - 2022</option>
                    <option value="SY 2022 - 2023">SY 2022 - 2023</option>
                    <option value="SY 2023 - 2024">SY 2023 - 2024</option>
                    <option value="SY 2024 - 2025">SY 2024 - 2025</option>
                    <option value="SY 2025 - 2026">SY 2025 - 2026</option>
                    <option value="SY 2026 - 2027">SY 2026 - 2027</option>
                    <option value="SY 2027 - 2028">SY 2027 - 2028</option>
                    <option value="SY 2028 - 2029">SY 2028 - 2029</option>
                    <option value="SY 2029 - 2030">SY 2029 - 2030</option>
                    <option value="SY 2030 - 2031">SY 2030 - 2031</option>
                    <option value="SY 2031 - 2032">SY 2031 - 2032</option>
                    <option value="SY 2032 - 2033">SY 2032 - 2033</option>
                    <option value="SY 2033 - 2034">SY 2033 - 2034</option>
                    <option value="SY 2034 - 2035">SY 2034 - 2035</option>
                    <option value="SY 2035 - 2036">SY 2035 - 2036</option>
                    <option value="SY 2036 - 2037">SY 2036 - 2037</option>
                    <option value="SY 2037 - 2038">SY 2037 - 2038</option>
                    <option value="SY 2038 - 2039">SY 2038 - 2039</option>
                    <option value="SY 2039 - 2040">SY 2039 - 2040</option>
                    <option value="SY 2040 - 2041">SY 2040 - 2041</option>
                    <option value="SY 2041 - 2042">SY 2041 - 2042</option>
                    <option value="SY 2042 - 2043">SY 2042 - 2043</option>
                    <option value="SY 2043 - 2044">SY 2043 - 2044</option>
                    <option value="SY 2044 - 2045">SY 2044 - 2045</option>
                    <option value="SY 2045 - 2046">SY 2045 - 2046</option>
                    <option value="SY 2046 - 2047">SY 2046 - 2047</option>
                    <option value="SY 2047 - 2048">SY 2047 - 2048</option>
                    <option value="SY 2048 - 2049">SY 2048 - 2049</option>
                    <option value="SY 2049 - 2050">SY 2049 - 2050</option>
                    <option value="SY 2050 - 2051">SY 2050 - 2051</option>
                    <option value="SY 2051 - 2052">SY 2051 - 2052</option>
                    <option value="SY 2052 - 2053">SY 2052 - 2053</option>
                    <option value="SY 2053 - 2054">SY 2053 - 2054</option>
                    <option value="SY 2054 - 2055">SY 2054 - 2055</option>
                    <option value="SY 2055 - 2056">SY 2055 - 2056</option>
                    <option value="SY 2056 - 2057">SY 2056 - 2057</option>
                    <option value="SY 2057 - 2058">SY 2057 - 2058</option>
                    <option value="SY 2058 - 2059">SY 2058 - 2059</option>
                    <option value="SY 2059 - 2060">SY 2059 - 2060</option>
                    <option value="SY 2060 - 2061">SY 2060 - 2061</option>
                    <option value="SY 2061 - 2062">SY 2061 - 2062</option>
                    <option value="SY 2062 - 2063">SY 2062 - 2063</option>
                    <option value="SY 2063 - 2064">SY 2063 - 2064</option>
                    <option value="SY 2064 - 2065">SY 2064 - 2065</option>
                    <option value="SY 2065 - 2066">SY 2065 - 2066</option>
                    <option value="SY 2066 - 2067">SY 2066 - 2067</option>
                    <option value="SY 2067 - 2068">SY 2067 - 2068</option>
                    <option value="SY 2068 - 2069">SY 2068 - 2069</option>
                    <option value="SY 2069 - 2070">SY 2069 - 2070</option>
                    <option value="SY 2070 - 2071">SY 2070 - 2071</option>
                    <option value="SY 2071 - 2072">SY 2071 - 2072</option>
                    <option value="SY 2072 - 2073">SY 2072 - 2073</option>
                    <option value="SY 2073 - 2074">SY 2073 - 2074</option>
                    <option value="SY 2074 - 2075">SY 2074 - 2075</option>
                    <option value="SY 2075 - 2076">SY 2075 - 2076</option>
                    <option value="SY 2076 - 2077">SY 2076 - 2077</option>
                    <option value="SY 2077 - 2078">SY 2077 - 2078</option>
                    <option value="SY 2078 - 2079">SY 2078 - 2079</option>
                    <option value="SY 2079 - 2080">SY 2079 - 2080</option>
                    <option value="SY 2080 - 2081">SY 2080 - 2081</option>
                    <option value="SY 2081 - 2082">SY 2081 - 2082</option>
                    <option value="SY 2082 - 2083">SY 2082 - 2083</option>
                    <option value="SY 2083 - 2084">SY 2083 - 2084</option>
                    <option value="SY 2084 - 2085">SY 2084 - 2085</option>
                    <option value="SY 2085 - 2086">SY 2085 - 2086</option>
                    <option value="SY 2086 - 2087">SY 2086 - 2087</option>
                    <option value="SY 2087 - 2088">SY 2087 - 2088</option>
                    <option value="SY 2088 - 2089">SY 2088 - 2089</option>
                    <option value="SY 2089 - 2090">SY 2089 - 2090</option>
                    <option value="SY 2090 - 2091">SY 2090 - 2091</option>
                    <option value="SY 2091 - 2092">SY 2091 - 2092</option>
                    <option value="SY 2092 - 2093">SY 2092 - 2093</option>
                    <option value="SY 2093 - 2094">SY 2093 - 2094</option>
                    <option value="SY 2094 - 2095">SY 2094 - 2095</option>
                    <option value="SY 2095 - 2096">SY 2095 - 2096</option>
                    <option value="SY 2096 - 2097">SY 2096 - 2097</option>
                    <option value="SY 2097 - 2098">SY 2097 - 2098</option>
                    <option value="SY 2098 - 2099">SY 2098 - 2099</option>
                  </select>
                </div>
              </div> 
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label"> 2x2 Picture: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="file" name="simg" value="" placeholder="2x2 Only - Portrait will only accepted"class="form-control" required='true'>
                </div>
              </div><!-- row -->
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Birthday: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control fc-datepicker" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" id="dob" name="dob" required='true'>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Birth Place: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="birth" value="" placeholder="Enter Birthplace" class="form-control" required='true'>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Sex: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select type="text" name="sex" value="" class="form-control" required="true">
                    <option value="" hidden>Select Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Age: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="age" value="" placeholder="Enter Age"class="form-control" minlength="2" maxLength="2"required="true">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Contact Number: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" name="contact" value="" required="true" placeholder="Enter Contact Number" class="form-control" maxlength="11"minlength="11">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Email Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="email" name="email" value="" placeholder="Enter Email Address" class="form-control" required='true'>
                </div>
              </div>

              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Org.Affiliation: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="org" value="" placeholder="Enter Org.Affiliation"class="form-control" required='true'>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Position: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="pos" value="" placeholder="Enter Position"class="form-control" required='true'>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Name of Guardian: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="guardian" value="" placeholder="Enter Name of Guardian"  class="form-control" required="true">
                </div>
              </div>
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Relationship: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" name="relation" value="" placeholder="Enter Relationship"required="true" class="form-control">
                </div>
              </div>  
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Report of Rating(Copy of Grades): <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="file" name="ror" value="" class="form-control" required='true' accept="application/pdf">
                </div>            
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Good Moral: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="file" name="good" value="" class="form-control" required='true' accept="application/pdf">
                </div>            
              </div>
              </div><!-- row -->
              
             <div class="form-layout-footer mg-t-40">
             <p style="text-align: center;"><button class="btn btn-info mg-r-5"  name="submit" id="submit">Submit Application</button></p>
                </form>
              </div><!-- form-layout-footer -->
            </div><!-- card -->
          </div><!-- col-6 -->
        
        </div><!-- row -->


      </div><!-- am-pagebody -->
    </div><!-- am-mainpanel -->
   

    <script src="lib/jquery/jquery.js"></script>
   <script src="lib/jquery-ui/jquery-ui.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
        <script src="lib/spectrum/spectrum.js"></script>

    <script src="js/amanda.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      })

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

$('#datepickerNoOfMonths').datepicker({
  showOtherMonths: true,
  selectOtherMonths: true,
  numberOfMonths: 2
})
$('.dob').datepicker({
  multidate: true,
  format: 'yyyy-mm-dd'
});



    </script>
    
  </body>
</html>
<?php }  ?>