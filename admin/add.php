<?php
  include("connect.php");
  if(isset($_POST['submit'])){
    $uname=$_POST['uname'];
    $password=mysqli_real_escape_string($con,$_POST['pass']);
    $email=$_POST['email'];

    $pass=password_hash($password, PASSWORD_BCRYPT);

    $cod=mysqli_query($con,"INSERT INTO `sms_login`(`name`, `pass`, `email`, `role`) VALUES ('".$uname."','".$pass."','".$email."','Parent')");
    if($cod){
?>
      <script>
        alert("Data Inserted Successfully");
      </script>
<?php
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>add</title>
</head>
<body>
<form action="" method="post">
  Username :<input type="text" name="uname">
  Password :<input type="text" name="pass">
  Email :<input type="email" name="email"><br>
  <input type="submit" name="submit">
</form>
</body>
</html>