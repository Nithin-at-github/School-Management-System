<?php
  include("../connect.php");
  $error="";
  $conf="";

  if (isset($_POST['username'])) {
    session_start();
    $uname=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    $sql="select * from sms_login where name='".$uname."'";
    
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)>0){
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
      if(password_verify($password, $row['pass'])){
        if($row['role']=='Student'){

          $_SESSION['id']=$row['id'];
          $_SESSION['name']=$row['name'];
          header("Location:dashboard/index.php");
        }else{
            $error="1";
          }
      }else{
          $error="1";
        }  
    }else{
        $error="1";
      }
  }

  if(isset($_POST['submit1'])){
    $name=$_POST['uname'];

    $qry=mysqli_query($con,"select * from sms_login where name='".$name."'");
    if(mysqli_num_rows($qry)>0){
      $fet=mysqli_fetch_array($qry);
      $token=$fet['id'];

      $to=$fet['email'];
      $sub="Reset Password";
      $msg="Hai ".$name.", 
              Click here to reset your password http://localhost/MiniProject/teacher/reset-pass.php?token=$token ";
      $from="From: schoolsms110@gmail.com";

      if(mail($to, $sub, $msg, $from)){
        $conf=1;
      }
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Login</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
  <section id="login">
     <form class="box" method="post" action="#">
       <h1>Login</h1>
       <p class="error">
         <?php
           if($error==1){
             echo " <font color=red> Invalid Username or Password </font> ";
           }
           if($conf==1){
             echo " <font color=green> Check Your Registered Mail </font> ";
           }
         ?>
       </p>
       <input type="text" name="username" placeholder="Username" required>
       <input type="password" name="password" placeholder="Password" required>
       <input type="submit" name="" value="Login">
       <a href="#forget" onclick="show_hide()">Forgot Password..?</a>
     </form>
  </section>   
  <section id="forget" style="display: none;">
   
    <form action="" class="box" method="post">
      <h1>Enter Your Username</h1>
      <input type="text" name="uname" placeholder="Username" required>
      <input type="submit" name="submit1" value="Submit">
    </form>

  </section>
  <script>
    function show_hide() {
      var x = document.getElementById("forget");
      var y = document.getElementById("login");
      if (x.style.display === "none") {
        y.style.display = "none";
        x.style.display = "block"; 
      } else {
          x.style.display = "none";
          y.style.display = "block";
        }
    }
  </script>
</body>
</html>