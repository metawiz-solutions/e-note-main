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
    .contentBox {
      border: 2px solid #C1AD4A;
      height: 200px;
    }

    .contentButtons button {
      width: 250px;
      height: 106px;
      margin: 20px 15px;
      border-radius: 0px;
      background: #18605F;
      border: #18605F;
      color: white;
      font-weight: 500;
      font-size: 20px;
    }

    .contentButtons button:hover {
      background: rgb(7, 48, 47);
    }

    .contentTwo {
      width: 60%;
      margin-left: 30%;
      color: white;
      font-weight: bolder;
    }

    .contentTwo h2 {
      padding: 10px;
      margin-top: 8px;
    }

    .contentBox {
      padding: 20px;
    }

    .ourTeam {
      text-align: center;
      color: white;
      font-weight: 600;
    }

    .ourTeam .person {
      border: 2px solid #C1AD4A;
      height: 180px;
      width: 180px;
      display: inline-block;
      margin: 15px;
      border-radius: 90px;
    }

    .navbar-item button {
      margin-top: 6px;
    }

    .content {
      background-image: url('images/bg3.jpg') !important;
      height: 500px;
      background-repeat: no-repeat;
      background-size: 1500px 550px;
      background-position: left;
      margin-bottom: 0 !important;
    }

    .modal-content {
      margin-top: 0px;
      border-radius: 0% !important;
      background: rgba(92, 146, 146, 0.9) !important;
      width: 192%;
      margin-left: -45%;
      border: 2px solid #C1AD4A;
    }


    .modal-header {
      border-bottom: none !important;
      padding: 0% !important;
      margin: 15px;

    }

    .modal-body {
      height: 400px;
      border: #C1AD4A solid 2px;
      margin: 18px 25px;
    }

    .modal-footer {
      border-top: none !important;
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
      <h2>ABOUT US</h2>
      <div class="contentBox">
        <h3>Content Will Update soon</h3>
      </div>
      <div class="contentButtons">
        <button class="btn" data-toggle="modal" data-target="#litSurevy">LITETURE SURVEY</button>
        <button class="btn">RESEARCH PROBLEM</button>
        <button class="btn">RESEARCH OBJECTIVE</button>
        <button class="btn">METHODOLGY</button>
        <button class="btn">TECHNOLOGY</button>
        <button class="btn" data-toggle="modal" data-target="#docPres">DOCUMENTS & <br> PRESENTATION</button>
      </div>
    </div>
    <div class="ourTeam">
      <h2>Our Team</h2>
      <div class="person">

      </div>
      <div class="person">

      </div>
      <div class="person">

      </div>
      <div class="person">

      </div>
      <!-- lit survey Modal -->
      <div class="modal fade" id="litSurevy">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h2>LITETURE SURVEY</h2>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <h2>DETAILS OF OUR LECTURE REVIEW</h2>
            </div>

            <!-- Modal footer -->
            <div class=" modal-footer">
            </div>
          </div>
        </div>
      </div>

      <!-- Document and presentaion Modal -->
      <div class="modal fade" id="docPres">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h2>DOCUMENT & PRESENTATION</h2>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <h2>DOCUMENTS</h2>
              <p>TITLE WITH FILE DOWNLOAD LINK</p><br><br>
              <h2>PRESENTATION</h2>
              <p>TITLE WITH FILE DOWNLOAD LINK</p><br><br>
            </div>

            <!-- Modal footer -->
            <div class=" modal-footer">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Footer -->
  <footer>
    <h2></h2>
  </footer>

</body>

</html>
