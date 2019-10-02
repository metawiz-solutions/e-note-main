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

    $user_id = $row['student_id'];
    $user_name = $row['student_username'];
    $user_image = $row['student_dp'];
    $user_fullname = $row['student_fullname'];
    $user_email = $row['student_email'];
    $user_password = $row['student_password'];
    $user_school = $row['student_school'];
    $user_dob = $row['student_dob'];
    $user_gender = $row['student_gender'];

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
      <div class="profileTimeline">
        <div class="coverPicture">
        </div>
       <img src="./profilePics/<?php echo $user_image;?>" alt="Image" class="profilePicture" data-toggle="modal" data-target="#setDP">
        <div class="profileTimelineFooter">
          <span class="name">
            <?php echo $user_fullname; ?>
          </span>
          <span> &nbsp;</span>
          <span class="email">
            <?php echo $user_email; ?>
          </span>
        </div>
      </div>
      <div class="profileDetails">
        <button class="btn" data-toggle="modal" data-target="#editProfile">Edit Profile</button>
        <div class="ProfileDetailsBox">
          <div class="singleDetails">
            <span>Full Name : </span> <span> <?php echo $user_fullname; ?> </span>
          </div>
          <div class="singleDetails">
            <span> Username : </span> <span> <?php echo $user_name; ?> </span>
          </div>
          <div class="singleDetails">
            <span> Gender : </span> <span> <?php echo $user_gender; ?> </span>
          </div>
          <div class="singleDetails">
            <span> Email : </span> <span> <?php echo $user_email; ?> </span>
          </div>
          <div class="singleDetails">
            <span>School : </span> <span> <?php echo $user_school;  ?> </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Profile up Modal -->
    <div class="modal fade" id="editProfile">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->

          <!-- Modal body -->
          <div class="modal-body signUpBody">
            <form action="" method="post">
              <input type="text" class="form-control" name="fullname" value="<?php echo $user_fullname; ?>">
              <input type="text" class="form-control" name="username" value="<?php echo $user_name ; ?>">
              <input type="email" class="form-control" name="email" value="<?php echo $user_email; ?>">
              <input type="password" class="form-control" name="password" value="<?php echo $user_password; ?>">
              <input type="password" class="form-control" name="password2" value="<?php echo $user_password; ?>">
              <input type="text" class="form-control" name="school" value="<?php echo $user_school; ?>">
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button class="btn btn-block" name="update">Change Profile</button>
            </form>
            
        <!-- Function to Update Profile -->
        <?php 
          if(isset($_POST['update'])) {
            $u_fullname = $_POST['fullname'];
            $u_name = $_POST['username'];
            $u_email = $_POST['email'];
            $u_pass = $_POST['password'];
            $u_school = $_POST['school'];

            $update = "UPDATE students 
                      SET student_fullname='$u_fullname',student_username='$u_name',student_email='$u_email',student_password='$u_pass',student_school='$u_school' 
                      WHERE student_id='$user_id'";
            $run = mysqli_query($con,$update);
            
            if($run) {
              echo "<script>alert('You Profile Updated')</script>";
              echo "<script>window.open('profile.php','_self')</script>";
            }
          }
				?>
          </div>
        </div>
      </div>
    </div>
    <!-- Change DP Modal -->
    <div class="modal fade" id="setDP">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->

          <!-- Modal body -->
          <div class="modal-body">
          <img src="./profilePics/<?php echo $user_image;?>" alt="Image" data-toggle="modal" data-target="#setDP" style="height: 467px;">
            <form action="" method="post" enctype="multipart/form-data">
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
              <input type="file" name="u_image" required="required"  class="form-control"/> 
              <button name="updateImg" class="btn btn-dark">  Change </button>  
            </form>
            <?php 
          if(isset($_POST['updateImg'])) {
            $u_image = $_FILES['u_image']['name'];
            $img_tmp = $_FILES['u_image']['tmp_name'];
            						
            move_uploaded_file($img_tmp,"profilePics/$u_image");
            
            $update = "UPDATE students SET student_dp='$u_image' WHERE student_id='$user_id' ";
						$run = mysqli_query($con,$update);
            
						if($run){
              echo "<script>alert('You Profile Picture Updated')</script>";
              echo "<script>window.open('profile.php','_self')</script>";
						}
            else {
              alert("QUERY FAILED.".mysqli_error($con));
            }
          }
				?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php } ?>