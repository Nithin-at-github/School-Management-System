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
  if(isset($_POST['pay'])){
    $tid=$_POST['tid'];
    $accno=$_POST['accno'];
    $month=$_POST['month'];
    $sal=$_POST['sal'];
    $ded=$_POST['ded'];
    $amount=$_POST['amount'];
    $name=$_POST['tname'];

    $pay=mysqli_query($con,"INSERT INTO `sms_pay`(`tid`, `date`, `acc_no`, `month`, `salary`, `deductions`, `amount_paid`) VALUES ('".$tid."','".date("Y/m/d")."','".$accno."','".$month."','".$sal."','".$ded."','".$amount."')");
    if($pay){
        mysqli_query($con,"INSERT INTO `sms_t-notification`(`notifications_name`, `message`, `active`, `receiver`) VALUES ('Salary','Your Salary of the month ".$month." has been credited.','1','".$name."')");
        ?>
        <script>
            alert("Salary Paid Successfully");
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("<?php echo mysqli_error(); ?>");
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
    <title>Payroll</title>

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
        @media screen {
            #printSection {
            display: none;
            }
        }

        @media print {
            body * {
                visibility: hidden;
            }
            #printSection, #printSection * {
                visibility:visible;
            }
            #printSection {
                position:absolute;
                left:0;
                top:0;
            }
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
                                <h2 class="pageheader-title">Payroll</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html" class="breadcrumb-link">Payroll</a></li>
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
                            <label>Select Month</label>&emsp;
                            <select name="month">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>&emsp;
                            <input type="submit" name="view" value="View">
                        </form>
                    </div>
                    <?php
                    if(isset($_POST['view'])){
                        $month=$_POST['month'];
                        $list=mysqli_query($con,"select * from sms_teachers order by t_fullname");
                        if(mysqli_num_rows($list)>0){
                            ?>
                            <!-- ============================================================== -->
                            <!-- basic table  -->
                            <!-- ============================================================== -->
                            <br>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Teacher Payments</h5>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered first">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Details</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    while ($r=mysqli_fetch_assoc($list)) {
                                                        $check=mysqli_query($con,"select * from sms_pay where tid='".$r['tid']."' and month='".$month."'");
                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $r['tid']; ?></td> 
                                                        <td><?php echo $r['t_fullname']; ?></td>
                                                        <td><form>
                                                            <?php
                                                            if(mysqli_num_rows($check)>0){
                                                                echo "Paid";
                                                                ?>
                                                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                                <button type="button" data-toggle="modal" data-target="#MyModal<?php echo $r['tid']; ?>">View Report</button>
                                                                <?php
                                                            }else{
                                                                echo "Not Paid";
                                                                ?>
                                                                &emsp;&emsp;&emsp;&emsp;
                                                                <button type="button" data-toggle="modal" data-target="#MyModal1<?php echo $r['tid']; ?>">Pay Salary</button>
                                                                <?php
                                                            }
                                                            ?>
                                                            </form>
                                                            <!-- Modal -->
                                                            <div id="printThis">
                                                                <div id="MyModal1<?php echo $r['tid']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <!-- Modal Content: begins -->
                                                                        <div class="modal-content">
                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="gridSystemModalLabel">PAYMENT</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            </div>
                                                                            <!-- Modal Body -->  
                                                                            <div class="modal-body">
                                                                                <div class="body-message">
                                                                                    <h4 align="center">SALARY PAYMENT</h4>
                                                                                    <div class="flex">
                                                                                        <div class="w-50">
                                                                                            <form method="post" action="#">
                                                                                                <table width="100%">
                                                                                                    <tr>
                                                                                                        <td><label>Date :</label>&emsp;<input type="text" name="date" value="<?php echo date("d/m/Y"); ?>"></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><label>Tid :</label>&emsp;<input type="text" name="tid" value="<?php echo $r['tid']; ?>"></td>
                                                                                                        <td><label>Name :</label>&emsp;<input type="text" name="tname" value="<?php echo $r['t_fullname']; ?>"></td>
                                                                                                        <td><label>Account No :</label>&emsp;<input type="text" name="accno" value="<?php echo $r['acc_no']; ?>"></td>
                                                                                                        <td><label>Month :</label>&emsp;<input type="text" name="month" value="<?php echo $month; ?>"></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><label>Salary :</label>&emsp;<input type="text" name="sal" value="<?php echo $r['salary']; ?>"></td>
                                                                                                        <td><label>Deductions :</label>&emsp;<input type="text" name="ded" required></td>
                                                                                                        <td><label>Amount Payable :</label>&emsp;<input type="text" name="amount" required></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td></td>
                                                                                                        <td></td>
                                                                                                        <td></td>
                                                                                                        <td><input type="submit" name="pay" value="Pay Salary"></td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Modal Footer -->
                                                                            <div class="modal-footer">
                                                                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Modal Content: ends -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Modal -->
                                                            <div id="printThis<?php echo $r['tid']; ?>">
                                                                <div id="MyModal<?php echo $r['tid']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <!-- Modal Content: begins -->
                                                                        <div class="modal-content">
                                                                            <!-- Modal Header -->
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="gridSystemModalLabel">PAYMENT</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            </div>
                                                                            <!-- Modal Body -->  
                                                                            <div class="modal-body">
                                                                                <div class="body-message">
                                                                                    <h4 align="center">PAYMENT INVOICE</h4>
                                                                                    <div class="flex">
                                                                                        <div class="w-50">
                                                                                            <p>
                                                                                                Date :&emsp;<?php echo date("d/m/Y"); ?><br>
                                                                                                Name :&emsp;<?php echo $r['t_fullname']; ?><br>
                                                                                                Account No. :&emsp;<?php echo $r['acc_no']; ?><br>
                                                                                                IFSC code :&emsp;<?php echo $r['ifsc']; ?><br>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php
                                                                                    $f=mysqli_fetch_assoc($check);
                                                                                    ?>
                                                                                    <table class="wborder" border="2" width="100%" height="100%">
                                                                                        <tr>
                                                                                            <td width="50%">
                                                                                                <p><b>Salary Details</b></p>
                                                                                                <hr>
                                                                                                <table width="100%">
                                                                                                <tr>
                                                                                                    <td width="50%">Salary Type</td>
                                                                                                    <td width="50%" class='text-right'>Amount</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><b>Basic Pay</b></td>
                                                                                                    <td class='text-right'><b><?php echo $f['salary']; ?></b></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><b>Deductions</b></td>
                                                                                                    <td class='text-right'><b><?php echo $f['deductions']; ?></b></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th>Total</th>
                                                                                                    <th class='text-right'><b><?php echo $f['amount_paid']; ?></b></th>
                                                                                                </tr>
                                                                                                </table>
                                                                                            </td>           
                                                                                            <td width="50%">
                                                                                                <p><b>Payment Details</b></p>
                                                                                                <table width="100%" class="wborder" border=2>
                                                                                                <tr>
                                                                                                    <td width="50%">Date</td>
                                                                                                    <td width="50%" class='text-right'>Amount</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><b><?php echo date("d/m/Y"); ?></b></td>
                                                                                                    <td class='text-right'><b><?php echo $f['amount_paid']; ?>.00</b></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th>Total</th>
                                                                                                    <th class='text-right'><b><?php echo $f['amount_paid']; ?>.00</b></th>
                                                                                                </tr>
                                                                                                </table>
                                                                                                <table width="100%" border="2">
                                                                                                <tr>
                                                                                                    <td>Total Payable Amount</td>
                                                                                                    <td class='text-right'><b><?php echo $f['amount_paid']; ?>.00</b></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Total Paid</td>
                                                                                                    <td class='text-right'><b><?php echo $f['amount_paid']; ?>.00</b></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>Balance</td>
                                                                                                    <td class='text-right'><b>0.00</b></td>
                                                                                                </tr>
                                                                                                </table>
                                                                                            </td>           
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Modal Footer -->
                                                                            <div class="modal-footer">
                                                                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                                                <button id="btnPrint<?php echo $r['tid']; ?>" type="button" class="btn btn-default">Print</button>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Modal Content: ends -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <script type="text/javascript">
                                                    document.getElementById("btnPrint<?php echo $r['tid']; ?>").onclick = function () {
                                                            printElement(document.getElementById("printThis<?php echo $r['tid']; ?>"));
                                                        };

                                                        function printElement(elem) {
                                                            var domClone = elem.cloneNode(true);

                                                            var $printSection = document.getElementById("printSection");

                                                            if (!$printSection) {
                                                                var $printSection = document.createElement("div");
                                                                $printSection.id = "printSection";
                                                                document.body.appendChild($printSection);
                                                            }

                                                            $printSection.innerHTML = "";
                                                            $printSection.appendChild(domClone);
                                                            window.print();
                                                        }
                                                </script>
                                                <?php
                                                    }
                                                ?>
                                                <tfoot>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Details</th>
                                                </tfoot>
                                            </table>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end basic table  -->
                            <!-- ============================================================== -->
                            <?php
                        }
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