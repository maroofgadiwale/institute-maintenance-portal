<?php
$conn=mysqli_connect("localhost","root","","issuelist");
//Mailings...
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
//Insertion
if(isset($_POST["submit"]))
{
  $name=$_POST["techName"];
  $dept=$_GET["techDept"];
  $temail=$_POST["techEmail"];
  $deptPass=$_POST["deptPass"];
  $query="INSERT INTO technicians(name,department,email_id,password,available) VALUES ('$name','$dept','$temail','$deptPass',1)";
  if(mysqli_query($conn,$query))
  {
    $nxquery="SELECT id FROM technicians WHERE email_id='$temail'";
    $res=$conn->query($nxquery);
    $nid="";
    if($res)
    {
      $r=$res->fetch_assoc();
      if($r!=null)
      {
        $nid=$r["id"];
        $res->close();
      }
    }
    //Now send mails...
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='gmaroof99@gmail.com';
    $mail->Password='msjjptdexhbirfiv';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('gmaroof99@gmail.com');
    $mail->addAddress($temail);
    $mail->isHTML(true);
    $mail->Subject="Your Credentials";
    $mail->Body="Dear $name, your department password is: $deptPass and ID is: $nid<br><br>Attention: Please don't share it with anyone it's confidential";
    $mail->send();
    header('location:done.html');
  }
  else{
    echo "Issue";
  }
  mysqli_close($conn);
}
//Removing a record not permanently...
if(isset($_POST["remove"]))
{
  $techId=$_POST["techId"];
  $depts=$_POST["departments"];
  $query="UPDATE technicians SET Available=0 WHERE id=$techId and department='$depts' ";
  if(mysqli_query($conn,$query))
  {
    header("location:done.html");
  }
  else{
    echo "Something went wrong...";
  }
  mysqli_close($conn);
}

?>
