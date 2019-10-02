<?php 
    session_start();
    if(!isset($_SESSION['teacher_email'])){
      echo "<script>window.open('../index.php','_self')</script>";
    }
    else {
    include("../functions/functions.php");  
?>

<?php 
    // get Logged users name
    $user_email = $_SESSION['teacher_email'];
    $get_user = "SELECT * FROM teachers WHERE teacher_email= '$user_email'";
    $run_user = mysqli_query($con,$get_user);
    $row = mysqli_fetch_array($run_user);

    $user_name = $row['teacher_username'];
    $user_image = $row['teacher_dp'];
    $user_id = $row['teacher_id'];
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
  <nav class="navbar teacherNav" style="background:white;">
    <div class="navbar-end">
      <div class="navbar-item btn-group">
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
      <a href="messages.php?new_msg&u_id=$user_id"><button class="btn">Messages</button></a>
      <a href="index.php"><button class="btn">Questions</button></a>
    </div>
    <div class="homeContent">
      <h2>Questions</h2>
      <?php getQuestions(); ?>
    </div>
    <div class="homepageModal">
      <div class="modal fade" id="postAnswer">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
              <form action="">
                <textarea name="" id="" placeholder="Type your Answer"></textarea>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button class="btn">Post</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php } ?>