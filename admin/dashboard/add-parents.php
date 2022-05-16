<?php
 session_start();
 if(isset($_SESSION['id'])){
  include("../connect.php");

  $sql=mysqli_query($con,"select * from sms_notification where active= 1");
  $count=mysqli_num_rows($sql);

  if(isset($_POST['submit_n'])){
      $qry="UPDATE `sms_notification` SET `active`='0' WHERE `active`='1'";
      mysqli_query($con,$qry);
  }
  
  if(isset($_POST["submit"])){
    $name=$_POST['name'];
    $phone=$_POST['phoneno'];
    $email=$_POST['email'];
    $house=$_POST['housename'];
    $street=$_POST['streetname'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $uname=$_POST['uname'];
    $password=mysqli_real_escape_string($con,$_POST['pass']);

    $namequery= "select * from sms_login where name='".$uname."'";
    $query= mysqli_query($con,$namequery);

    if(mysqli_num_rows($query)>0){
      ?>
        <script>
          alert("Username Already Exits...! Try another one");
        </script>
      <?php
    }else{
       $qry=mysqli_query($con,"INSERT INTO `sms_parents`(`p_name`, `phone`, `email`, `p_housename`, `p_streetname`, `p_city`, `p_pincode`) VALUES ('".$name."','".$phone."','".$email."','".$house."','".$street."','".$city."','".$pincode."')");

       $pass=password_hash($password, PASSWORD_BCRYPT);

       $qry1=mysqli_query($con,"INSERT INTO `sms_login`(`name`, `pass`, `email`, `role`) VALUES ('".$uname."','".$pass."','".$email."','Parent')");
       if($qry && $qry1){
?>
           <script type="text/javascript">
              alert("Parent Data inserted Succssfully.")
           </script>
<?php
       }else{
?>
          <script type="text/javascript">
             alert("Some error encountered....!.")
          </script>
<?php 
        }
    }
  }
 }else{
    header("Location:../index.php");
 }
?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Add Parents</title>

    <style type="text/css">

        #navbarDropdownMenuLink1{
            display: block;
            z-index:-99 !important;
            font-size:15px;
            color:grey;
            margin:0.5rem 0.4rem !important;
        }

        #indicator{
            display: block;
        }

        #list span{
           width:100%;
           display:block;
           color: darkblue;
           text-align:justify;
           margin:0.2rem 0.3rem !important;
           padding:0.3rem !important;
           line-height:1rem !important;
           font-weight:bold;
           border-bottom:1px solid white;
           font-size:1.0rem !important;
        }

        .message{
            background-color: #e6e6e8;
        }

        .msg {
           width:90%;
           margin:0.2rem 0.3rem !important;
           padding:0.2rem 0.2rem !important;
           text-align:justify;
           font-weight:bold;
           display:block;
           word-wrap: break-word;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">SCHOOL MANAGEMENT SYSTEM</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <!--<li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>-->
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"oaria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell" data-value ="<?php echo $count;?>"></i>
                             <?php
                               if(!empty($count)){ 
                                ?><span class="indicator" id="indicator"><?php echo $count; ?></span><?php
                               }
                             ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title">Notification</div>
                                    <div id="list">
                                       <?php
                                         if(!empty($count)){
                                            while($res=mysqli_fetch_array($sql)){
                                       ?>
                                              <div class="message">   
                                                <span>
                                                    <?php
                                                       echo $res['notifications_name'];
                                                    ?>
                                                </span>
                                                <div class="msg">
                                                    <p><?php 
                                                         echo $res['message'];
                                                    ?></p>
                                                </div>
                                              </div>
                                              <br>  
                                       <?php         
                                            }
                                         }
                                       ?> 
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer">
                                        <form action="#" method="post">
                                            <input type="submit" name="submit_n" value="Mark as Read">
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/Butler-128.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Administrator</h5>
                                </div>
                                <a class="dropdown-item" href="settings.php"><i class="fas fa-cog mr-2"></i>Settings</a>
                                <a class="dropdown-item" href="../logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#"><i class="fas fa-home"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-users"></i>Students</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="all-students.php">All Students<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="admission.php">Admission</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-user"></i>Teachers</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="all-teachers.php">All Teachers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="add-teacher.php">Add Teacher</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="t-assign.php">Assign Class</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class=" fas fa-user-circle"></i>Parents</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="all-parents.php">All Parents</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="add-parents.php">Add Parents</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Attendance</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="t-attendance.php">Teacher Attendance</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="s-attendance.php">Student Attendance</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="exam.php"><i class=" fas fa-pencil-alt"></i>Examination</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="results.php"><i class="fas fa-file-word"></i>Results<span class="badge badge-secondary">New</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="fees.php"><i class="far fa-credit-card"></i>Fees</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pay.php"><i class="far fa-money-bill-alt"></i>Payroll</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="leave.php"><i class="fas fa-file"></i>Leave Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-9"><i class="fas fa-book"></i>Library</a>
                                <div id="submenu-11" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="library.php">View Library</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="u-library.php">Update Library</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="complaits.php"><i class=" fas fa-comment-alt"></i>Complaints</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="notification.php"><i class=" fas fa-fw fa-bell"></i>Notifications</a>
                            </li>
                            <li class="nav-divider">
                                Menu End
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Add Parents</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html" class="breadcrumb-link">Parents</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add Parents</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <form action="#" method="post" name="parent" onSubmit="return(validate());">
                        <table cellpadding="16" width="60%" cellspacing="10">
                            <tr>
                                <td colspan=6>
                                    <center><font size=4><b>Parent Registration</b></font></center>
                                </td>
                            </tr>
                            <tr>
                                <td>Full Name</td>
                                <td><input type=text name="name" size="45" required=></td>
                            
                                <td>Phone No.</td>
                                <td><input type="text" name="phoneno" size="45" required></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" size="45" required></td>
                            
                                <td>House Name</td>
                                <td><input type="text" name="housename" size="45" required></td>
                            </tr>
                            <tr>
                                <td>Street Name</td>
                                <td><input type="text" name="streetname" size="45" required></td>

                                <td>City</td>
                                <td><input type="text" name="city" size="45" required></td>
                            </tr>
                            <tr>
                                <td>Pincode</td>
                                <td><input type="text" name="pincode" size="45" required></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 17px;"><b>Login Details:</b><br></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="uname" size="25" required></td>

                                <td>Password</td>
                                <td><input type="text" name="pass" size="25" required></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="submit"></td>
                            </tr>
                        </table>
                    </form>        
                </div>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->

    <script type="text/javascript">
        function validate()
        { 
            if( document.parent.phoneno.value == "" || isNaN( document.parent.phoneno.value) || document.parent.phoneno.value.length != 10 )
            {
                alert( "Please provide a valid 10 digit Mobile No." );
                document.TeacherRegistration.contactno.focus() ;
                return false;
            }

            if( document.parent.pincode.value == "" ||
                isNaN( document.parent.pincode.value) ||
                document.parent.pincode.value.length != 6 )
            {
                alert( "Please provide a valid 6 digit pincode." );
                document.TeacherRegistration.pincode.focus() ;
                return false;
            }
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>