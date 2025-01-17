<?php session_start();
include("../db.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $gmail = $_POST['gmail'];
    $pass = $_POST['pass'];

    if (!empty($gmail) && !empty($pass) && !is_numeric($gmail)) {
        $query = "SELECT * FROM new_meet_login WHERE gmail = '$gmail' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['pass'] == $pass) { // Fixed variable name
                  echo "<script type='text/javascript'>alert('$gmail');</script>";

                    header("Location: ../stu-dash/index.html"); // Fixed header syntax
                    $SESSION['user_name'] = $gmail;

                    die;
                }
            }
        }
        echo "<script type='text/javascript'>alert('Wrong Information!!!');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Wrong Information!!!');</script>";
    }
}
?> 


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Login</title>
  <link rel="icon" href="./images/main-logo.png">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/851e180364.js" crossorigin="anonymous"></script>
</head>
<body>
  <header class="header">
    <a href="/index.html"><img src="../images/main-logo.png" alt="nskc-logo"></a>
    <a href="../student-signup/index.php">
    <button class="login-btn">Sign-Up</button>
    </a>
  </header>
  <main class="content">
    <h1>Login Your <span style="color: dodgerblue;">NSKC</span> Account</h1>
    <div class="illustration">
      <img src="../images/student-login/log.png" alt="Person working" class="person">
    </div>
  </main>
  
  <div class="container">
    <h2>Log In</h2>
    <!-- <div class="social-signup">
      <button class="social-btn email"><img src="/Gmail_Logo.png"> Email</button>
      <button class="social-btn google"><img src="google_logo.png" style="width: 16px;"> Google</button>
      <button class="social-btn linkedin"><img src="linkedin.png" style="width: 16px;"> LinkedIn</button>
      <button class="social-btn microsoft"><img src="microsoft.png" style="width: 16px;"> Microsoft</button>
    </div> -->
    <form class="signup-form" method="POST">
      <!-- <div class="form-row">
        <input type="text" placeholder="First Name*" required>
        <input type="text" placeholder="Last Name*" required>
      </div> -->
      <input type="email" placeholder="Email*" id="stumail" name="gmail" required>
      <div class="password-field">
        <input type="password" placeholder="Password*" id="stupwd"  name="pass" required>
        <button type="button" class="show-password"></button>
      </div>
      <!-- <label>
        <input type="checkbox" required>I agree to the terms and conditions
      </label> -->
      <button type="submit" class="submit-btn">Submit</button>
    </form>
    <p>You Are a New User ? <a href="#">Sign up</a></p>
  </div>


  <footer>
    <div class="footer-container">
      <div class="footer-section">
        <h4>Explore More</h4>
        <ul>
          <li><a href="#">Day Care</a></li>
          <li><a href="#">Skill Development</a></li>
          <li><a href="/tution/index.html">Tution</a></li>
          <li><a href="#">Internship</a></li>
          <li><a href="#">Online Mock Test</a></li>
        </ul>
      </div>

      <div class="footer-section">
        <h4>NSKC'S</h4>
        <ul>
          <li><a href="#">Franchaise</a></li>
          <li><a href="#">Become a Tutor</a></li>
          <li><a href="#">TIN</a></li>
          <li><a href="./tutor-profile/index.html">Our Creators</a></li>
          <li><a href="#">Store</a></li>
        </ul>
      </div>

      <div class="footer-section">
        <h4>Others</h4>
        <ul>
          <li><a href="#">About US</a></li>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">Privacy & Policy</a></li>
          <li><a href="#">Refund Policy</a></li>
          <li><a href="#">Testimonials</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Customer Support</a></li>
        </ul>
      </div>

      <div class="footer-section">
        <h4>Contact Us</h4>
        <ul>
          <li><a href="tel:9943667676"><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;99 43 66 76 76</a></li>
            <li><a href="mailto:nskcacademy@gmail.com"><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;nskcacademy@gmail.com</a></li>
          <li><a href="#"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;<b>Head Office</b><br>56, Middle Street,Kalugumalai - 628 552.</a></li>
          <li><a href="#"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;<b>Branch Office</b><br>68, West Street,Kalugumalai Road, Near Padma Clinic, Thiruvengadam.</a></li>
          
          
        </ul>
      </div>


      <div class="footer-bottom">
        <p>© NSKC 2024</p>
        <div class="social-icons">
            <a href="https://www.facebook.com/profile.php?id=100077476391143"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/nethrashree_academy/"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.youtube.com/@nskcacademy/"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </footer>
  <!-- <script>
    
    function tut(e){
      var a = document.getElementById("stumail").value;
    var b = document.getElementById("stupwd").value;
      e.preventDefault();
      if (a == "vasanth@gmail.com" && b == "Vasanth@2001") {
        alert("Hai")
      window.location.href="../stu-dash/index.html";
    }else{
      alert("Invalid Credentials");
    }
    }
  </script> -->
</body>
</html>