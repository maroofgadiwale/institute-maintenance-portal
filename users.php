<?php
  session_start();
  $conn=mysqli_connect("localhost","root","","issuelist");
  if(!$conn)
  {
    die("Connection failed...".mysqli_connect_error());
  }
  //Login option...
  if(isset($_POST["login"]))
  {
    $curremail=$_POST["email"];
    $currpass=$_POST["password"];
    $select=mysqli_query($conn,"SELECT *FROM logindb WHERE email='$curremail' AND password='$currpass'");
    $row=mysqli_fetch_array($select);
    if(is_array($row))
    {
        $_SESSION["email"]=$row["email"];
        $_SESSION["password"]=$row["password"];
    }
    else
    {
           header("location:noresults.html");
    }
    if(isset($_SESSION["email"]))
    {
      header("location:home.php");
    }
  }
  //Signup option...
  if(isset($_POST["signup"]))
  {
    $email=$_POST["email"];
    $password=$_POST["password"];
    $query="INSERT INTO loginDB(email,password) VALUES ('$email','$password')";
    if(mysqli_query($conn,$query))
    {
      // header('location:home.php');
      $select=mysqli_query($conn,"SELECT *FROM logindb WHERE email='$email' AND password='$password'");
      $row=mysqli_fetch_array($select);
      if(is_array($row))
      {
          $_SESSION["email"]=$row["email"];
          $_SESSION["password"]=$row["password"];
      }
      if(isset($_SESSION["email"]))
      {
        header("location:home.php");
      }
    }
    else{
      echo "Something went wrong...Try Again";
    }

  }
  mysqli_close($conn);
?>
