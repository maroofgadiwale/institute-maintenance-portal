<?php
session_start();
if(!$_SESSION["email"])
{
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Institute Maintenance Portal</title>
  <!-- Shortcut icon -->
  <link rel="shortcut icon" type="images/png" href="images/PortIcon.png">
  <!-- CSS link -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- Google Fonts link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Questrial&display=swap" rel="stylesheet">
  <!-- Bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Nav bar section -->
  <section id="menu-section">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="logout.php"> <img src="images/log-out.png" alt="brand-image" height="120px" width="120px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navitems" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="issues.php">Issue</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="track.php">Track-Issue</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="staff.php">Staff</a>
            </li>
            <li class="nav-item enabled">
              <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
  <!-- Departments Section -->
  <section id="departments">
    <h1 id="title">Staff and Principal Hub</h1>
    <center>
      <table>
        <tr>
          <td>
            <a href="credential.html">
              <button class="menus">
                <img src="images/electric.png" alt="electric" height="150px" width="150px" class="menu-images">
                <h2>Electric Maintenance</h2>
              </button>
            </a>
          </td>
          <td>
            <a href="credential.html">
              <button class="menus">
                <img src="images/computer.png" alt="computer" height="150px" width="150px" class="menu-images">
                <h2>Computer Maintenance</h2>
              </button>
            </a>
          </td>
        <tr>
          <td>
            <a href="credential.html">
              <button class="menus">
                <img src="images/plumbing.png" alt="plumbing" height="150px" width="150px" class="menu-images">
                <h2>Plumbing</h2>
              </button>
            </a>
          </td>
          <td>
            <a href="credential.html">
              <button class="menus">
                <img src="images/building.png" alt="building" height="150px" width="150px" class="menu-images">
                <h2>Building Maintenance</h2>
              </button>
            </a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="credential.html">
              <button class="menus">
                <img src="images/laboratory.png" alt="laboratory" height="150px" width="150px" class="menu-images">
                <h2>Laboratory</h2>
              </button>
            </a>
          </td>
          <td>
            <a href="principalAuth.html">
              <button class="menus">
                <img src="images/leader.png" alt="laboratory" height="120px" width="120px" class="menu-images">
                <h2>Principal</h2>
              </button>
            </a>
          </td>
        </tr>
      </table>
    </center>
    <p class="slogan">Maintenance Excellence, Education Excellence</p>
  </section>
  <script src="index.js" charset="utf-8"></script>
</body>

</html>
