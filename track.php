<?php
session_start();
if(!$_SESSION["email"])
{
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <title>Track issue</title>
  <style>
    .middleware {
      background-image: linear-gradient(to right, #fc00ff, #00dbde);
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 100%;
      max-width: 400px;
      border: 3px solid white;
      animation: fade-in-up 1.4s ease-out;
    }
    form{
      margin-top:5%;
    }
    @keyframes fade-in-up {
      0% {
        opacity: 0;
        transform: translateY(300px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    #heading {
      font-size: 2rem;
      text-align: center;
      color: white;
      border-bottom: 1px solid white;
      font-weight:bold;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 8px;
      color: white;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    .check {
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      width: 100%;
      display: inline-block;
      background-image: linear-gradient(to right, #3CD3AD, #00dbde);
      outline: 2px solid white;
      margin-top: 2%;
      font-size: 1.1rem;
      font-weight: bold;
    }

    label {
      text-align: left;
    }

    button:hover {
      color: black;
    }
    @media only screen and (max-width: 768px) {
        .form-data {
            width: 90%; /* Adjust width for smaller screens */
            height: auto;/* Adjust margin-top to move the form down */
        }
        form{
          margin-top: 30%;
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
  <section id="form-input">
    <center>
      <form name="myform" action="issuetracker.php" method="post" class="middleware">
        <div class="logos" style="text-align:center;">
          <img src="images/PortIcon.png" alt="issues" height="80px" width="80px">
        </div>
        <h1 id="heading">Track your issue</h1>
        <label for="password">Complaint id:</label>
        <input type="text" name="complaintid" placeholder="Complaint id" class="form-control">
        <label for="email">Email ID:</label>
        <input type="email" name="email" placeholder="Email id" class="form-control">
        <button type="submit" name="submit" class="check" onclick="validate()">SUBMIT</button>
      </form>
    </center>
  </section>
  <script>
    function validate() {
      with(document.myform) {
        if (email.value.length== 0 || complaintid.value.length==0)
        {
          email.placeholder="Given field is empty";
          department.placeholder="Given field is empty";
          event.preventDefault();
        }
      }
    }
  </script>
</body>

</html>
