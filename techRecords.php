<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Allocating Technician</title>
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
    .invisible{
      visibility: hidden;
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
    #title{
      font-size: 2.7rem;
    }
    .lastbtns{
      display: flex;
      justify-content: space-between;
      padding: 2%;
      background-color: white;
    }
    @media only screen and (max-width:1200px){
      .table thead{
        display:none;
      }
      #title{
        font-size: 1.5rem;
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
      <h1 id="title" class="cap-heading">Technicians for <?php echo $_GET["issueregards"];?> Maintenance</h1>
      <div class="depts table-responsive">
        <table class="table table-hover status-data">
          <thead>
          <th>TID</th>
          <th>Name</th>
          <th>Department</th>
          <th>Email</th>
          <th>Password</th>
          <th>Available</th>
          <th>Allocate Task</th>
          <th>Reports</th>
        </thead>
          <?php
            //getting complaint id...
            $cid=$_GET["cid"];
            //Adding connectivity...
      		  $conn=mysqli_connect("localhost","root","","issuelist");
            $issueregards=$_GET["issueregards"];
            $query="SELECT *FROM technicians WHERE department='$issueregards' AND available=1";
      			$query_run=mysqli_query($conn,$query);
      			if(mysqli_num_rows($query_run) > 0)
      			{
              foreach ($query_run as $row)
      				{
                  ?>
                    <tbody>
                    <tr>
                      <td data-label="TID"> <?= $row['id']; ?> </td>
                      <td data-label="Name"> <?= $row['name']; ?></td>
                      <td data-label="Department"> <?= $row['department']; ?> </td>
                      <td data-label="Email Id"> <?= $row['email_id']; ?> </td>
                      <td data-label="Password"> <?= $row['password']; ?> </td>
                      <td data-label="Available"> <?= $row['Available']; ?> </td>
                      <td data-label="Allocate Task">
                        <a href="simple.php?tid=<?=$row["id"];?>&cid=<?=$cid;?>">
                        <button type="submit" class="btn btn-primary">
                          Allocate
                        </button>
                       </a>
                      </td>
                      <td data-label="Reports">
                        <a href="counter.php?tname=<?=$row["name"];?>">
                        <button name="reports" class="btn" style="background-color:#FF8C00;color:white;">
                          Reports
                        </button>
                       </a>
                      </td>
                    </tr>
                  </tbody>
                <?php
  				    }
           }
           else {
             echo "<h2>Add a New Technician</h2>";
             echo "<script>document.querySelector('.status-data').classList.add('invisible');</script>";
           }
		    ?>
        </table>
      </div>
        <div class="lastbtns">
          <a href="techOpr.php?dept=<?=$_GET["issueregards"];?>">
            <button class="btn btn-primary" name="insert">Add New Record</button>
          </a>
          <a href="techInfos.php?dept=<?=$_GET["issueregards"];?>">
            <button name="techInfos" style="background-color:#799F0C;color:white;" class="btn">Tech History</button>
          </a>
          <button class="btn btn-success" name="refresh" onclick="window.location.reload();">Refresh Database</button>
          <a href="techOpr2.html">
            <button class="btn btn-danger" name="remove">Remove Record</button>
          </a>
      </div>
    </div>
  </section>
</body>
</html>
