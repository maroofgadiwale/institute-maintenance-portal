<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Status of Departments</title>
  <!-- Shortcut icon -->
  <link rel="shortcut icon" type="images/png" href="images/PortIcon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS link -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- Google Fonts link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Questrial&display=swap" rel="stylesheet">
  <!-- Bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <style>
    *{
      box-sizing: border-box;
    }
    .table{
      width:100%;
      border-collapse:collapse;
    }
    .table td,.table th{
      padding:12px 15px;
      border:1px solid #ddd;
      text-align:center;
      font-size:16px;
    }
    .appearance{
      visibility: hidden;
    }
    .table th{
      background-image:linear-gradient(to left,#EB3349,#F45C43);
      color:#ffffff;
    }

    .table tbody tr:nth-child(even){
      background-color:#f5f5f5;
    }

    @media only screen and (max-width:1200px){
      .table thead{
        display:none;
      }
      #title{
        font-size: 2.5rem;
      }
      #brand{
        height:90px;
        width: 90px;
      }
      .table, .table tbody, .table tr, .table td{
        display:block;
        width:100%;
      }
      .table tr{
        margin-bottom:15px;
      }
      .table td{
        text-align:right;
        padding-left:50%;
        text-align: right;
        position: relative;
      }
      .table td::before{
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left:15px;
        font-size: 15px;
        font-weight: bold;
        text-align: left;
      }
    }
  </style>
</head>

<body>
  <section id="menu-section" class="navigation-bars">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="logout.php"> <img src="images/log-out.png" alt="brand-image" id="brand" height="120px" width="120px"></a>
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

  <section id="status">
    <div class="container">
      <h1 id="title" class="cap-heading">Issues Reported</h1>
      <div class="depts table-responsive">
        <table class="table table-hover status-data">
          <thead>
          <th>CID</th>
          <th>Department</th>
          <th>Complainant</th>
          <th>Room Number</th>
          <th>Email</th>
          <th>Report Date</th>
          <th>Issue Regards</th>
          <th>Issue About</th>
          <th>Technician Assigned</th>
          <th>Status</th>
          <th>Allocate</th>
        </thead>
          <!-- Inserting Data in row -->
          <?php
          //Checking principal's credentials here...
          if(isset($_POST["submit"]))
          {
      		  $conn=mysqli_connect("localhost","root","","issuelist");
            $emailid=$_POST['email'];
            $password=$_POST['password'];
            $query1="SELECT email,password from principal where email='$emailid' and password='$password'";
            $result=$conn->query($query1);
            $nemail="";
            $npass="";
            if ($result)
            {
              $row = $result->fetch_assoc();
              if($row!=null)
              {
                $nemail = $row['email'];
                $npass = $row['password'];
                $result->close();
              }
              else{
                echo
                "
                  <script>
                  document.querySelector('.status-data').classList.add('appearance');
                  document.querySelector('.cap-heading').innerHTML='Your credentials are invalid';
                  document.querySelector('.navigation-bars').classList.add('appearance');
                  setTimeout(function(){
                    window.location.href='principalAuth.html';
                  },6000);
                </script>
                ";
              }
            }
            if($nemail==$emailid && $npass==$password)
            {
            //Displaying data...
      			$query="SELECT *from issuelist where status='New' or status='Assigned'";
      			$query_run=mysqli_query($conn,$query);
      			if(mysqli_num_rows($query_run) > 0)
      			{
              foreach ($query_run as $row)
      				{
                  ?>
                    <tbody>
                    <tr>
                      <td data-label="Complaint Id"> <?= $row['id']; ?> </td>
                      <td data-label="Department"> <?= $row['deptname']; ?></td>
                      <td data-label="Complainant"> <?= $row['cptname']; ?> </td>
                      <td data-label="Room No."> <?= $row['roomno']; ?> </td>
                      <td data-label="Email"> <?= $row['email']; ?> </td>
                      <td data-label="Date"> <?= $row['dates']; ?> </td>
                      <td data-label="Issue Regarding"> <?= $row['depts']; ?> </td>
                      <td data-label="Issue About"> <?= $row['issue']; ?> </td>
                      <td data-label="Technician"> <?= $row['technician']; ?> </td>
                      <td data-label="Status"> <?= $row['status']; ?> </td>
                      </td>
                      <td data-label="Assign Technician">
                        <button type="submit" class="btn btn-primary">
                          <a href="update.php?id=<?= $row['id'];?>" style="text-decoration:none;color:white;">Allocate</a>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                <?php
  				    }
  			   }
    		  	else{
    				    echo "No Data Found";
                }
           }
         }
		    ?>
        </table>
      </div>
    </div>
  </section>
</body>
</html>
