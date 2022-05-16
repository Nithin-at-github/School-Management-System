<?php
  include("connect.php");

  if (isset($_POST['submit'])) {

    $uname=$_POST['username'];
    $newpass=mysqli_real_escape_string($con,$_POST['pass']);
    $confpass=mysqli_real_escape_string($con,$_POST['cpass']);
    $email=$_POST['email'];

    $namequery= "select * from sms_login where name='".$uname."'";
    $query= mysqli_query($con,$namequery);

    if(mysqli_num_rows($query)>0){
      ?>
        <script>
          alert("Username Already Exits...! Try another one");
        </script>
      <?php
    }else{
      if($newpass==$confpass){
        $pass=password_hash($newpass, PASSWORD_BCRYPT);

        $sql="INSERT INTO `sms_login` (name,pass,email,role) VALUES ('".$uname."', '".$pass."', '".$email."', 'Parent')";
        $iquery=mysqli_query($con,$sql);
        if($iquery){
          header("Location:parent/admission-form.php");
        }elseif(false===$iquery){
          printf("error :%s\n",mysqli_error($con));
        }
      }else{
          ?>
          <script>
            alert("Password not matching....!");
          </script>
<?php
      }
    }

  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Mini Project</title>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
</head>
<body>
 <header>
 	<div class="logo">
 		<br>
		<a href="#" name="home"><img src="img/logo.png"></a>
	</div>
	 <div>
	    <h1><i>SCHOOL MANAGEMENT SYSTEM</i></h1>
	 </div> 
	<div class="main">
		<ul>
			<li class="active"><a href="#Home">Home</a></li>
			<li><a href="#Admission">Admission</a></li>
			<li><a href="#Services">Services</a></li>
			<li><a href="#Gallery">Gallery</a></li>
			<li><a href="#">Login</a>
			   <ul>
			  	 <li><a href="teacher/t_login.php">Teacher</a></li><br>
			  	 <li><a href="student/s_login.php">Student</a></li><br>
			  	 <li><a href="parent/p_login.php">Parent</a></li>
			   </ul>
			</li>
			<li><a href="#About">Contact Us</a></li>
		</ul>
	</div>
 </header>
 <section class="sub" id="Home">
	<div class="title">
		<br><br><br><br><br>
	  <h1>WELCOME TO ONLINE SCHOOL</h1>
	</div>
	<div class="up">
	  <a href="#home"><img src="img/up.png"></a>
    </div>
 </section>

 <section id="Admission">
    <div class="adm"><br>	
	    <h1 align="center">ADMISSION SECTION</h1>
      <br><br>
	    <h4> &nbsp; Please sign up as parent to take admission to the School. This is the first step of admission procedure. You need to provide your username,password and a security question and its corresponding answer.This is used while you forgot your password.</h4>
	    <div class="signup">
        <form class="" action="#" method="post">
          <h1>Sign Up</h1>
          <input type="text" name="username" placeholder="Username" class="textb" required>
          <input type="password" name="pass" placeholder="Password" class="textb" required>
          <input type="password" name="cpass" placeholder="Confirm Password" class="textb" required>
          <input type="email" name="email" placeholder="Email" class="textb" required>
          <input type="submit" name="submit" value="Create Account" class="signup-btn">
          <a href="parent/p_login.php">Already Have one ?</a>
        </form>
      </div>
	  </div>	
 </section>

<section id="Services">
	<div class="ser"><br>
 	 <h1 align="center">OUR SERVICES</h1>
 	 <br><br>
	 <div class="swiper-container">
       <div class="swiper-wrapper">

         <div class="swiper-slide">
         	<div class="card">
    	      <div class="card-image1"></div>
    	      <div class="card-text">
    		    <h2>Admission Module</h2>
    		    <p>Our Admission Module facilitates a hassle-free, paper-less, completely digital admissions process. By integrating administrative tasks, like registering new admissions, through a seamless, easy to use interface, you can create and update student and parent profiles without errors ... </p>
    	      </div>
	        </div>
         </div>

         <div class="swiper-slide">
            <div class="card">
    	      <div class="card-image2"></div>
    	      <div class="card-text">
    		    <h2>Student Fee Module</h2>
    		    <p>With numerous readily available payment systems and platforms, keeping a record of fees paid by students can be a tedious task if done manually. It is also difficult for parents to track fee structure and concession details ...</p>
    	      </div>
	        </div>
	     </div>   

         <div class="swiper-slide">
            <div class="card">
    	      <div class="card-image3"></div>
    	      <div class="card-text">
    		    <h2>Attendance Module</h2>
    		    <p>Proper time and attendance management remain the cornerstone of any educational institution. Integral solutions ‘Attendance module’ allows thorough attendance planning, review and control ...</p>
    	      </div>
	        </div>
	     </div>   

         <div class="swiper-slide">
            <div class="card">
    	      <div class="card-image4"></div>
    	      <div class="card-text">
    		    <h2>Library Management</h2>
    		    <p>With innovative solutions for your Administrative needs IWS’ ‘Library Management Software’ is an advanced and user friendly system that brings the library to each stakeholder’s desktop ...</p>
    	      </div>
	        </div>
	     </div>   

         <div class="swiper-slide">
            <div class="card">
    	      <div class="card-image5"></div>
    	      <div class="card-text">
    		    <h2>Examination Module</h2>
    		    <p>The Student Examination Module allows teachers, students and parents to communicate, track and collaborate on important areas surrounding Student Examinations, Performance and Policies ...</p>
    	      </div>
	        </div>
	     </div>   

         <div class="swiper-slide">
            <div class="card">
    	      <div class="card-image6"></div>
    	      <div class="card-text">
    		    <h2>Payroll Module</h2><br>
    		    <p>The Payroll Module is used to pay the salaries of the employees.The salaries will be paid to the bank account given by employees at the time of joining... </p>
    	      </div>
	        </div>
	     </div>   

         <div class="swiper-slide">
            <div class="card">
    	      <div class="card-image7"></div>
    	      <div class="card-text">
    		    <h2>Leave Management</h2>
    		    <p>Our Leave Management Module facilitates a hassle-free, paper-less, completely digital Leave Management process.By accessing this module employees can apply for leave and they will be notified when it is sanctioned... </p>
    	      </div>
	        </div>
	     </div>   

       </div>

       <!-- Add Pagination -->
       <div class="swiper-pagination"></div>
     </div>
    
	 <script type="text/javascript" src="js/swiper.min.js"></script>
	 <script>
       var swiper = new Swiper('.swiper-container', {
       effect: 'coverflow',
       grabCursor: true,
       centeredSlides: true,
       slidesPerView: 'auto',
       coverflowEffect: {
         rotate: 50,
         stretch: 0,
         depth: 100,
         modifier: 1,
         slideShadows: true,
        },
       pagination: {
         el: '.swiper-pagination',
        },
       });
     </script>

    </div>
</section>

<section id="Gallery">
  <div class="gall">
       <br>
 	     <h1 align="center">GALLERY</h1><br>
       <div class="responsive">
          <div class="gal">
	           <a href="img/g1.jpg" data-lightbox="mygallery"><img src="img/g1.jpg" width="300" height="200"></a>
	        </div>
       </div>
	     <div class="responsive">
          <div class="gal">
	           <a href="img/g2.jpg" data-lightbox="mygallery"><img src="img/g2.jpg" width="300" height="200"></a>
	        </div>
       </div>
       <div class="responsive">
          <div class="gal">
	           <a href="img/g3.jpg" data-lightbox="mygallery"><img src="img/g3.jpg" width="300" height="200"></a>
	        </div>
       </div>
       <div class="responsive">
          <div class="gal">
	           <a href="img/g4.jpg" data-lightbox="mygallery"><img src="img/g4.jpg" width="300" height="200"></a>
	        </div>
       </div>
       <div class="responsive">
          <div class="gal">
	           <a href="img/g5.jpg" data-lightbox="mygallery"><img src="img/g5.jpg" width="300" height="200"></a>
	        </div>
       </div>
       <div class="responsive">
          <div class="gal">
	           <a href="img/g6.jpg" data-lightbox="mygallery"><img src="img/g6.jpg" width="300" height="200"></a>
	        </div>
       </div>
       <div class="responsive">
          <div class="gal">
	           <a href="img/g7.jpg" data-lightbox="mygallery"><img src="img/g7.jpg" width="300" height="200"></a>
	        </div>
       </div>
       <div class="responsive">
          <div class="gal">
	           <a href="img/g8.jpg" data-lightbox="mygallery"><img src="img/g8.jpg" width="300" height="200"></a>
	        </div>
       </div>
       <div class="responsive">
          <div class="gal">
	           <a href="img/g9.jpg" data-lightbox="mygallery"><img src="img/g9.jpg" width="300" height="200"></a>
	        </div>
       </div>
       <div class="responsive">
          <div class="gal">
	           <a href="img/g10.jpg" data-lightbox="mygallery"><img src="img/g10.jpg" width="300" height="200"></a>
	        </div>
       </div>
       <div class="responsive">
          <div class="gal">
	           <a href="img/g11.jpg" data-lightbox="mygallery"><img src="img/g11.jpg" width="300" height="200"></a>
	        </div>
       </div>
       <div class="responsive">
          <div class="gal">
	           <a href="img/g12.jpg" data-lightbox="mygallery"><img src="img/g12.jpg" width="300" height="200"></a>
	        </div>
       </div>
  </div>	 
</section>

 <section class="abt" id="About">
    <br><br>
    <h1 align="center">CONTACT US</h1>
    <br><br><br>
    <div class="ab">	
       <div class="sm">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-google-plus"></i></a>
       </div>
	  </div>	
 </section>

</body>
</html>