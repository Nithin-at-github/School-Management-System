<?php
  include("../connect.php");

  if (isset($_POST['submit'])) {
    if(isset($_GET['token'])){
      $token=$_GET['token'];

      $newpass=mysqli_real_escape_string($con,$_POST['pass']);
      $cpassword=mysqli_real_escape_string($con,$_POST['cpass']);

      if($newpass==$cpassword){
        $pass=password_hash($newpass, PASSWORD_BCRYPT);
        $sql=" UPDATE `sms_login` SET `pass`='".$pass."' WHERE `id`='".$token."' ";
        $result=mysqli_query($con,$sql);

        if($result){
          ?>
          <script>
            alert("Password Reseted Successfully.");
            window.location.href='index.php';
          </script>
          <?php
        }else{
          ?>
          <script>
            alert("Some error occured.! Cannot reset password.");
          </script>
          <?php
        }
      }else{
        ?>
        <script>
          alert("Passwords not matching...!.");
        </script>
        <?php
      }
    }   
  }   
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reset Password</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
  <section id="forget">
    <form method="post" action="#" class="box">
      <h1>RESET PASSWORD</h1>
      
      <input type="password" name="pass" placeholder="New Password" required>
      <input type="password" name="cpass" placeholder="Confirm Password" required>
      <input type="submit" name="submit" value="Submit">  
    </form>
  </section>
</body>
</html>