<?php
  session_start();
  if(isset($_SESSION["email"]))
  {
    header("location:home.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login to IMP</title>
  <!-- Shortcut icon -->
  <link rel="shortcut icon" type="images/png" href="images/login.png">
  <!-- Google Fonts link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Questrial&display=swap" rel="stylesheet">
  <!-- Bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background-color: #74ebd5;
      background-image: linear-gradient(to right, #E100FF, #22c1c3, #3CD3AD);
    }

    .project{
      font-size: 1.6rem;
    }

    .form-control {
      background-color: white;
      color: black;
    }
    .buttons{
      display:flex;
      justify-content:center;
      flex-direction:row;
    }
    .centered-form {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 90vh;
    }

    .login {
      background-image: linear-gradient(to right, #fc00ff, #00dbde);
      /* background-image: linear-gradient(to right,black, black); */
      animation: fade-in-up 1.4s ease-out;
      border: 3px solid white;
      padding: 20px;
      width: 100%;
      max-width: 400px;
    }

    #title {
      border-bottom: 2px solid white;
      padding-bottom: 15px;
      color: white;
      font-weight: bold;
    }

    label {
      color: white;
      font-size: 1.2rem;
    }

    .loginbtn {
      height: 40px;
      width: 50%;
      background-image: linear-gradient(to right, #3CD3AD, #00dbde);
      color: white;
      font-weight: bold;
      font-size: 1.1rem;
      border-radius: 25px;
      outline: 2px solid white;
      margin-top: 8%;
    }

    #first{
      margin-right:3%;
    }
    .institute {
      text-align: center;
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

    @media only screen and (max-width: 768px) {
      .login {
        height: 100%;
        width: 90%;
        max-width: none;
        margin-top: 15%;
        padding: 25px;
      }

      .loginbtn{
        margin-top: 0;
        margin-bottom: 3%;
      }

      #title {
        font-size: 1.8rem;
      }

      label {
        font-size: 1rem;
      }

      input[type="text"],
      input[type="password"]{
        height: 50px;
        margin-bottom: 15%;
        font-size: 1.1rem;
        padding-bottom:2%;
      }

      .loginbtn {
        height: 70px;
        margin-bottom: 2rem;
        font-size: 1.3rem;
        padding-bottom:2%;
      }

      label {
        font-size: 1.5rem;
      }

      form {
        margin-top: 3rem;
      }

      .emailid,
      .passkey {
        margin-top: 10%;
      }

      h1 {
        text-align: center;
      }
    }

  </style>
</head>

<body>
  <script type="text/javascript">
    function isValid() {
      with(document.myform) {
        if (email.value.length == 0) {
          email.placeholder = "The given field is empty";
          event.preventDefault();
        }
        if (password.value.length == 0) {
          password.placeholder = "The given field is empty";
          event.preventDefault();
        }
      }
    }
  </script>
  <div class="centered-form">
    <div class="card login">
      <div class="institute">
        <img src="images/PortIcon.png" alt="Logo" height="90px" width="90px">
      </div>
      <h1 id="title" class="project">Institute Maintenance Portal</h1>
      <div class="card-body">
        <form name="myform" action="users.php" method="post">
          <div class="emailid">
            <label for="email">Email Id:</label>
            <input type="text" name="email" placeholder="Valid email id" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" class="form-control">
          </div>
          <br>
          <div class="passkey">
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Valid password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" class="form-control">
          </div>
          <div class="buttons">
          <button type="submit" class="btn btn-light loginbtn" onclick="isValid()" id="first" name="login">Login</button>
          <button class="btn btn-light loginbtn" name="signup" onclick="isValid()">Or SignUp?</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
