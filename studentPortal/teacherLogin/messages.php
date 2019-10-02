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

    $sel_msg = "SELECT * FROM messages WHERE message_to='$user_id' AND message_status='unread'";
    $run_msg = mysqli_query($con,$sel_msg);
    $count_msg = mysqli_num_rows($run_msg);
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

  <style>

  .headerBtn{
    font-weight: 600;
    font-size: 20px;
    border-radius: 0px;
    background: #18605F;
    border: #18605F;
    color: white;
    width : 200px;
  }

  .headerBtn:hover{
    text-decoration : none;
    color: white;
    background: rgb(7, 48, 47);
  }

  th {
    padding : 10px;
    color: white;
    font-size: 20px;
    text-align: center;
    border-bottom : solid white 2px;
  }

  td {
    padding : 5px;
    color: white;
    font-size: 18px;
    text-align: center;
    border-bottom : solid white 1px;
  }

  td a {
    color: white;
  }
  td a:hover {
    color: white;
  }

  .replyBox{
    color: white;
    font-size: 18px;
  }

  .replyBox textarea {
    background: #18605F;
    width: 700px;
    margin-left : 0px;
    margin-top :15px;
  }

  .replyBox .myButton{
    background: #18605F;
    color: white;
    font-weight: 600;
    width : 140px;
    border-radius: 0px;
  }

  .replyBox .myButton:hover{
    background: rgb(7, 48, 47);
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
  <nav class="navbar teacherNav" style="background:white;">
    <div class="navbar-end">
      <div class="navbar-item btn-group ">
        <a href="homePage.php"><button class="button">Questions</button></a>
        <a href="contactUs.php"> <button class="button">Contact</button></a>
      </div>
    </div>
  </nav>
  <div class="sideBar">
    <img src="./profilePics/<?php echo $user_image;?>" alt="Image">
      <h5><?php echo "@".$user_name; ?></h5>
      <a href="profile.php"><button class="btn">Profile</button></a>
      <a href="messages.php"><button class="btn">Messages</button></a>
      <a href="index.php"><button class="btn">Questions</button></a>
    </div>
  <div class="homeContent">
    <div class="messageBox" style="margin-left: 20%;">
      <div class="msgBoxHeader">
        <a href ="messages.php?new_msg" class="btn headerBtn">New Messages(<?php echo $count_msg;?>)</a> 
        <a href ="messages.php?inbox" class="btn headerBtn">Inbox</a>
      </div>

        <?php if(isset($_GET['inbox'])){
          include ("inbox.php");
        }?>

        <?php if(isset($_GET['new_msg'])){
          include ("new_msg.php");
        }?>

    </div>
  </div>
</body>

</html>

<?php } ?>