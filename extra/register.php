<!DOCTYPE html>
<html>
    <head>
        <title>VCODE</title>
        
    </head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/magnific-popup.css"/>
  <link rel="stylesheet" href="css/slicknav.min.css"/>
  <link rel="stylesheet" href="css/owl.carousel.min.css"/>

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="css/style.css"/>
  <style>
body{
        text-align: center; 
        font-family: "Open Sans";font-size: 15px;
        }
form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
 text-align: center;
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
input[type=email]{
  text-align: center;
  width: 20%;
  padding: 12px 20px;
  margin:  8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
/* Set a style for all buttons */
button {
  text-align: center;
  background-color: orange;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}


/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 25px 25px;
}

/* Avatar image */
img.avatar {
  width: 20;
  border-radius: 20%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: center;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: inline;
    float: none;
  }
  </style>
 <?php
 
include('config.php');
session_start();
 
if (isset($_POST['register'])) {
 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
 
    $query = $connection->prepare("SELECT * FROM users WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<p class="error">The email address is already registered!</p>';
    }
 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(USERNAME,PASSWORD,EMAIL) VALUES (:username,:password_hash,:email)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();
 
        if ($result) {
            echo '<p class="success">Your registration was successful!</p>';
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
    }
}
 ?>
 <body>
 
          <header>
            <div class="main">
           
  <div class="imgcontainer">
    <a href="index.html"><img src="logo2.png" alt="Avatar" class="avatar"></a>
    <h3>Learn Courses for Free!</h3>
  </div>

    <div class="container">
  
<form method="post" action="" name="connect.php">
 <div class="form-element">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" pattern="[a-zA-Z0-9]+" required />
   </div>
   <div class="form-element">
    <label for="uname"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="uname" required>
  </div>
      <div class="form-element"
    <label for="uname1"><b>Phone.No</b></label>
    <input type="text" placeholder="Enter Phone Number" name="uname1" required>
  </div>
    <div class="form-element">
        <label><b>Email --  Id </b></label>
        <input type="email" placeholder="Enter Email Id" name="email" required />
     </div>
      <div class="form-element">
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required />
  </div>
    <div class="form-element">
    <button type="submit" name="register" value="register">Register</button>
  </div>
    <div class="form-element">
     <label>

      <input type="checkbox" checked="checked" name="remember"> Remember me<br><br>
    </label>
  </div>
  </div>

  <div class="container" style="background-color:#f1f1f1">
      <span class="psw">Don't have an account? <a href="signup2.html">Sign Up <br><br></a><a href="forgot.html"> Forgot Password</a></span>
  </div>
</form>
</div>

</header>
</body>
        <!-- Footer section -->
  <footer class="footer-section spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="footer-widget about-widget">
            <p align="center">
            <a href="index.html"><img src="logo1.png"></a>
            </p>
            <p>Our objective is to make a
learning platform that motivates people who are not tech-savvy to improve their skills. We want
to provide a fun, interactive way for them to learn how to code so that they can be the
developers of tomorrow! </p>
            <div class="footer-social">
              <a href=""><i class="fa fa-facebook"></i></a>
              <a href=""><i class="fa fa-twitter"></i></a>
              <a href=""><i class="fa fa-dribbble"></i></a>
              <a href=""><i class="fa fa-behance"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer-widget">
            <h2 class="fw-title">Useful Resources</h2>
            <ul>
              <li><a href="">Jobs Vacancies</a></li>
              <li><a href="">Client Testimonials</a></li>
          
            
              <li><a href="">About our Work</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer-widget">
            <h2 class="fw-title">Our Solutions</h2>
            <ul>
              <li><a href="">Automation</a></li>
              <li><a href="">Artificial Intelligence</a></li>
              <li><a href="">Neural Networks</a></li>
              
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-7">
          <div class="footer-widget">
            <h2 class="fw-title">Contact Us</h2>
            <div class="footer-info-box">
              <div class="fib-icon">
                <img src="img/icons/map-marker.png" alt="" class="">
              </div>
              <div class="fib-text">
                <p>Gorbachev Rd, Vellore<br>Tamil Nadu 632014</p>
              </div>
            </div>
            <div class="footer-info-box">
              <div class="fib-icon">
                <img src="img/icons/phone.png" alt="" class="">
              </div>
              <div class="fib-text">
                <p>+123456789<br>contact@vcode.in</p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    

  
    </body>
</html>

