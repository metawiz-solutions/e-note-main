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

    if(isset($_GET['question_id'])) {
      
      $get_id = $_GET['question_id'];
      $get_question = "SELECT * FROM questions WHERE question_id='$get_id'";
      $run_question = mysqli_query($con,$get_question);
      $row_questions = mysqli_fetch_array($run_question);
        
      $question_id = $row_questions['question_id'];
      $userX_id = $row_questions['question_from'];
      $question_content = $row_questions['question_content'];
      $question_date = $row_questions['question_date'];

      $students = "SELECT * FROM students WHERE student_id='$userX_id'";
      
      $run_students = mysqli_query($con,$students);
      $row_students = mysqli_fetch_array($run_students);

      $student_username = $row_students['student_username'];
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
    .answersBox{
      width: 80%;
      border: solid 2px #0B4B4A;
      float: right;
      padding: 0px 0 10px 10px;
      margin-bottom: 20px;
    }

    .answerContent {
      padding-top: 10px;
      font-size: 20px;
      color: white;
      max-height: 140px;
      overflow-y: scroll;
    }

    .answerFooter span{
      padding: 20px 25px 10px 10px;
      font-size: 22px;
      color: white;
      font-weight: 600;
      float: right;
    }
    .singleQuestionsBox{
      width: 80%;
      border: solid 2px #0B4B4A;
      float: right;
      padding: 0px 0 10px 10px;
      margin-bottom: 20px;
    }

    .singleQuestionContent {
      padding-top: 10px;
      font-size: 20px;
      color: white;
      min-height: 120px;
      overflow-y: scroll;
    }

    .singlequestionFooter button{
      background: #18605F;
      color: white;
      font-weight: 600;
      width : 140px;
      border-radius: 0px;
      margin: 10px 15px 5px 0px;
    }

    .singlequestionFooter button:hover{
      background: rgb(7, 48, 47);
    }

    .singlequestionFooter span{
      padding: 20px 25px 10px 10px;
      font-size: 22px;
      color: white;
      font-weight: 600;
      float: right;
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
      <h2>Questions</h2>
      <div class="singleQuestionsBox">
        <div class="singleQuestionContent">
          <?php echo $question_content; ?>
        </div>
        <div class="singlequestionFooter">
          <button class="btn" data-toggle="modal" data-target="#postAnswer">Write Answer</button>
          <span>Posted by <?php echo '@'.$student_username .' On '.$question_date ?></span>
        </div>
      </div>
        <?php			
          $get_id = $_GET['question_id'];
            
          $get_answers = "SELECT * FROM answers WHERE answer_for = '$get_id' ORDER by 1 DESC";
          
          $run_answer = mysqli_query($con,$get_answers);
          
          while($row=mysqli_fetch_array($run_answer)){
            
            $answer = $row ['answer_content'];
            $answerBy = $row ['answer_from'];
            $date = $row ['answer_date'];

            $answerdTeacher = "SELECT * FROM teachers WHERE teacher_id='$answerBy'";
      
            $run_teachers = mysqli_query($con,$answerdTeacher);
            $row_teachers = mysqli_fetch_array($run_teachers);

            $teacher_username = $row_teachers['teacher_username'];

            
            echo "
            <div class='answersBox' style='background:#18605F;'>
              <div class='answerContent'>
                <p>$answer</p>
              </div>
              <div class='answerFooter'>
                <span>Answered by @$teacher_username on $date</span>
              </div>
            </div>
            ";	
          }
	      ?>
    </div>
 
    <!-- ask Question modal -->
    <div class="homepageModal">
      <div class="modal fade" id="postAnswer">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
              <form action="" method="post">
                <textarea name="answer_content" id="" placeholder="Type your Answer"></textarea>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button class="btn" name="submitAnswer">Post</button>
          </form>
          <?php 
          if(isset($_POST['submitAnswer'])){
            
            $content = addslashes($_POST['answer_content']);
                
            if(strlen($content) < 10) {
              echo "<script>alert('You must type atleast 10 words to answer')</script>"; 

            }
            else {
              $insert = "INSERT INTO answers(answer_content,answer_status,answer_from,answer_date,answer_for) 
              VALUES ('$content',0,'$user_id',NOW(),'$question_id')";  // question_status ? 0 == not approved : 1 == aproved 
              $run = mysqli_query($con,$insert);
            }	
            if($run) {
              echo "<script>alert('Your Answer was Added')</script>";
              echo "<script>window.open('singleQuestionPage.php?question_id=$question_id','_self')</script>";
            } else {
              die(mysqli_error($con));
            }
          }
          ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

    <?php } ?>