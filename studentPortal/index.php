<?php 
  include("database/database.php");
  session_start();
?> 


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>E-Note | Student Portal | Home</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/bootstrap.min.css">

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
</head>

<body>
  <!-- Header -->
  <header class="navbar">
    <div class="logoDiv">
      <a href="index.php"><img src="images/logo.jpg" alt="E-Note" class="logo img-responsive"></a>
    </div>
    <div class="buttonDiv navbar-end">
      <button class="btn" data-toggle="modal" data-target="#signUp">Sign up</button>
      <button class="btn" data-toggle="modal" data-target="#signIn">Sign in</button>
    </div>
  </header>
  <!-- Navbar -->
  <nav class="navbar" style="background:white;">
    <div class="navbar-end">
      <div class="navbar-item btn-group">
        <a href="../index.php"><button class="button">Home</button></a>
        <a href="contactUs.php"> <button class="button">Contact</button></a>
      </div>
    </div>
  </nav>
  <!-- Main Contents -->
  <div class="content">
    <div class="welcome">
      <h1 class="text-light">WELCOME TO E-NOTE STUDENT PORTAL</h1>
      <h2 class="text-light">COMMINICATE WITH TEACHERS AND MENTORS <br>
        CLEAR YOUR DOUBTS </h2>
    </div>
  </div>
  <div class="welcomeButtons">
    <button class="btn" data-toggle="modal" data-target="#signUp">Sign up</button>
    <button class="btn" data-toggle="modal" data-target="#signIn">Sign in</button>
    <button class="btn">About us</button>
  </div>

  <!-- Sign in Modal -->
  <div class="modal fade" id="signIn">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <button class="btn">LOGIN</button>
          <button class="btn" data-toggle="modal" data-target="#signUp" data-dismiss="modal">REGISTER</button>
          <button class="btn modalClose" type="button" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body signInBody">
          <form action="" method="post">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="customRadio" name="person" value="student" checked>
              <label class="custom-control-label" for="customRadio">Student</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="customRadio2" name="person" value="teacher">
              <label class="custom-control-label" for="customRadio2">Teacher</label>
            </div>
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
            <input type="password" class="form-control" id="password" placeholder="Password" name="pass">
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-block" name="sign_in">SIGN IN</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Sign up Modal -->
  <div class="modal fade" id="signUp">
    <div class="modal-dialog">
      <div class="modal-content" ng-app="myApp" ng-controller="FormController">

        <!-- Modal Header -->
        <div class="modal-header">
          <button class="btn" data-toggle="modal" data-target="#signIn" data-dismiss="modal">LOGIN</button>
          <button class="btn">REGISTER</button>
          <button class="btn modalClose" type="button" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body signUpBody">
          <form action="" method="post" ng-submit="register()">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="customRadioSU" name="person" value="student" checked>
              <label class="custom-control-label" for="customRadioSU">Student</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="customRadioSU2" name="person" value="teacher">
              <label class="custom-control-label" for="customRadioSU2">Teacher</label>
            </div>

            <input type="text" class="form-control" placeholder="Person Name" name="name" reqired maxlength="20" minlenght="4">
            <span class="error" ng-show="profileForm.name.$invalid && profileForm.name.$touched">Fill out your Full Name</span>

            <input type="text" class="form-control" placeholder="Username" name="username" required maxlength="20" minlenght="4">
            <input type="email" class="form-control" placeholder="E-mail" name="email" required maxlength="20" minlenght="6">
            <input type="password" class="form-control" placeholder="Password" name="password" required maxlength="20" minlenght="6">
            <input type="password" class="form-control" placeholder="Confirm Password"  name="password2" required maxlength="20" minlenght="4"> 
            <input type="text" class="form-control" placeholder="Date of Birth (YYYY/MM/DD)" name="dob" required maxlength="20" minlenght="4">
            <select class="form-control" name="gender" required >
              <option value="male">Select your Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
            <input type="text" class="form-control" placeholder="School Name" name="school" id="schoolOrSub" maxlength="20" minlenght="4">
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-block" name="sign_up" value="Sign up">
          <!-- <button class="btn btn-block" name="sign_up">SIGN UP</button> -->
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <h2></h2>
  </footer>
  <?php 
      // Sign up Function
    if(isset($_POST['sign_up'])) {

      $person = mysqli_real_escape_string($con,$_POST['person']);
      $name = mysqli_real_escape_string($con,$_POST['name']);
      $username = mysqli_real_escape_string($con,$_POST['username']);
      $email = mysqli_real_escape_string($con,$_POST['email']);
      $password = mysqli_real_escape_string($con,$_POST['password']);
      $password2 = mysqli_real_escape_string($con,$_POST['password2']);
      $gender = mysqli_real_escape_string($con,$_POST['gender']);
      $dob = mysqli_real_escape_string($con,$_POST['dob']);
      $school = mysqli_real_escape_string($con,$_POST['school']);

      if($password === $password2) {

        if ($person === 'student') {

          $get_email = "SELECT * FROM students WHERE student_email='$email'";
          $get_username = "SELECT * FROM students WHERE student_username='$username'";
  
          $run_email = mysqli_query($con,$get_email);
          $check = mysqli_num_rows($run_email);
  
          $run_username = mysqli_query($con,$get_username);
          $userNameCheck = mysqli_num_rows($run_username);
          
          if($check==1) {
            
            echo "<script>alert('This E-Mail Already Registered. Please Try With Another!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            exit();
          }
          if($userNameCheck==1){
            echo "<script>alert('Username $username is Already Taken. Please Try With Another!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            exit();
          }
          else
          {
            $studentQuery = "INSERT INTO students(student_username,student_fullname,student_email,student_password,student_dp,student_school,student_dob,student_gender) 
            VALUES('{$username}','{$name}','{$email}','{$password}','default.gif','{$school}','{$dob}','{$gender}')";
  
              if (mysqli_query($con,$studentQuery)){
                $_SESSION ['student_email'] = $email;
                echo "<script>alert('You are Registerd as Student')</script>";
                echo "<script>window.open('studentLogin/index.php','_self')</script>";
              } else {
                die(mysqli_error($con));
              }
            }
          } 
  
        else if ($person === 'teacher') {
  
          $get_email = "SELECT * FROM teachers WHERE teacher_email='$email'";
          $get_username = "SELECT * FROM teachers WHERE teacher_username='$username'";
  
          $run_email = mysqli_query($con,$get_email);
          $check = mysqli_num_rows($run_email);
  
          $run_username = mysqli_query($con,$get_username);
          $userNameCheck = mysqli_num_rows($run_username);
  
          if($check==1) {
            echo "<script>alert('This E-Mail Already Registered. Please Try With Another!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            exit();
          }
          if($userNameCheck==1){
            echo "<script>alert('Username $username is Already Taken. Please Try With Another!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            exit();
          }
          else
          {
            $teacherQuery = "INSERT INTO teachers(teacher_username,teacher_fullname,teacher_email,teacher_password,teacher_subject,teacher_dob,teacher_gender) 
            VALUES('$username','$name','$email','$password','$school','$dob','$gender')";
  
            if (mysqli_query($con,$teacherQuery)){
              $_SESSION ['teacher_email'] = $email;
              echo "<script>alert('You are Registerd as Teacher')</script>";
              echo "<script>window.open('teacherLogin/index.php','_self')</script>";
            } else {
              die("QUERY FAILED.".mysqli_error($con));
            };
          }
        }
      } else {
        echo "<script>alert('Passwords are not matched')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        exit();
      }
    }



    // Sign in function

    if(isset($_POST['sign_in'])) {
      $person = $_POST['person'];

      if ($person === 'student'){
        $email = mysqli_real_escape_string($con,$_POST['email']); 
        $pass = mysqli_real_escape_string($con,$_POST['pass']);
        
        $getStudent = "SELECT * FROM students WHERE student_email='$email' AND student_password='$pass'";
        $runStudent = mysqli_query($con,$getStudent);
        $check = mysqli_num_rows($runStudent);

        if($check == 1){
          $_SESSION['student_email']=$email;
          echo "<script>alert('You are Login as Student')</script>";
          echo "<script>window.open('studentLogin/index.php','_self')</script>";
        }
        else {
          echo "<script>alert('Password or E-mail is not Correct !')</script>";
        }
      } 
      else if ($person === 'teacher') {
        $email = mysqli_real_escape_string($con,$_POST['email']); 
        $pass = mysqli_real_escape_string($con,$_POST['pass']);
        
        $getStudent = "SELECT * FROM teachers WHERE teacher_email='$email' AND teacher_password='$pass'";
        $runStudent = mysqli_query($con,$getStudent);
        $check = mysqli_num_rows($runStudent);

        if($check == 1) {
          $_SESSION['teacher_email']=$email;
          echo "<script>alert('You are Login as Teacher')</script>";
          echo "<script>window.open('teacherLogin/index.php','_self')</script>";
        }
        else {
          echo "<script>alert('Password or E-mail is not Correct !')</script>";
        }
      }
    }
  ?>

  <script>
    const teacherSelected = () => {
      document.getElementById("schoolOrSub").placeholder = "Subject";
    }
    const studentSelected = () => {
      document.getElementById("schoolOrSub").placeholder = "School Name";
    }

    let teacherRadio = document.querySelector('#customRadioSU2');
    let studentRadio = document.querySelector('#customRadioSU');

    teacherRadio.addEventListener('click', teacherSelected);
    studentRadio.addEventListener('click', studentSelected);
  </script>

</body>

</html>
