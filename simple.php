<?php
$conn = mysqli_connect("localhost", "root", "", "issuelist");
$techId= $_GET['tid'];
$cid=$_GET['cid'];
// For mails only...
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
//Getting Tehnicians email
$q1="SELECT name,email_id FROM technicians WHERE id=$techId";
$r1=$conn->query($q1);
if($r1)
{
  $row1=$r1->fetch_assoc();
  if($row1!=null)
  {
    $techemail=$row1["email_id"];
    $tname=$row1["name"];
    $r1->close();
    $sql = "UPDATE issuelist SET technician='$tname',status='Assigned' WHERE id=$cid";
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
            // header("location:state.php");

    }
    else
    {
          echo "Error...";
    }
    //Mailing to technician...
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='gmaroof99@gmail.com';
    $mail->Password='msjjptdexhbirfiv';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('gmaroof99@gmail.com');
    $mail->addAddress($techemail);
    $mail->isHTML(true);
    $mail->Subject="New Task";
    $mail->Body="Dear $tname, principal has allocated a new task for you. Please attend to this matter promptly.";
    $mail->send();
  }
  else{
    echo "Issue spotted...";
  }
}
else {
  echo "404 Not Found...";
}

//For complainant...
$nquery="SELECT cptname,email FROM issuelist WHERE id=$cid";
$hold_result=$conn->query($nquery);
if($hold_result)
{
	$row=$hold_result->fetch_assoc();
	if($row!=null)
	{
      $cptname=$row["cptname"];
      $cemail=$row["email"];
      $hold_result->close();
      //mailing the id...
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host='smtp.gmail.com';
      $mail->SMTPAuth=true;
      $mail->Username='gmaroof99@gmail.com';
      $mail->Password='msjjptdexhbirfiv';
      $mail->SMTPSecure='ssl';
      $mail->Port=465;
      $mail->setFrom('gmaroof99@gmail.com');
      $mail->addAddress($cemail);
      $mail->isHTML(true);
      $mail->Subject="Complainant id";
      $mail->Body="Dear $cptname, your complaint id is: ".$cid."<br><br>Please use this id to check your status.";
      $mail->send();
      header("location:confirmation.html");
    }
    else
    {
        echo "Something went wrong...";
    }
}
else
{
    echo "Invalid request.";
}
mysqli_close($conn);
?>
