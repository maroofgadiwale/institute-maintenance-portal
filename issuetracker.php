<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Issue</title>
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
    <style>
    @media only screen and (max-width: 1920px) {
      form {
        width: 80%;
      }
      #title{
        font-size:1.9rem;
      }

      .table thead {
        display: none;
      }

      .table,
      .table tbody,
      .table tr,
      .table td {
        display: block;
        width: 100%;
      }

      .table tr {
        margin-bottom: 15px;
      }

      .table td {
        text-align: right;
        padding-left: 50%;
        text-align: right;
        position: relative;
      }

      .table td::before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 15px;
        font-size: 1.2rem;
        font-weight: bold;
        text-align: left;
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

    <section id="status-records">
      <div class="container">
        <h1 id="title">Issue progress for Complaint id: <?php echo $_POST["complaintid"];?></h1>
      <table class="table table-hover" id="record">
        <?php
          $conn=mysqli_connect("localhost","root","","issuelist");
          if (isset($_POST['submit']))
          {
            $compid=$_POST['complaintid'];
            $nemail=$_POST['email'];
            $query="SELECT *from issuelist where id='$compid' and email='$nemail'";
            $query_run=mysqli_query($conn,$query);
            //Getting the status now...
            $q="SELECT status from issuelist WHERE id=$compid";
            $result=$conn->query($q);
            $state="";
            if($result)
            {
              $row=$result->fetch_assoc();
              if($row!=null)
              {
                $state=$row["status"];
              }
            }
            if(mysqli_num_rows($query_run) > 0)
            {
               foreach ($query_run as $row)
               {
                 ?>
                 <tbody>
                   <tr>
                   <td data-label="Complaint ID"><?= $row['id']; ?> </td>
                   <td data-label="Department"><?= $row['deptname'];?></td>
                   <td data-label="Complainant" ><?= $row['cptname']; ?></td>
                   <td data-label="Room No."><?= $row['roomno']; ?></td>
                   <td data-label="Email"><?= $row['email']; ?></td>
                   <td data-label="Report Date"><?= $row['dates']; ?></td>
                   <td data-label="Issue Regards"><?= $row['depts']; ?></td>
                   <td data-label="Issue About"><?= $row['issue']; ?></td>
                   <td data-label="Technician Assigned"><?= $row['technician']; ?></td>
                   <td data-label="Status"><?= $row['status']; ?></td>
                   </tr>
                 </tbody>
                 <?php
               }
            }
            else
            {
                header("location:noresults.html");
            }
          }
        ?>
      </table>
      <?php
        if($state=="Under Review" || $state=="Assigned")
        {
          echo "<img src='images/stage0.png' style='width:100%;margin-top:3%;'>";
        }
        elseif($state=="On Hold")
        {
          echo "<img src='images/stage1.png' style='width:100%;margin-top:3%;'>";
        }
        elseif($state=="Rejected")
        {
          echo "<img src='images/stage2.png' style='width:100%;margin-top:3%;'>";
        }
        elseif($state=="In Progress")
        {
          echo "<img src='images/stage3.png' style='width:100%;margin-top:3%;'>";
        }
        else{
          echo "<img src='images/stage4.png' style='width:100%;margin-top:3%;'>";
        }
      ?>
    </div>

    </section>
  </body>
</html>
