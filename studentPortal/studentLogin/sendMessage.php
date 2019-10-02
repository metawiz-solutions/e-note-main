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
    $get_user = "SELECT * FROM students WHERE student_email='$user_email'";
    $run_user = mysqli_query($con,$get_user);
    $row = mysqli_fetch_array($run_user);

    $user_name = $row['student_username'];
    $user_image = $row['student_dp'];
    $user_id = $row['student_id'];

    // getting selected teacher details
    if(isset($_GET['teacher_id'])){					

      $teacher_id = $_GET['teacher_id'];
      $sel = "SELECT * FROM teachers WHERE teacher_id='$teacher_id'";
      $run = mysqli_query($con,$sel);
      $row_teacher = mysqli_fetch_array($run);

      $teacher_name = $row_teacher['teacher_username'];
      $teacher_fullname = $row_teacher['teacher_fullname'];
      $teacher_email = $row_teacher['teacher_email'];
      $teacher_subject = $row_teacher['teacher_subject'];
      $teacher_image = $row_teacher['teacher_dp'];
      $teacher_id = $row_teacher['teacher_id'];
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>E-Note | Student Portal | Welcome </title>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../styles/bootstrap.min.css">
  <link rel="stylesheet" href="../styles/font_awesome.css">

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/fontawesome.min.js"></script>
  <style>
    textarea{
      height: 265px;
      margin-top : 15px;
      margin-left: 2%;
      width: 70%;
      font-weight: 600;
      font-size: 20px;
      padding: 10px;
      resize: none;
      background: rgba(221, 235, 235, 0.7);
    }

    .sendMessage{
      
      margin: 10px; 
      margin-left: 28px;
      height: 50px !important;
      font-weight: 600;
      font-size: 20px;
      border-radius: 0px;
      background: #18605F;
      border: #18605F;
      color: white;
    }
  </style>
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
        <a href="ourTeacher.php"><button class="button">Our Teachers</button></a>
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
      <h2>Send a Message to <?php echo $teacher_fullname; ?> </h2>
      <form action="" method="post">
        <textarea name="message" id=""></textarea>
        <button class="btn sendMessage" name="sendMessage">Send Message</button>
      </form>
    </div>
    <?php 
      if(isset($_POST['sendMessage'])) {
        $message= $_POST['message'];
						
						$insert = "INSERT INTO messages (message_from,message_to,message_subject,message_reply,message_status,message_time) 
                      VALUES ('$user_id','$teacher_id','$message','---','unread',NOW())";
						
            $run_insert = mysqli_query($con,$insert);
            
            if($run_insert){
              echo "<script>alert('Your Message was sent to $teacher_name sir')</script>";
              echo "<script>window.open('ourTeacher.php','_self')</script>";
            }
      }    
    ?>
  </div>
</body>

</html>

    <?php } ?>