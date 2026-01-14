<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Issues Solved</title>
  <!-- Shortcut icon -->
  <link rel="shortcut icon" type="images/png" href="images/engineer.png">
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
      font-size:1.2rem;
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

    @media only screen and (max-width:1200px){
      .table thead{
        display:none;
      }
      #title{
        font-size: 1.8rem;
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
      .table td{
        font-size: 1.3rem;
      }
      .table td::before{
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left:15px;
        font-size: 1.3rem;
        font-weight: bold;
        text-align: left;
      }
    }
  </style>
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
  <!-- issue counter -->
  <section id="counter">
    <div class="container">
      <h1 id="title" class="cap-heading">Technician Reports</h1>
      <div class="depts table-responsive">
        <table class="table table-hover status-data">
          <thead>
          <th>Technician</th>
          <th>Under Review</th>
          <th>On Hold</th>
          <th>Rejected</th>
          <th>In Progress</th>
          <th>Completed</th>
        </thead>
          <?php
            //Adding connectivity...
            $conn=mysqli_connect("localhost","root","","issuelist");
            $tname=$_GET["tname"];
            //UR count...
            $qUR = "SELECT COUNT(*) as count FROM issuelist WHERE status='Under Review' AND technician='$tname'";
            $res1 = mysqli_query($conn, $qUR);
            if($res1)
            {
              $row1=mysqli_fetch_assoc($res1);
            }
            $urcnt=$row1['count'];
            //Hold count...
            $qhold = "SELECT COUNT(*) as count FROM issuelist WHERE status='On Hold' AND technician='$tname'";
            $res2 = mysqli_query($conn, $qhold);
            if($res2)
            {
              $row2=mysqli_fetch_assoc($res2);
            }
            $holdcnt=$row2['count'];
            //Rejected count...
            $qreject = "SELECT COUNT(*) as count FROM issuelist WHERE status='Rejected' AND technician='$tname'";
            $res3 = mysqli_query($conn, $qreject);
            if($res3)
            {
              $row3=mysqli_fetch_assoc($res3);
            }
            $rejcnt=$row3['count'];
            //In Progress...
            $qprogress = "SELECT COUNT(*) as count FROM issuelist WHERE status='In Progress' AND technician='$tname'";
            $res4 = mysqli_query($conn, $qprogress);
            if($res4)
            {
              $row4=mysqli_fetch_assoc($res4);
            }
            $progcnt=$row4['count'];
            //Completed...
            $qcomplete = "SELECT COUNT(*) as count FROM issuelist WHERE status='Completed' AND technician='$tname'";
            $res5 = mysqli_query($conn, $qcomplete);
            if($res5)
            {
              $row5=mysqli_fetch_assoc($res5);
            }
            $compcnt=$row5['count'];
            mysqli_close($conn);
            ?>
            <tbody>
                 <tr>
                  <td data-label="Technician Name"> <?= $tname; ?> </td>
                  <td data-label="Under Review"><?=$urcnt;?> </td>
                  <td data-label="On Hold"><?= $holdcnt; ?> </td>
                  <td data-label="Rejected"><?= $rejcnt; ?> </td>
                  <td data-label="In Progress"><?= $progcnt; ?> </td>
                  <td data-label="Completed"><?= $compcnt; ?></td>
                </tr>
          </tbody>
        </table>
      </div>
    </div>
    <?php
      if($compcnt >= 2 && $compcnt<3)
      {
        echo "<center><img src='images/good.png'></center>";
      }
      elseif($compcnt >=3 && $compcnt<4)
      {
        echo "<center><img src='images/better.png'></center>";
      }
      elseif($compcnt>=4)
      {
        echo "<center><img src='images/best.png' style='width:70%;'></center>";
      }
    ?>
  </section>
</body>

</html>
