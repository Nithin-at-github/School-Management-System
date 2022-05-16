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

    if(isset($_POST['reset'])){
        $pass=mysqli_real_escape_string($con,$_POST['pass']);
        $newpass=mysqli_real_escape_string($con,$_POST['npass']);
        $cpass=mysqli_real_escape_string($con,$_POST['cpass']);

        if($newpass==$cpass){
            $cod=mysqli_query($con,"select * from sms_login where id='".$_SESSION['id']."'");
            $r=mysqli_fetch_assoc($cod);
            if(password_verify($pass, $r['pass'])){
                $npass=password_hash($newpass, PASSWORD_BCRYPT);
                $res=mysqli_query($con," UPDATE `sms_login` SET `pass`='".$npass."' WHERE `id`='".$_SESSION['id']."'");
                if($res){
                    ?>
                    <script>
                        alert("Password Reseted Successfully.");
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("<?php echo mysqli_error(); ?>");
                    </script>
                    <?php
                }
            }else{
                ?>
                <script>
                    alert("Current Password not Matching..!");
                </script>
            <?php
            }

        }else{
            ?>
            <script>
                alert("Passwords not Matching..!");
            </script>
            <?php
        }
    }

 }else{
    header("Location:../s_login.php");
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
    <link href='assets/vendor/full-calendar/css/fullcalendar.css' rel='stylesheet' />
    <link href='assets/vendor/full-calendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <title>Settings</title>

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
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Settings</a>
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
                                <a class="nav-link" href="exam.php"><i class=" fas fa-pencil-alt"></i>Examination</a>
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
                                <h2 class="pageheader-title">Settings</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="container">
                        <div class="card" style="align-content: center;">
                            <div class="card-header">
                                <h3>Acoount Settings</h3>
                            </div>
                            <br>
                            <h3 align="center">Change Password</h3>
                            <form method="post" action="#">
                                &emsp;&emsp;&emsp;<label>Current Password :</label>&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
                                <input type="Password" name="pass">
                                <br><br>
                                &emsp;&emsp;&emsp;<label>New Password :</label>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                                <input type="Password" name="npass">
                                <br><br>
                                &emsp;&emsp;&emsp;<label>Confirm New Password :</label>&emsp;
                                <input type="Password" name="cpass">
                                <br><br>
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                <input type="submit" name="reset" value="Reset" class="btn btn-primary">
                            </form>
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
</body>
</html>