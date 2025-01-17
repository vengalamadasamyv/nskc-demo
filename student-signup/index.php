<?php
  session_start();

  include("../db.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $name = $_POST['user_name'];
    $lname = $_POST['last_name'];
    $no = $_POST['mobile'];
    $mail = $_POST['gmail'];
    $pwd = $_POST['pass'];
    $cpwd = $_POST['cpass'];

    if(!empty($mail) && !empty($pwd) && !is_numeric($mail))
    {
      $query = "insert into new_meet_login (user_name, last_name, mobile, gmail, pass, cpass) values ('$name' , '$lname' , '$no' , '$mail' , '$pwd' , '$cpwd')";

      mysqli_query($con, $query);

      echo "<script type='text/javascript'> alert('Successfully Registered!!!')</script>";
    }
    else
    {
      echo "<script type='text/javascript'> alert('Please Enter Some Valid Information!!!')</script>"; 
    }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student SignUp</title>
  <link rel="icon" href="/images/main-logo.png">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/851e180364.js" crossorigin="anonymous"></script>
</head>
<body>
  <header class="header">
    <a href=".index.html"><img src="../images/main-logo.png" alt="nskc-logo"></a>
    <a href="../student-login/index.php">
      <button class="login-btn">Log-In</button>
    </a>
  </header>
  <main class="content">
    <h1>Create Your <span style="color: dodgerblue;">NSKC</span> Account</h1>
    <div class="illustration">
      <img src="../images/student-signup/signup.png" alt="Person working" class="person">
    </div>
  </main>
  
  <div class="container">
    <h2>Sign Up</h2>
    <!-- <div class="social-signup">
      <button class="social-btn email"><img src="/Gmail_Logo.png"> Email</button>
      <button class="social-btn google"><img src="google_logo.png" style="width: 16px;"> Google</button>
      <button class="social-btn linkedin"><img src="linkedin.png" style="width: 16px;"> LinkedIn</button>
      <button class="social-btn microsoft"><img src="microsoft.png" style="width: 16px;"> Microsoft</button>
    </div> -->
    <form class="signup-form" action="#" method="POST">
      <div class="form-row">
        <input type="text" placeholder="First Name*" name="user_name" required>
        <input type="text" placeholder="Last Name*" name="last_name" required>
      </div>
      <input type="email" placeholder="mail*" name="gmail" required>
      <input type="text" placeholder="Mobile Number*" name="mobile" required>
      <div class="password-field">
        <input type="password" id="password" placeholder="Password*" name="pass" required>
      </div>
      <div class="password-field">
        <input type="password" id="confirm-password" placeholder="Confirm Password*" name="cpass" required>
      </div>
      <span class="error" id="password-match-error" style="display: block;"></span>
      <input type="checkbox" class="rad" id="ready" required>
      <label for="ready">
        I agree to the <a href="/terms/index.html">terms and conditions</a>
      </label>
      <button type="submit" class="submit-btn">Submit</button>
    </form>
    <p>Registered Already ? <a href="#">Login</a></p>
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
<script>
  const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirm-password');
    const passwordMatchError = document.getElementById('password-match-error');
    
    confirmPasswordField.addEventListener('input', function() {
        if (passwordField.value !== confirmPasswordField.value) {
            passwordMatchError.innerText = "Passwords do not match!";
            passwordMatchError.style.color = 'red';
        } else {
            passwordMatchError.innerText = "";  // Clear error when passwords match
        }
    });
</script>
</body>
</html>