<?php
 session_start();
 if((isset($_SESSION['id'])) && (isset($_SESSION['name']))){
    include("../../connect.php");
   $count="";

   $sql=mysqli_query($con,"SELECT * FROM `sms_s-notification` WHERE `active`='1' AND `receiver`='".$_SESSION['name']."'");
    $count=mysqli_num_rows($sql);

    if(isset($_POST['submit'])){
        $qry="UPDATE `sms_s-notification` SET `active`='0' WHERE `active`='1' AND `receiver`='".$_SESSION['name']."'";
        mysqli_query($con,$qry);
    }

    if (isset($_POST['submit1'])) {
        $date=$_POST['date'];
        $sender=$_SESSION['name'];
        $reason=$_POST['reason'];
        $description=$_POST['description'];
        $from=$_POST['from'];
        $to=$_POST['to'];

        $cod=mysqli_query($con,"INSERT INTO `sms_leave`(`date`, `sender`, `reason`, `description`, `d-from`, `d-to`, `status`) VALUES ('".$date."','".$sender."','".$reason."','".$description."','".$from."','".$to."','In Review')");

        $cod1=mysqli_query($con,"INSERT INTO `sms_notification`(`notifications_name`, `message`, `active`) VALUES ('Leave Request','".$sender." Requests for Leave.','1')");
        
        if ($cod && $cod1) {
          $cod2=mysqli_query($con,"SELECT `id` FROM `sms_leave` WHERE `date`='".$date."' AND `sender`='".$sender."'");
          $fet=mysqli_fetch_array($cod2);

          mysqli_query($con,"INSERT INTO `sms_t-notification`(`notifications_name`, `message`, `active`, `receiver`) VALUES ('Leave Request','Leave Request with ID ".$fet['id']." Processed Successfully. Remember the ID for Future Referance.','1','".$_SESSION['name']."')");
        }else{
          ?>
          <script type="text/javascript">
              window.alert("some error occured");
          </script>
          <?php
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
    <title>Leave</title>

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
                        <!--<li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"oaria-haspopup="true" aria-expanded="false"><i class=" fas fa-comments"></i></a>
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
                                            <input type="submit" name="submit" value="Mark as Read">
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/Butler-128.png" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['name'] ?></h5>
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
                                <a class="nav-link active" href="index.php"><i class="fas fa-home"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-users"></i>Class</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="all-students.php">View Students<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="class.php">Conduct Class</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="s-attendance.php"><i class="fas fa-fw fa-table"></i>Student Attendance</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="exam.php"><i class=" fas fa-pencil-alt"></i>Examination</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="results.php"><i class="fas fa-file-word"></i>Results<span class="badge badge-secondary">New</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-file"></i>Leave Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="library.php"><i class="fas fa-book"></i>Library</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-9"><i class="fas fa-comment-alt"></i>Complaints</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="complaints.php">View Complaints</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="f-complaint.php">File Complaint</a>
                                        </li>
                                    </ul>
                                </div>
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
                                <h2 class="pageheader-title">Leave Management</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html" class="breadcrumb-link">Leave Management</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div>
                     <form method="post" action="#">
                         <div class="form-group row">
                            <label class="control-label col-md-2">Date</label>
                            <div class="col-md-6">
                              <input type="date" name="date">
                            </div> 
                         </div>
                         <div class="form-group row">
                            <label class="control-label col-md-3">Reason For Requested Leave</label>
                            <div class="col-md-6">
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="reason" value="Casual Leave" size="45" class="custom-control-input"><span class="custom-control-label">Casual Leave</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="reason" value="Sick Leave" size="45" class="custom-control-input"><span class="custom-control-label">Sick Leave</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="reason" value="Maternity Leave" size="45" class="custom-control-input"><span class="custom-control-label">Maternity Leave</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="reason" value="Marriage Leave" size="45" class="custom-control-input"><span class="custom-control-label">Marriage Leave</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="reason" value="Paternity Leave" size="45" class="custom-control-input"><span class="custom-control-label">Paternity Leave</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="reason" value="Bereavement Leave" size="45" class="custom-control-input"><span class="custom-control-label">Bereavement Leave</span>
                                </label>
                            </div> 
                         </div>
                         <div class="form-group row">
                            <label class="control-label col-md-2">Leave Description</label>
                            <div class="col-md-6">
                              <textarea style="resize:none !important;" name="description" id="description" rows="5" cols="10" class='form-control'></textarea>
                            </div> 
                         </div>  
                         <div class="form-group row">
                            <label class="control-label col-md-2">Dates Requested</label>
                            <div class="col-md-6">
                              <label class="control-label col-md-2">From</label>
                                <input type="date" name="from">
                              <label class="control-label col-md-1">To</label>
                                <input type="date" name="to">
                            </div> 
                         </div>
                         <div class="form-group row">
                            <div class="col-md-10 col-offset-2" style="text-align:center;">
                            <input type="submit" name="submit1" class="btn btn-primary" value="Send"/>
                            </div>
                         </div>   
                     </form>       
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <br>
                                <h2 class="pageheader-title">Request Status</h2>
                                <div class="page-breadcrumb">
                                    <form method="post" action="#">
                                    <div class="form-group row">

                                        <label class="control-label col-md-2">Request ID</label>
                                        <div class="col-md-6">
                                            <input type="text" name="id">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-10 col-offset-2">
                                            <input type="submit" name="check" class="btn btn-primary" value="Check"/>
                                        </div>
                                    </div>
                                    </form>
                                    <?php
                                       if(isset($_POST['check'])) {
                                            $id=$_POST['id'];

                                            $code=mysqli_query($con,"select * from sms_leave where id='".$id."'");
                                            if (mysqli_num_rows($code)>0) {
                                                $fetch=mysqli_fetch_assoc($code);
                                                ?>
                                                <script>
                                                    alert("Leave Request : <?php echo $fetch['status']; ?>");
                                                </script>
                                                <?php
                                            }else{
                                                ?>
                                                <script>
                                                    alert("No results found. Check your ID");
                                                </script>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
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