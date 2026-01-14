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
  <title>Home page</title>
  <!-- CSS Link -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- Shortcut icon -->
  <link rel="shortcut icon" type="images/png" href="images/PortIcon.png">
  <!-- Google Fonts link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Questrial&display=swap" rel="stylesheet">
  <!-- Bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!--FONT-AWESOME-->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <!-- Internal CSS -->
  <style>
  /* For features */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  .animated-element {
    opacity: 0;
    animation: fadeIn 0.5s ease-in-out forwards;
  }

  .animated-element:nth-child(1) {
    animation-delay: 0.5s;
  }

  .animated-element:nth-child(2) {
    animation-delay: 1s;
  }
  hr {
    border: none;
    border-top: 10px dotted black;
    width: 5%;
    margin-left: auto;
    margin-right: auto;
    }
    hr:hover{
      border-color: white;
    }
  </style>
</head>

<body>
  <section id="menu-section upper">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="logout.php"> <img src="images/log-out.png" alt="brand-image" height="120px" width="120px"> </a>
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
  <!-- Introductory -->
  <section id="introduction">
    <div class="container introductory">
      <div class="row innerware">
        <div class="col-lg-6 contents">
          <h1 id="intro-info">Institute Maintenance Portal</h1>
          <h2 class="firstlec">Transforming institutes through smart maintenance solutions</h2>
          <h2 class="secondlec">Effortless maintenance for optimal learning environments, empowering educational excellence by fixing issues.</h2>
          <p class="slog">"Maintenance Made Simple, Learning Made Limitless"</p>
          <a href="issues.php">
            <button type="button" class="btn btn-danger twos no1s" style="font-size:1.1rem;">Report Issue</button>
          </a>
          <a href="track.php">
            <button type="button" class="btn btn-outline-light twos" style="font-size:1.1rem;">
              Track Issue
              <img src="images/route.png" height="30px" width="30px">
            </button>
          </a>
        </div>
        <div class="col-lg-6">
          <img src="images/animated.gif" alt="IndexImage" class="indexImage" height="400px" width="600px">
        </div>
      </div>
    </div>
  </section>
  <hr>
  <!-- features  -->
  <section id="features">
    <h2 style="text-align:center;color:white;">Our Testimonials</h2>
    <div class="container encapsulated">
      <div class="row feature-row">
        <div class="col-lg-4 animated-element">
          <i class="fa-solid fa-thumbs-up fa-3x feature-media"></i>
          <h3 class="feature-lec">Guranteed to Work</h3>
          <p class="detail">Our commitment to excellence ensures a guaranteed smooth and
            efficient performance, making your online presence a worry-free experience</p>
        </div>
        <div class="col-lg-4 animated-element">
          <i class="fa-solid fa-heart fa-3x feature-media"></i>
          <h3 class="feature-lec">Heartfelt Assurance</h3>
          <p class="detail">With Swift Resolutions, our dedicated team efficiently tackles any maintenance concerns, keeping your
            institute's online ecosystem running smoothly.</p>
        </div>
        <div class="col-lg-4 animated-element">
          <i class="fa-sharp fa-solid fa-circle-check fa-3x feature-media"></i>
          <h3 class="feature-lec">Smart Updates</h3>
          <p class="detail"> Embrace innovation effortlessly, as Smart Updates takes care of enhancements,
            so you can focus on what matters most for the institute's growth.</p>
        </div>
      </div>
    </div>
    <hr>
  </section>
  <!-- Social media section -->
  <section id="social-media">
    <div class="social-section">
      <p style="color:white;font-size:1.2rem;">You can also check us on:</p>
      <i class="social-med-icons fa-brands fa-twitter fa-2x"></i>
      <i class="social-med-icons fa-brands fa-facebook fa-2x"></i>
      <i class="social-med-icons fa-brands fa-instagram fa-2x"></i>
      <i class="social-med-icons fa-solid fa-envelope fa-2x"></i>
    </div>
  </section>
</body>

</html>
