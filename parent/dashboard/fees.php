<?php
 session_start();
 if((isset($_SESSION['id'])) && (isset($_SESSION['name']))){
    include("../../connect.php");

   $sql=mysqli_query($con,"SELECT * FROM `sms_p-notification` WHERE `active`='1' AND `receiver`='".$_SESSION['name']."'");
    $count=mysqli_num_rows($sql);

    if(isset($_POST['submit'])){
        $qry="UPDATE `sms_s-notification` SET `active`='0' WHERE `active`='1' AND `receiver`='".$_SESSION['name']."'";
        mysqli_query($con,$qry);
    }

   if (isset($_POST['pay'])) {
        $pid=$_SESSION['id'];
        $sname=$_POST['sname'];
        $class=$_POST['class'];
        $sec=$_POST['sec'];
        $term=$_POST['term'];
        $time=date("h:i:sa");

        $fee=mysqli_query($con,"INSERT INTO `sms_fees`(`pid`, `class`, `remark`, `amount`, `date`, `time`) VALUES ('".$pid."','".$class."','".$term."','4500','".date("Y/m/d")."','".$time."')");
        if($fee){
            ?>
            <script>
                alert("Term Fees of Rs.4500 has been paid.");
            </script>
            <?php
            mysqli_query($con,"INSERT INTO `sms_notification`(`notifications_name`, `message`, `active`) VALUES ('Term Fees','".$sname." of ".$class." ".$sec." has paid ".$term." Fees','1')");
        }else{
            ?>
            <script>
                alert("<?php echo mysqli_error(); ?>");
            </script>
            <?php
        }
    }

 }else{
    header("Location:../p_login.php");
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
    <title>Fees</title>

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
                visibility:hidden;
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
                                <a class="nav-link" href="#"><i class="far fa-credit-card"></i>Pay Fees</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="results.php"><i class="fas fa-file-word"></i>Results<span class="badge badge-secondary">New</span></a>
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
                                <h2 class="pageheader-title">Fees</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Fees</li>
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
                            <label>Select Term</label>&emsp;
                            <select name="term" required>
                                <option value="" selected>Select</option>
                                <option value="Term 1">Term 1</option>
                                <option value="Term 2">Term 2</option>
                                <option value="Term 3">Term 3</option>
                            </select>&emsp;
                            <input type="submit" name="view" value="Continue">
                        </form>
                        <?php
                         if(isset($_POST['view'])){
                            $term=$_POST['term'];
                            $qry=mysqli_query($con,"select * from sms_students where parent_id='".$_SESSION['id']."'");
                            
                            if(mysqli_num_rows($qry)>0){
                            ?>
                            <!-- ============================================================== -->
                            <!-- basic table  -->
                            <!-- ============================================================== -->
                            <br>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Fee Payment</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                           while($r=mysqli_fetch_assoc($qry)){
                                        ?>
                                        <form action="#" method="post">
                                            <table cellpadding="16" width="60%" cellspacing="10">
                                                <tr>
                                                    <td>Date</td>
                                                    <td><input type="text" name="date" size="25" required value="<?php echo date("d/m/Y"); ?>"></td>
                            
                                                    <td>Parent Name</td>
                                                    <td><input type="text" name="pname" size="45" required value="<?php echo $_SESSION['name']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Student Name</td>
                                                    <td><input type="text" name="sname" size="45" required value="<?php echo $r['s_fullname']; ?>"></td>
                            
                                                    <td>Class</td>
                                                    <td><input type="text" name="class" size="45" required value="<?php echo $r['s_class'] ?>">
                                                        <input type="hidden" name="sec" value="<?php echo $r['s_sec'] ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Term</td>
                                                    <td><input type="text" name="term" size="45" required value="<?php echo $term ?>"></td>
                                                
                                                    <td>Fee Amount</td>
                                                    <td style="font-size: 20px;"><b>Rs. 4500</b></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="submit" name="pay" value="Pay 4500"></td>
                                                    <td><button type="button" data-toggle="modal" data-target="#MyModal">View Receipt</button></td>
                                                </tr>
                                            </table>
                                            <!-- Modal -->
                                            <div id="printThis">
                                                <div id="MyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                    <!-- Modal Content: begins -->
                                                        <div class="modal-content">
                                                        <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="gridSystemModalLabel">FEE RECEIPT</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <!-- Modal Body -->  
                                                            <div class="modal-body">
                                                                <div class="body-message">
                                                                    <h4 align="center">RECEIPT</h4>
                                                                    <div class="flex">
                                                                        <div class="w-50">
                                                                            <p>Payment Date: <b><?php echo date("d/m/Y"); ?></b></p>
                                                                            <p>Parent: <b><?php echo $_SESSION['name']; ?></b></p>
                                                                            <p>Student: <b><?php echo $r['s_fullname']; ?></b></p>
                                                                            <p>Class: <b><?php echo $r['s_class'] ?></b></p>
                                                                            <p>Paid Amount: <b>Rs.4500</b></p>
                                                                            <p>Remarks: <b><?php echo $term ?> Fees</b></p>
                                                                        </div>
                                                                    </div>
                                                                    <table class="wborder" border="2" width="100%" height="100%">
                                                                        <tr>
                                                                            <td width="50%">
                                                                                <p><b>Fee Details</b></p>
                                                                                <hr>
                                                                                <table width="100%">
                                                                                    <tr>
                                                                                        <td width="50%">Fee Type</td>
                                                                                        <td width="50%" class='text-right'>Amount</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b><?php echo $term ?> Fee</b></td>
                                                                                        <td class='text-right'><b>4500.00</b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Total</th>
                                                                                        <th class='text-right'><b>4500.00</b></th>
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
                                                                                        <td class='text-right'><b>4500.00</b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Total</th>
                                                                                        <th class='text-right'><b>4500.00</b></th>
                                                                                    </tr>
                                                                                </table>
                                                                                <table width="100%" border="2">
                                                                                    <tr>
                                                                                        <td>Total Payable Fee</td>
                                                                                        <td class='text-right'><b>4500.00</b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Total Paid</td>
                                                                                        <td class='text-right'><b>4500.00</b></td>
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
                                                                <button id="btnPrint" type="button" class="btn btn-default">Print</button>
                                                            </div>
                                                        </div>
                                                        <!-- Modal Content: ends -->
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                            }
                                        ?>        
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end basic table  -->
                            <!-- ============================================================== -->
                            <?php
                            }else{
                              ?>
                              <script>
                                  alert("No Records Found..!");
                              </script>
                              <?php
                            }
                         }
                        ?>
                    </div>
                <div>
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
<script type="text/javascript">
    document.getElementById("btnPrint").onclick = function () {
        printElement(document.getElementById("printThis"));
    }

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
 </html>