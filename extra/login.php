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
input[type=submit]{
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
 
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['username'];
            echo '<p class="success">Congratulations, you are logged in!</p>';
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
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
<form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>
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

