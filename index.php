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
    .navbar-item button {
      margin-top: 6px;
    }

    .content {
      background-image: url('images/bg2.jpg') !important;
      height: 500px;
      background-repeat: no-repeat;
      background-size: 1500px 550px;
      background-position: left;
      margin-bottom: 0 !important;
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
    <div class="welcome">
      <h1 class="text-light">WELCOME TO E-NOTE</h1>
      <h2 class="text-light">SUMMARIZE NOTES FOR GRADE 10 & 11</h2>
    </div>
  </div>
  <div class="welcomeButtons">
    <a href="./notes.php"><button class="btn">Notes</button></a>
    <a href="./studentPortal"> <button class="btn">Portal</button></a>
    <a href="aboutUs.php"><button class="btn">About us</button></a>
  </div>


  <!-- Footer -->
  <footer>
    <h2></h2>
  </footer>

</body>

</html>
