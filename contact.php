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
  <title>Contact Us</title>
  <!-- CSS Link -->
  <link rel="stylesheet" href="css/styles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <style>
    td {
      padding: 20px;
    }

    .social {
      margin-top: 3%;
    }

    tr {
      border-bottom: 2px solid white;
    }
    .form-control{
      width: 60%;
      display: inline;
    }

    #details{
      margin-top: 4%;
      color:white;
      text-align: center;
      font-family:"Poppins",sans-serif;
    }

    .social{
      padding-top: 3%;
    }
    @media only screen and (max-width:768px)
    {
        form{
          height:100%;
          width: 100%;
        }
        .form-data{
          margin-top: 15%;
        }
    }
  </style>
</head>

<body>
  <section id="menu-section">
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

  <section id="details">
    <div class="container">
    <h1 style="font-size:3rem; padding-bottom:5%;" id="title">CONTACT US</h1>
      <div class="form-data" style="background-image:linear-gradient(to right,#fc00ff,#00dbde);border:3px solid white">
      <h2 style="color:white;margin-top:3%;">Reach out to Us!</h2>
      <form  style="margin-top:5%;" action="https://formspree.io/f/xgejnzwv" method="post" name="contactform">
        <input type="text" class="form-control" name="fname" placeholder="First Name"> <br> <br>
        <input type="text" class="form-control" name="lname" placeholder="Last Name"> <br> <br>
        <input type="text" class="form-control" name="email" placeholder="Email id" id="email"> <br> <br>
        <input type="text" class="form-control" name="phone" placeholder="Phone Number"> <br> <br>
        <textarea name="message" class="form-control" rows="8" placeholder="Your message here" style="resize:none;"></textarea> <br> <br>
       <button type="submit" align="right" class="btn form-control" style="color:white;background-color:#fc00ff;font-size:1.2rem;" onclick="contact()">SUBMIT</button><br> <br>
      </form>
    </div>
    </div>
  </section>
  <script src="index.js" charset="utf-8"></script>
</body>

</html>
