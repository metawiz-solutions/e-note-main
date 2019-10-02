<?php 
    session_start();
    if(!isset($_SESSION['student_email'])){
      echo "<script>window.open('../index.php','_self')</script>";
    }
    else {
    include("../functions/functions.php");  
?>

<?php 
    // get Logged users name
    $user_email = $_SESSION['student_email'];
    $get_user = "SELECT * FROM students WHERE student_email= '$user_email'";
    $run_user = mysqli_query($con,$get_user);
    $row = mysqli_fetch_array($run_user);

    $user_name = $row['student_username'];
    $user_image = $row['student_dp'];
    $user_id = $row['student_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>E-Note | Student Portal | Welcome </title>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../styles/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/font_awesome.css">

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/fontawesome.min.js"></script>
</head>

<body>
  <header class="navbar">
    <div class="logoDiv">
      <a href="index.php"><img src="../images/logo.jpg" alt="E-Note" class="logo img-responsive"></a>
    </div>
    <div class="headerDropDown">
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" class="headerDropDown">
          <?php echo "@".$user_name; ?>
        </a>
        <div class="dropdown-menu">
          <a href="../functions/sign_out.php" class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> &nbsp; Logout </a>
        </div>
      </div>
    </div>
  </header>
  <!-- Navbar -->
  <nav class="navbar studentNav" style="background:white;">
    <div class="navbar-end">
      <div class="navbar-item btn-group ">
        <a href=""><button class="button">Our Teachers</button></a>
        <a href="index.php"><button class="button">Questions</button></a>
        <a href="contactUs.php"> <button class="button">Contact</button></a>
      </div>
    </div>
  </nav>
  <div class="myContainer">
    <div class="sideBar">
      <img src="./profilePics/<?php echo $user_image;?>" alt="Image">
      <h5><?php echo "@".$user_name; ?></h5>
      <a href="profile.php"><button class="btn">Profile</button></a>
      <a href="messages.php"><button class="btn">Messages</button></a>
      <a href="index.php"><button class="btn">Questions</button></a>
    </div>
    <div class="homeContent">
      <h3 class="ourTeachersHeader">Our Teacher</h3>
      <div class="ourTeachers">
      <?php 
          $get_teacher = "SELECT * FROM teachers"; // WHERE status = '1' (to show only approved)
          $run_teacher = mysqli_query($con,$get_teacher);
          
          while ($row_teacher = mysqli_fetch_array($run_teacher)) {
            
          $teacher_name = $row_teacher['teacher_username'];
          $teacher_fullname = $row_teacher['teacher_fullname'];
          $teacher_email = $row_teacher['teacher_email'];
          $teacher_subject = $row_teacher['teacher_subject'];
          $teacher_image = $row_teacher['teacher_dp'];
          $teacher_id = $row_teacher['teacher_id'];
            
          echo "
            <div class='eachOurTeacher'>
              <div class=''>
                <img src='../teacherLogin/profilePics/$teacher_image' class='teacherPhoto'> 
              </div>
              <div class='teacherDetails'>
                <p>Sir. $teacher_fullname</p>
                <p>$teacher_email</p>
                <p>$teacher_subject</p>
              </div>
              <div class='messageBtn'>
                <a href='sendMessage.php?teacher_id=$teacher_id'><button class='btn'> Message </button></a>
              </div>
            </div>
          ";
          
          }
      ?>
      </div>
    </div>
  </div>
</body>

</html>


    <?php } ?>