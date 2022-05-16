<?php
 session_start();
 if((isset($_SESSION['id'])) && (isset($_SESSION['name']))){
    include("../../connect.php");

   $sql=mysqli_query($con,"SELECT * FROM `sms_s-notification` WHERE `active`='1' AND `receiver`='".$_SESSION['name']."'");
   $count=mysqli_num_rows($sql);

   if(isset($_POST['submit'])){
       $qry="UPDATE `sms_s-notification` SET `active`='0' WHERE `active`='1' AND `receiver`='".$_SESSION['name']."'";
       mysqli_query($con,$qry);
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
    <title>Examination</title>

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
                                <a class="nav-link" href="class.php"><i class="fas fa-users"></i>Attend Class</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class=" fas fa-pencil-alt"></i>Examination</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="results.php"><i class="fas fa-file-word"></i>Results<span class="badge badge-secondary">New</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="library.php"><i class="fas fa-book"></i>Library</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="complaits.php"><i class=" fas fa-comment-alt"></i>Complaints</a>
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
                                <h2 class="pageheader-title">Examination</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html" class="breadcrumb-link">Examination</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php
                    $date=date("Y/m/d");
                    $cod=mysqli_query($con,"SELECT * FROM `sms_quiz` WHERE `date`='".$date."' ORDER BY `qid` desc");
                    if(mysqli_num_rows($cod)>0){
                        ?>
                        <div class="panel">
                            <div class="table-responsive">
                                <table class="table table-striped title1">
                                    <tr>
                                        <td><b>S.N.</b></td>
                                        <td><b>Topic</b></td>
                                        <td><b>Total question</b></td>
                                        <td><b>Total Marks</b></td>
                                        <td><b>Minus Marks</b></td>
                                        <td><b>Time limit</b></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    while($row = mysqli_fetch_array($cod)) {
                                        $c=1;
                                        $title = $row['title'];
                                        $total_q = $row['total_q'];
                                        $mark_c = $row['mark_c'];
                                        $mark_w= $row['mark_w'];
                                        $time = $row['max_time'];
                                        $qid = $row['qid'];

                                        $stud=mysqli_query($con,"select sid from sms_students where s_fullname='".$_SESSION['name']."'");
                                        $sid=mysqli_fetch_assoc($stud);
                                        $cod1=mysqli_query($con,"select * from sms_results where qid='".$qid."' and sid='".$sid['sid']."'");
                                        if(mysqli_num_rows($cod1)>0){
                                            ?>
                                            <tr style="color:red">
                                                <td><?php echo $c++; ?></td>
                                                <td><?php echo $title; ?>&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                                                <td align="center"><?php echo $total_q; ?></td>
                                                <td align="center"><?php echo ($mark_c*$total_q); ?></td>
                                                <td align="center"><?php echo $mark_w; ?></td>
                                                <td><?php echo $time; ?>&nbsp;min</td>
                                                <td></td>
                                            </tr>
                                            <?php
                                        }else{
                                            ?>
                                            <tr>
                                                <td><?php echo $c++; ?></td>
                                                <td><?php echo $title; ?></td>
                                                <td align="center"><?php echo $total_q; ?></td>
                                                <td align="center"><?php echo ($mark_c*$total_q); ?></td>
                                                <td align="center"><?php echo $mark_w; ?></td>
                                                <td><?php echo $time; ?>&nbsp;min</td>
                                                <td><b><a href="exam_env.php?token=<?php echo $row['qid']; ?>&total=<?php echo $total_q; ?>&mark=<?php echo $mark_c; ?>&markw=<?php echo $mark_w; ?>&sid=<?php echo $sid['sid']; ?>" class="btn btn-primary" style="margin:0px;background:"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>S t a r t</b></span></a></b></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div>
                            <h3 align="center">No Exams Available for Today</h3>
                        </div>
                        <?php
                    }
                    ?>
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