<?php
  $conn=mysqli_connect("localhost","root","","issuelist");
  $currid=$_GET['id'];
  // Actual Code here...
  if(isset($_POST['status']))
  {
    $curr_status=$_POST['status'];
    $sql="UPDATE issuelist set status='$curr_status' WHERE id='$currid'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      header("location:statuslink.html");
    }
    else
    {
      echo "Error...";
    }
  }
  mysqli_close($conn);
?>
