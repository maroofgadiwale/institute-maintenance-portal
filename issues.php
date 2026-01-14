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
  <title>Report Issue</title>
  <!-- shortcut icon -->
  <link rel="shortcut icon" type="images/png" href="images/issue.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webshim/1.16.0/minified/polyfiller.js"></script>
  <!-- CSS Link -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- Google Fonts link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Questrial&display=swap" rel="stylesheet">
  <!-- Bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- CSS-Link -->
  <style>
    .form-control {
      width: 60%;
      display: inline;
      margin-bottom: 10px;
    }

    #issues-section {
      margin-top: 3%;
    }

    .mylabel {
      color: white;
      font-size: 1.5rem;
    }

    /* .radios {
      margin-left: 2%;
      display: flex;
      justify-content: center;
    } */

    .issues {
      color: white;
      font-size: 1.3rem;
      margin-right: 3%;
      margin-left: 3px;
    }

    select {
      overflow: hidden;
      scrollbar-width: none;
      /* Firefox */
      -ms-overflow-style: none;
      /* IE/Edge */
    }


    @media only screen and (max-width: 768px) {

      .container {
        max-width: 95%;
        padding: 0 10px;
        margin-top: 2%;
      }
      #brand{
        height:90px;
        width: 90px;
      }
      .issues {
        color: white;
        font-size: 1rem;
        margin-right: 2%;
        margin-left: 3px;
      }
      input[type="text"],
      input[type="date"]{
        height: 50px;
        margin-bottom: 2rem;
        font-size: 1rem;
      }
      input::placeholder{
        font-size: 1rem;
      }
      #title {
        font-size: 2.5rem;
      }
    }
  </style>
</head>

<body onload="clearDropDown()">
  <section id="menu-section">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="logout.php"> <img src="images/log-out.png" alt="brand-image" id="brand" height="120px" width="120px"> </a>
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
  <section id="issues-section">
    <!-- <div class="container"> -->
    <div class="container form-dept">
      <h1 id="title">Report Your Issue</h1>
      <center>
        <form action="connect.php" method="post" name="Issueform">
          <input type="text" class="form-control" name="deptname" placeholder="Name of the Department" autocomplete="off" pattern="^[A-Za-z\s\-']+$"> <br> <br>
          <input type="text" class="form-control" name="cptname" placeholder="Name of Complainant" autocomplete="off" pattern="^[A-Za-z\s\-']+$"> <br> <br>
          <input type="text" class="form-control" name="roomno" placeholder="Room Number (if any)" autocomplete="off" pattern="^-?\d+$"> <br> <br>
          <input type="text" class="form-control" name="email" placeholder="Complainant's email id" autocomplete="off" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$"> <br> <br>
          <input type="date" id="date" class="form-control" name="dates"> <br><br>
          <label class="mylabel">What is your issue about?</label> <br> <br>
          <div class="radios">
            <input type="radio" name="depts" value="Electric" class="form-check-input" onclick="changeContent(this.value)">
            <label for="depts" class="issues">Electric</label>
            <input type="radio" name="depts" value="Computer" class="form-check-input" onclick="changeContent(this.value)">
            <label for="depts" class="issues">Computer</label>
            <input type="radio" name="depts" value="Plumbing" class="form-check-input" onclick="changeContent(this.value)">
            <label for="depts" class="issues">Plumbing</label>
            <input type="radio" name="depts" value="Building" class="form-check-input" onclick="changeContent(this.value)">
            <label for="depts" class="issues">Building</label>
            <input type="radio" name="depts" value="Laboratory" class="form-check-input" onclick="changeContent(this.value)">
            <label for="depts" class="issues">Laboratory</label>
          </div> <br>
          <select class="form-control" name="lists" id="lists" size="5">
            <option value="Light Issue">Light Issue</option>
            <option value="Fans not Working">Fans not Working</option>
            <option value="Wiring Issue<">Wiring Issue</option>
            <option value="Switch Board Issue">Switch Board Issue</option>
          </select> <br> <br>
          <input type="submit" name="submit" class="form-control" name="computer" value="SUBMIT ISSUE" style="color:white;background-color:#fc00ff;font-size:1.2rem;" onclick="formPrevent()"> <br><br>
        </form>
      </center>
    </div>
    <!-- </div> -->
  </section>
  <script>
    // Initally clearing the form:
    webshim.setOptions('forms-ext', {types: 'date'});
    webshim.polyfill('forms forms-ext');
    function clearDropDown() {
      var holder = document.getElementById("lists");
      holder.options.length = 0;
      var k = document.createElement("option");
      k.text = "Issue will appear here";
      k.style.fontFamily = "Poppins,sans-serif";
      holder.add(k);
    }

    // For purpose of security
    function formPrevent() {
      with(document.Issueform) {
        if (deptname.value.length == 0) {
          deptname.placeholder = "The given field is empty";
          event.preventDefault();
        }
        if (cptname.value.length == 0) {
          cptname.placeholder = "The given field is empty";
          event.preventDefault();
        }
        if (roomno.value.length == 0) {
          roomno.placeholder = "The given field is empty";
          event.preventDefault();
        }
        if (email.value.length == 0) {
          email.placeholder = "The given field is empty";
          event.preventDefault();
        }
        if (lists.value.length == 0) {
          event.preventDefault();
        }
        if (dates.value.length == 0) {
          event.preventDefault();
        }
      }
    }

    // Changing contents dynamically...
    function changeContent(elementvalue) {
      lists.options.length = 4;
      with(document.Issueform) {
        if (elementvalue === "Electric") {
          lists[0].text = "Light Issue";
          lists[1].text = "Fans not Working";
          lists[2].text = "Wiring Issue";
          lists[3].text = "Switch Board Issue";
          // Adding values:
          lists[0].value = "Light Issue";
          lists[1].value = "Fans not Working";
          lists[2].value = "Wiring Issue";
          lists[3].value = "Switch Board Issue";
        }
        if (elementvalue === "Computer") {
          lists[0].text = "LAN Connectivity Issue";
          lists[1].text = "Cables not Working";
          lists[2].text = "Slow Performance";
          lists[3].text = "OS Abnormality";
          // Adding values:
          lists[0].value = "LAN Connectivity Issue";
          lists[1].value = "Cables not Working";
          lists[2].value = "Slow Performance";
          lists[3].value = "OS Abnormality";
        }
        if (elementvalue === "Plumbing") {
          lists[0].text = "Leaky Pipes";
          lists[1].text = "Dripping Faucets";
          lists[2].text = "Pipe Corrosion";
          lists[3].text = "Low Water Pressure";
          // Adding values:
          lists[0].value = "Leaky Pipes";
          lists[1].value = "Dripping Faucets";
          lists[2].value = "Pipe Corrosion";
          lists[3].value = "Low Water Pressure";
        }
        if (elementvalue === "Building") {
          lists[0].text = "Leaking Roofs";
          lists[1].text = "Pest Issues";
          lists[2].text = "Broken Windows";
          lists[3].text = "Paint Issue";
          // Adding values:
          lists[0].value = "Leaking Roofs";
          lists[1].value = "Pest Issues";
          lists[2].value = "Broken Windows";
          lists[3].value = "Paint Issue";
        }
        if (elementvalue === "Laboratory") {
          lists[0].text = "Broken Instruments";
          lists[1].text = "Chemical Shortage";
          lists[2].text = "Chemical Contamination";
          lists[3].text = "Other";
          // Adding values:
          lists[0].value = "Broken Instruments";
          lists[1].value = "Chemical Shortage";
          lists[2].value = "Chemical Contamination";
          lists[3].value = "Other";
        }
      }
    }
  </script>
</body>

</html>
