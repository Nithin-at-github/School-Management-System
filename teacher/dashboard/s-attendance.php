<?php
 session_start();
 if((isset($_SESSION['id'])) && (isset($_SESSION['name']))){
    include("../../connect.php");
   $count="";
   $conf="";

   $sql=mysqli_query($con,"SELECT * FROM `sms_s-notification` WHERE `active`='1' AND `receiver`='".$_SESSION['name']."'");
    $count=mysqli_num_rows($sql);

    if(isset($_POST['submit'])){
        $qry="UPDATE `sms_s-notification` SET `active`='0' WHERE `active`='1' AND `receiver`='".$_SESSION['name']."'";
        mysqli_query($con,$qry);
    }

    if(isset($_POST['finish'])){
        $c=$_POST['count'];
        $count1="0";
        $date=$_POST['date'];
        $session=$_POST['session'];
        $stud=$_POST['stud'];
        $class=$_POST['class'];
        $sec=$_POST['sec'];

        for ($i=0; $i <$c ; $i++) {

            $cod[$i]=mysqli_query($con,"INSERT INTO `sms_student_att`(`class`, `sec`, `sid`, `name`, `date`, `session`, `status`) VALUES ('".$class."','".$sec."','".$stud[$i]['id']."','".$stud[$i]['name']."','".$date."','".$session."','".$stud[$i]['status']."')");

            if ($cod[$i]) {
                $count1=$count1++;
            }
        }
        if ($count1==$c) {
            $conf="1";
        }else{
            $conf="0";
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
    <title>Attendance</title>

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
                                <a class="nav-link" href="#"><i class="fas fa-fw fa-table"></i>Student Attendance</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="exam.php"><i class=" fas fa-pencil-alt"></i>Examination</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="results.php"><i class="fas fa-file-word"></i>Results<span class="badge badge-secondary">New</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="leave.php"><i class="fas fa-file"></i>Leave Management</a>
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
                                <h2 class="pageheader-title">Student Attendance</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html" class="breadcrumb-link">Attendance</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Student Attendance</li>
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
                            <label>Class</label>
                            <select name="class">
                                <option value="I" selected="">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                <option value="X">X</option>
                            </select>&emsp;
                            <label>Section</label>
                            <select name="sec">
                                <option value="A" selected="">A</option>
                                <option value="B">B</option>
                            </select>
                            <br><br>
                            <button type="submit" name="view">View Students</button>
                        </form>
                        <br>
                        <?php
                          if ($conf==1) {
                            echo " <font color=green> Attendance Marked successfully </font> ";
                            $conf="";
                          }elseif($conf=0){
                            echo " <font color=red> Sorry Attendance not marked due to some errors. </font> ";
                            $conf="";
                          }
                        ?>
                        <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                        <?php
                            if(isset($_POST["view"])){
                                $class=$_POST['class'];
                                $sec=$_POST['sec'];
                                $sql=" select * from sms_students where s_class= '".$class."' and s_sec= '".$sec."' ";
                                $result = $con->query($sql);
                                $count=$result->num_rows;
                                $con->close();
                                if($count>0){
                        ?> 
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <form method="post" action="#">
                                                <input type="hidden" name="class" value="<?php echo $class; ?>">
                                                <input type="hidden" name="sec" value="<?php echo $sec; ?>">
                                            <h5 class="card-header">
                                                <input type="hidden" name="count" value="<?php echo $count; ?>">
                                                <label>Date</label>
                                                <input type="date" name="date" required>&emsp;&emsp;
                                                <label>Session</label>
                                                <select name="session" required>
                                                    <option value="1" selected="">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </h5>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered first">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th>Attended.?</th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        $i="0";
                                                        while($rows=$result->fetch_assoc()){
                                                        ?>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $rows['sid'];?></td> 
                                                                <input type="hidden" name="stud[<?php echo $i;?>][id]" value="<?php echo $rows['sid'];?>">
                                                                <td><?php echo $rows['s_fullname'];?></td>
                                                                <input type="hidden" name="stud[<?php echo $i;?>][name]" value="<?php echo $rows['s_fullname'];?>">
                                                                <td>
                                                                    <label class="custom-control custom-radio custom-control-inline">
                                                                    <input type="checkbox" name="stud[<?php echo $i;?>][status]" value="Present" size="45" class="custom-control-input"><span class="custom-control-label">Yes</span>
                                                                    </label>
                                                                    <label  class="custom-control custom-radio custom-control-inline">
                                                                    <input type="checkbox" name="stud[<?php echo $i;?>][status]" value="Absent" size="45" class="custom-control-input"><span class="custom-control-label">No</span>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <?php
                                                            $i++; 
                                                        } 
                                                        ?>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-offset-2" style="text-align:center;">
                                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                <input type="submit" name="finish" class="btn btn-primary" value="Finish"/>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div>
                                        <center>
                                            <p>No Records Found</p>
                                        </center>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
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