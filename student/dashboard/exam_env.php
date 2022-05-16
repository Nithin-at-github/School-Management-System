<?php
 session_start();
 if((isset($_GET['token'])) && (isset($_SESSION['name']))){
    include("../../connect.php");

   $sql=mysqli_query($con,"SELECT * FROM `sms_s-notification` WHERE `active`='1' AND `receiver`='".$_SESSION['name']."'");
   $count=mysqli_num_rows($sql);

   if(isset($_POST['submit'])){
       $qry="UPDATE `sms_s-notification` SET `active`='0' WHERE `active`='1' AND `receiver`='".$_SESSION['name']."'";
       mysqli_query($con,$qry);
   }
   
   if(isset($_POST['finish'])){
      if(!empty($_POST['option'])){
        $ccount=0;
        $wcount=0;
        $mark=0;
        $selected=$_POST['option'];
        $total_q=$_POST['total_q'];
        $cmark=$_POST['cmark'];
        $wmark=$_POST['wmark'];
        $qid=$_POST['qid'];
        $sid=$_POST['sid'];
        $qn_id=$_POST['qn_id'];
        $t_mark=($cmark*$total_q);

        for($i=1;$i<=$total_q;$i++){
            $cod=mysqli_query($con,"select * from sms_answers where qn_id='".$qn_id[$i]."'");
            while ($f=mysqli_fetch_assoc($cod)) {
                if($selected[$i] == $f['oid']){
                    $mark=($mark+$cmark);
                    $ccount+=1;
                }else{
                    $mark=($mark-$wmark);
                    $wcount+=1;
                }
            }
        }
        $cod1=mysqli_query($con,"INSERT INTO `sms_results`(`qid`, `sid`, `score`, `t_mark`, `total_q`, `c_answers`, `w_answers`, `date`) VALUES ('".$qid."','".$sid."','".$mark."','".$t_mark."','".$total_q."','".$ccount."','".$wcount."','".date("Y/m/d")."')");
        if($cod1){
            ?>
            <script>
                alert("Examination completed and answers saved successfully.");
                window.location.href ="exam.php";
            </script>
            <?php
        }
      }
   }

 }else{
    header("Location:index.php");
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
    <title>Students</title>

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
       
        <div class="container">
            <h1 class="text-center text-primary"><b>SCHOOL MANAGEMENT SYSTEM</b></h1>
            <br>
            <div class="card">
                <h3 class="text-center card-header">Welcome <?php echo $_SESSION['name'] ?>, you have to select only 1 out of 4 options for each question. Best of Luck :)</h3>
            </div><br>
            <form method="post" action="#">
                <input type="hidden" name="total_q" value="<?php echo $_GET['total']; ?>">
                <input type="hidden" name="cmark" value="<?php echo $_GET['mark']; ?>">
                <input type="hidden" name="wmark" value="<?php echo $_GET['markw']; ?>">
                <input type="hidden" name="qid" value="<?php echo $_GET['token']; ?>">
                <input type="hidden" name="sid" value="<?php echo $_GET['sid']; ?>">
            <?php
                if(isset($_GET['token'])){
                    for($i=1;$i<=$_GET['total'];$i++){
                        $q=mysqli_query($con,"select * from sms_questions where qid='".$_GET['token']."' and q_no='".$i."'");
                        while ($r=mysqli_fetch_assoc($q)) {
                        ?>
                            <div class="card">
                                <h4 class="card-header"><?php echo $i; ?>. <?php echo $r['question']; ?></h4>
                                <?php
                                $qn_id=$r['qn_id'];
                                ?>
                                <input type="hidden" name="qn_id[<?php echo $i; ?>]" value="<?php echo $r['qn_id']; ?>">
                                <?php
                                $q=mysqli_query($con,"select * from sms_options where qn_id='".$qn_id."'");
                                while ($r=mysqli_fetch_assoc($q)) {
                                ?>
                                <div class="card-body">
                                    <label  class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="option[<?php echo $i; ?>]" value="<?php echo $r['oid']; ?>" class="custom-control-input"><span class="custom-control-label"><?php echo $r['value']; ?></span>
                                    </label>
                                </div>
                                <?php
                        }
                    }
                }
               }else{
                    ?>
                    <h3>Exam Id Unavailable</h3>
                    <?php
                }
            ?>
               <input type="submit" name="finish" value="Finish Attempt" class="btn btn-success m-auto d-block">
            </form>  
                            </div>
        </div>
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