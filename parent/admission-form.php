<?php

  include("../connect.php");

  if (isset($_POST['submit'])){

    $name=$_POST['stname'];
    $dob=$_POST['dob'];
    $sex=$_POST['sex'];
    $email=$_POST['email'];
    $fname=$_POST['fathername'];
    $mname=$_POST['mothername'];
    $f_occupation=$_POST['f_occupation'];
    $m_occupation=$_POST['m_occupation'];
    $housename=$_POST['hname'];
    $streetname=$_POST['strtname'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $gname=$_POST['gname'];
    $gemail=$_POST['gemail'];
    $g_hname=$_POST['g_hname'];
    $g_strtname=$_POST['g_strtname'];
    $g_city=$_POST['g_city'];
    $g_pincode=$_POST['g_pincode'];
    $g_phoneno=$_POST['g_phoneno'];
    $nationality=$_POST['nationality'];
    $religion=$_POST['religion'];
    $class=$_POST['class'];
    $medicalinfo=$_POST['medicalinfo'];
    $uname=$_POST['uname'];
    $password=mysqli_real_escape_string($con,$_POST['pass']);

    $val=mysqli_query($con,"select * from sms_admission where g_email='".$gemail."'");
    $val1=mysqli_query($con,"select * from sms_login where name='".$uname."'");

    if(mysqli_num_rows($val)>0){
      ?>
       <script type="text/javascript">
         alert("Guardian's email already exists...! Try another one");
       </script>
      <?php
    }elseif (mysqli_num_rows($val1)>0) {
      ?>
       <script type="text/javascript">
         alert("Student username already exists...! Try another one");
       </script>
      <?php  
    }else{  
      $sql="INSERT INTO `sms_admission`(`s_name`, `dob`, `sex`, `email`, `f_name`, `m_name`, `f_occupation`, `m_occupation`, `house name`, `street name`, `city`, `pincode`, `g_name`, `g_email`, `g_house name`, `g_street name`, `g_city`, `g_pincode`, `g_phone no`, `nationality`, `religion`, `class`, `medical info`) VALUES ('".$name."','".$dob."','".$sex."','".$email."','".$fname."','".$mname."','".$f_occupation."','".$m_occupation."','".$housename."','".$streetname."','".$city."','".$pincode."','".$gname."','".$gemail."','".$g_hname."','".$g_strtname."','".$g_city."','".$g_pincode."','".$g_phoneno."','".$nationality."','".$religion."','".$class."','".$medicalinfo."')";

      $pass=password_hash($password, PASSWORD_BCRYPT);

      $sql1="INSERT INTO `sms_login`(`name`, `pass`, `email`, `role`) VALUES ('".$uname."','".$pass."','".$email."','Student')";

      $result=mysqli_query($con,$sql);
      $result1=mysqli_query($con,$sql1);
      if($result && $result1){
         header("Location:afees.php?gemail=$gemail&class=$class"); 
      }else{
          printf("error :%s\n",mysqli_error($con));
        }
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
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
      opacity: 0.5;
      border-radius: 18px;
      margin-bottom: 30px;
      width: 55%;
      border: none;
    }
    .card h1{
      font-size: 30px;
      font-family: 'Comic Sans MS';
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
      <form action="#" method="post" name="Studentadmission" onSubmit="return(validate());">
        <table cellpadding="10" width="40%" align="center" cellspacing="6">
          <tr>
            <td colspan=4>
              <h1 align="center"><b>Student Admission Form</b></h1>
            </td>
          </tr>
          <tr>
            <td>Name of Student</td>
            <td><input type=text name=stname id="stname" size="25" required></td>
            <td>D.O.B</td>
            <td><input type="date" name="dob" id="dob" size="30" required></td>
          </tr>
          <tr>
            <td>Sex</td>
            <td><input type="radio" name="sex" value="Male" size="10">Male
                <input type="radio" name="sex" value="Female" size="10">Female
                <input type="radio" name="sex" value="Other" size="10">Others</td>
            <td>Email Id</td>
            <td><input type="email" name="email" id="email" size="25" required></td>
          </tr>
          <tr>
            <td>Father's Name</td>
            <td><input type="text" name="fathername" id="fathername" size="25" required></td>
            <td>Mothers's Name</td>
            <td><input type="text" name="mothername" id="mothername" size="25" required></td>
          </tr>
          <tr>
            <td><b>Occupation:</b><br>
            Father</td>
            <td><br><input type="text" name="f_occupation" id="f_occupation" size="25" required></td>
            <td><br>Mother</td>
            <td><br><input type="text" name="m_occupation" id="m_occupation" size="25"required></td>
          </tr>
          <tr>
            <td><b>Address:</b><br>
            House Name</td>
            <td><br><input type="text" name="hname" id="hname" size="25" required></td>
            <td><br>Street Name</td>
            <td><br><input type="text" name="strtname" id="strtname" size="25" required></td>
          </tr>
          <tr>
            <td>City</td>
            <td><input type="text" name="city" id="city" size="25" required></td>
            <td>Pincode</td>
            <td><input type="text" name="pincode" id="pincode" size="25" required></td>
          </tr>
          <tr>
            <td>Name of Guardian</td>
            <td><input type="text" name="gname" id="gname" size="25" required></td>
            <td>Guardian's Email Id</td>
            <td><input type="email" name="gemail" id="gemail" size="25" required></td>
          </tr>
          <tr>
            <td colspan="2"><b>Guardian's Address:</b><br></td>
          </tr>
          <tr>
            <td>House Name</td>
            <td><input type="text" name="g_hname" id="g_hname" size="25" required></td>
            <td>Street Name</td>
            <td><input type="text" name="g_strtname" id="g_strtname" size="25" required></td>
          </tr>
          <tr>
            <td>City</td>
            <td><input type="text" name="g_city" id="g_city" size="25" required></td>
            <td>Pincode</td>
            <td><input type="text" name="g_pincode" id="g_pincode" size="25" required></td>
          </tr>
          <tr>
            <td>Phone No:</td>
            <td><input type="text" name="g_phoneno" id="g_phoneno" size="25" required></td>
          </tr>
          <tr>
            <td>Nationality</td>
            <td><input type="text" name="nationality" id="nationality" size="25" required></td>
            <td>Religion</td>
            <td><input type="text" name="religion" id="religion" size="25" required></td>
          </tr>
          <tr >
            <td colspan="2">Class in which admission sought &nbsp;
              <select Name="class">
                <option value="-1" selected>select..</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
                <option value="VII">VII</option>
                <option value="VIII">VIII</option>
                <option value="IX">IX</option>
                <option value="X">X</option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2"><b>Student Login Details:</b><br></td>
          </tr>
          <tr>
            <td>Username</td>
            <td><input type="text" name="uname" size="25" required></td>
            <td>Password</td>
            <td><input type="text" name="pass"  size="25" required></td>
          </tr>
          <tr>
            <td colspan="4">Is there any Medical Information about the student that School should be aware (If nothing specify NIL)
              <textarea rows="5" cols="90" name="medicalinfo" id="medicalinfo" size="30" required></textarea>
            </td>
          </tr>
          <tr>
            <td colspan="4"><input type="checkbox" name="declaration" id="declaration">
              I hereby declare that the information given in this application is true and correct to the best of my knowledge and belief.
            </td>
          </tr>
          <tr>
            <td><input type="reset"></td>
            <td><input type="submit" name="submit" value="Submit"></td>
          </tr>
        </table>
      </form>
    </div>
  </center>
  <script type="text/javascript">
    function validate(){

      if ( ( Studentadmission.sex[0].checked == false ) && ( Studentadmission.sex[1].checked == false ) && ( Studentadmission.sex[2].checked == false ) )
      {
        alert ( "Please choose your Gender" );
        return false;
      }

      if( document.Studentadmission.pincode.value == "" || isNaN( document.Studentadmission.pincode.value) || document.Studentadmission.pincode.value.length != 6 )
      {
        alert( "Please provide a valid 6 digit pincode.");
        document.Studentadmission.pincode.focus();
        return false;
      }

      if( document.Studentadmission.g_pincode.value == "" || isNaN( document.Studentadmission.g_pincode.value) || document.Studentadmission.g_pincode.value.length != 6 )
      {
        alert( "Please provide a valid 6 digit pincode.");
        document.StudentRegistration.pincode.focus() ;
        return false;
      }

      if( document.Studentadmission.g_phoneno.value == "" || isNaN( document.Studentadmission.g_phoneno.value) || document.Studentadmission.g_phoneno.value.length != 10 )
      {
        alert( "Please provide a valid 10 digit Mobile No." );
        document.TeacherRegistration.contactno.focus() ;
        return false;
      }

      if( document.Studentadmission.class.value == "-1" )
      {
        alert( "Please select the class to which admission is sought." );
        return false;
      }

      if( !document.getElementById('declaration').checked)
      {
        alert( "Please accept the declarations." );
        return false;
      }
      return true;
    } 
  </script>
</body>
</html>