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

  <style>
    .content {
      background-image: url('./images/bg6.jpg') !important;
      height: 600px;
    }

    .contentBox {
      border: 2px solid #C1AD4A;
      height: 300px;
      padding: 20px;
    }

    .contentButtons button {
      width: 250px;
      height: 106px;
      margin: 20px 15px;
      border-radius: 0px;
      background: #5C9292 !important;
      border-top: 1px solid black;
      border-right: 3px solid black;
      font-weight: 500;
      font-size: 20px;
      color: white;
      font-weight: bold;
      text-align: left;
    }

    /* .contentButtons button:hover {
      background: rgb(7, 48, 47);
    } */

    .contentTwo {
      width: 60%;
      margin-left: 10%;
      color: white;
      font-weight: bolder;
    }

    .contentTwo h2 {
      padding: 10px;
      margin-top: 8px;
    }

    .navbar-item button {
      margin-top: 6px;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header class="navbar">
    <div class="logoDiv">
      <a href="index.php"><img src="images/logo.png" alt="E-Note" class="logo img-responsive"></a>
    </div>
  </header>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="navbar-end">
      <div class="navbar-item btn-group">
        <a href="index.php"><button class="button">Home</button></a>
        <div class="headerDropDown button">
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" class="headerDropDown"
              style="color:black; font-weight: bold;">
              Notes
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="./notes.php"> &nbsp; Notes Menu </a>
              <a class="dropdown-item" href="./grade10.php"> &nbsp; Grade 10 </a>
              <a class="dropdown-item" href="./grade11.php"> &nbsp; Grade 11 </a>
            </div>
          </div>
        </div>
        <a href="./studentPortal"> <button class="button">Portal</button></a>
        <a href="./aboutUs.php"> <button class="button">About us</button></a>

      </div>
    </div>
  </nav>

  <!-- Main Contents -->
  <div class="content">
    <div class="contentTwo">
      <h2 style="font-weight: 600; padding-top: 60px; padding-bottom: 0px !important;">E Learning with E-Notes</h2>
      <h3 style="color:black; font-weight:500; margin-left:30px;">GRADE 10 & GRADE 11 STUDENTS</h3>

      <h2 style="margin:0; font-weight: 600; margin-top:20px;">Grade 10 Topics</h2>
      <div class="contentBox">
        <h3 style="margin:0; font-weight: 600;">Topic</h3>
        <h3 style="margin:0; font-weight: 600; margin-left: 15px;">- Sub Topic</h3>
        <h3 style="margin:0; font-weight: 600;">Topic</h3>
        <h3 style="margin:0; font-weight: 600; margin-left: 15px;">- Sub Topic</h3>
        <h3 style="margin:0; font-weight: 600;">Topic</h3>
        <h3 style="margin:0; font-weight: 600; margin-left: 15px;">- Sub Topic</h3>
      </div>
    </div>
  </div>



  <!-- Footer -->
  <footer>
    <h2></h2>
  </footer>

</body>

</html>
