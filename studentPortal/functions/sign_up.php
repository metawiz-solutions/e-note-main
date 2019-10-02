<?php 
//  if(isset($_POST['sign_up'])) {

//   $person = mysqli_real_escape_string($con,$_POST['person']);
//   $name = mysqli_real_escape_string($con,$_POST['name']);
//   $username = mysqli_real_escape_string($con,$_POST['username']);
//   $email = mysqli_real_escape_string($con,$_POST['email']);
//   $password = mysqli_real_escape_string($con,$_POST['password']);
//   $gender = mysqli_real_escape_string($con,$_POST['gender']);
//   $dob = mysqli_real_escape_string($con,$_POST['dob']);
//   $school = mysqli_real_escape_string($con,$_POST['school']);

// if ($person === 'student'){

//   echo "<script>alert('You are Registerd as Student')</script>"; // working....

//   echo "<script>alert('You are Registerd as $username')</script>"; // working....

//   $studentQuery = "INSERT INTO students(student_username,student_fullname,student_email,student_password,student_school,student_dob,student_gender) 
//   VALUES('{$username}','{$name}','{$email}','{$password}','{$school}','{$dob}','{$gender}')";

//   if (mysqli_query($con,$studentQuery)){
//     // $_SESSION['u_email']=$email;
//     echo "<script>alert('You are Registerd as teacher')</script>"; // not working
//   } else {
//     die("QUERY FAILED.".mysqli_error($studentQuery));
//   }
// } 
// else if ($person === 'teacher') {
//   echo "<script>alert('You are Registerd as Teacher')</script>"; // working....

//   echo "<script>alert('You are Registerd as $username')</script>"; // working....

//   $teacherQuery = "INSERT INTO teachers(teacher_username,teacher_fullname,teacher_email,teacher_password,teacher_school,teacher_dob,teacher_gender) 
//   VALUES('$username','$name','$email','$password','$school','$dob','$gender')";

//   if (mysqli_query($con,$teacherQuery)){
//     // $_SESSION['u_email']=$email;
//     echo "<script>alert('You are Registerd as teacher')</script>"; // not working
//   } else {
//     die("QUERY FAILED.".mysqli_error($teacherQuery));
//   };
// }
// }


?>