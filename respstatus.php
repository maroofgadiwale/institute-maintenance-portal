<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Provide Status</title>
    <meta charset="utf-8">
    <!-- Shortcut icon -->
    <link rel="shortcut icon" type="images/png" href="images/report.png">
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
      .form-control,.assign{
        width:40%;
        display: inline;
      }
      *{
        box-sizing: border-box;
      }
      .table{
        width:100%;
        border-collapse:collapse;
        margin-top:5%;
        font-family: 'Questrial', sans-serif;
      }
      .table td{
        padding:20px 15px;
        border:1px solid #ddd;
        text-align:center;
        font-size:1.2rem;
      }


      .table tbody tr:nth-child(even){
        background-color:#f5f5f5;
      }

      @media only screen and (max-width:1920px){
        .table{
          display:none;
        }
        #title{
          margin-top:5%;
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
        .table{
          margin-top:5%;
        }
        .table td::before{
          content: attr(data-label);
          position: absolute;
          left: 0;
          width: 50%;
          padding-left:15px;
          font-size: 1.2rem;
          font-weight: bold;
          text-align: left;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1 id="title">Provide Status <img src="images/report.png" height="80px" width="80px" alt="Status" > </h1>
      <table class="table table-hover">
        <?php
        $conn=mysqli_connect("localhost","root","","issuelist");
        $uid=$_GET['id'];
        $query="SELECT *from issuelist where id='$uid'";
        $query_run=mysqli_query($conn,$query);
        if(mysqli_num_rows($query_run) > 0)
        {
          foreach ($query_run as $row)
          {
              ?>
                <tbody>
                  <tr>
                  <td data-label="Complaint Id"><?= $row['id']; ?> </td>
                  <td data-label="Department" style="color:red;font-weight:bold;"><?= $row['deptname'];?></td>
                  <td data-label="Complainant"><?= $row['cptname']; ?></td>
                  <td data-label="Room Number" style="color:red;font-weight:bold;"> <?= $row['roomno']; ?></td>
                  <td data-label="Email"><?= $row['email']; ?></td>
                  <td data-label="Report Date"><?= $row['dates']; ?></td>
                  <td data-label="Issue Regards" style="color:red;font-weight:bold;"><?= $row['depts']; ?> </td>
                  <td data-label="Issue About" style="color:red;font-weight:bold;"><?= $row['issue']; ?> </td>
                  <td data-label="Technician Assigned"><?= $row['technician']; ?></td>
                  <td data-label="Status" style="color:red;font-weight:bold;"><?= $row['status']; ?></td>
                  <form action="techStatus.php?id=<?=$row['id'];?>" method="post" id="statusform">
                  <td data-label="Provide Status of Task">
                    <select name="status" class="form-control">
                      <option value="Under Review">Under Review</option>
                      <option value="On Hold">On Hold</option>
                      <option value="Rejected">Rejected</option>
                      <option value="In Progress">In Progress</option>
                      <option value="Completed">Completed</option>
                    </select>
                  </td>
                  <td data-label="Click to set Status">
                      <button type="submit" class="btn btn-primary" onclick="submitForm()">
                        SetStatus
                      </button>
                  </td>
                </form>
                </tr>
              </tbody>
            <?php
          }
        }
     else
      echo "No data found";
      ?>
    </table>
  </div>
  <script>
    function submitForm() {
        document.getElementById("myform").submit();
    }
</script>
  </body>
</html>
