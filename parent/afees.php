<?php

 include("../connect.php");

 if (isset($_POST['pay'])) {
   $gemail=$_GET['gemail'];
   $class=$_GET['class'];
   $time=date("h:i:sa");

   $fee=mysqli_query($con,"INSERT INTO `sms_fees`(`class`, `remark`, `amount`, `date`, `time`) VALUES ('".$class."','Admission Fee','2800','".date("Y/m/d")."','".$time."')");
   if($fee){
    ?>
      <script>
        alert("Admission has been proceeded. You will get an email to the Guardian's id after admission is completed.");
        window.location.href='../index.php';
      </script>
    <?php
    $qry=mysqli_query($con,"select * from sms_admission where g_email='".$gemail."'");
    $qry1=mysqli_query($con,"select id from sms_fees where date='".date("Y/m/d")."' and time='".$time."'");
    $r=mysqli_fetch_array($qry);
    $f=mysqli_fetch_array($qry1);
    mysqli_query($con,"INSERT INTO `sms_notification`(`notifications_name`, `message`, `active`) VALUES ('Admission request','ID no ".$r["id"]." requests for Admission. Fee id ".$f["id"]."','1')");
   }
 }

?>

<!DOCTYPE html>
<html>
<head>
 <title>Admission Fees</title>
 <style type="text/css">
    .background{
      height: 200%;
    } 
    .logo{
      background-color: #0a0236;
      height: 10vh;
      background-size: cover;
      background-position: center;
    }
    .logo img{
      float: left;
      width: 50px;
      height: auto;
    }
    .logo h1{
      color: #fff;
    }
    .card {
      background-color: white;
      opacity: 0.7;
      border-radius: 18px;
      margin-bottom: 30px;
      width: 55%;
      border: none;
    }
    .card h1{
      font-size: 30px;
      font-family: 'Comic Sans MS';
    }
    .card p{
      text-align: left;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      text-align: left;
      height: 40px;
    }
    input[type = "submit"]{
      border: 0;
      background: #000000;
      display: block;
      margin: 20px auto;
      text-align: center;
      font-weight: bold;
      font-family: 'Comic Sans MS';
      border: 4px solid brown;
      padding: 14px 30px;
      width: 150px;
      outline: none;
      color: white;
      border-radius: 25px;
      transition: 0.24
    } 

    input[type = "submit"]:hover{
      background: brown;
    }
    button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 10px 30px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
    }
  </style>
</head>
<body bgcolor="#0a0236">
  <div class="logo">
    <img src="img/logo.png"></a>
    <h1><i>SCHOOL MANAGEMENT SYSTEM</i></h1>
  </div>
  <center>
    <div class="card">
      <h1 align="center">Admission Fees</h1>
      <?php
      $det=mysqli_query($con,"select * from sms_admission where g_email='".$_GET['gemail']."'");
      if(mysqli_num_rows($det)>0){
        $fet=mysqli_fetch_assoc($det);
        ?>
        <p>&emsp;Date :<?php echo date("d/m/Y") ?><br><br>&emsp;Parent :<br>&emsp;<?php echo $fet['g_name']; ?><br>&emsp;<?php echo $fet['g_house name']; ?><br>&emsp;<?php echo $fet['g_street name'];?>&emsp;<?php echo $fet['g_city'] ?></p>
        <?php
      }
      ?>
      <table style="width:80%">
        <tr>
          <th>No</th>
          <th>Item</th>
          <th>Details</th>
          <th>Amount</th>
          <th>Other</th>
          <th>Total</th>
        </tr>
        <tr>
          <td>1</td>
          <td>Carrer Guidance</td>
          <td>at Rs. 300.00</td>
          <td>300</td>
          <td>0.00</td>
          <td>300.00</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Examinations</td>
          <td>at Rs. 400.00</td>
          <td>400</td>
          <td>0.00</td>
          <td>400.00</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Library Fee</td>
          <td>at Rs. 500.00</td>
          <td>500</td>
          <td>0.00</td>
          <td>500.00</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Poor Students Fund</td>
          <td>at Rs. 500.00</td>
          <td>500</td>
          <td>0.00</td>
          <td>500.00</td>
        </tr>
        <tr>
          <td>5</td>
          <td>PTA Menbership Fee</td>
          <td>at Rs. 100.00</td>
          <td>100</td>
          <td>0.00</td>
          <td>100.00</td>
        </tr>
        <tr>
          <td>6</td>
          <td>Caution Deposit</td>
          <td>at Rs. 1000.00</td>
          <td>1000</td>
          <td>0.00</td>
          <td>1000.00</td>
        </tr>
        <tr>
          <th colspan="5">Total Amount (Rs)</th>
          <th>2800</th>
        </tr>
      </table>
      <form method="post" action="#">
          <div style="text-align:center;">
            <br>
            <button onclick="printpage()" id="printpagebutton">Print Receipt</button>
            <input type="submit" name="pay" value="Pay Rs.2800" id="paybutton">
          </div>
      </form>
    </div>
  </center>
</body>
<script type="text/javascript">
  function printpage() {
    //Get the print button and put it into a variable
    var printButton = document.getElementById("printpagebutton");
    var payButton = document.getElementById("paybutton");
    //Set the print button visibility to 'hidden' 
    printButton.style.visibility = 'hidden';
    payButton.style.visibility = 'hidden';
    //Print the page content
    window.print()
    printButton.style.visibility = 'visible';
    payButton.style.visibility = 'visible';
  }
</script>
</html>