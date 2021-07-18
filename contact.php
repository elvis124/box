<?php include('database.php');

$email = $_SESSION['email'];

//create table if it does not exist

    $sql = "CREATE TABLE IF NOT EXISTS messages (
        
        msg_id INT AUTO_INCREMENT PRIMARY KEY,

        email VARCHAR(255) NOT NULL,

        email VARCHAR(200) NOT NULL,

        subject VARCHAR(200) NOT NULL,

        message VARCHAR(300) NOT NULL;

        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )  ENGINE=INNODB";

    mysqli_query($con, $sql);


  if(isset($_POST['submit'])){

  	$user_ip = getRealUserIp();
  	$email = $_POST['email'];
  	$subject = $_POST['subject'];
  	$message = $_POST['message'];



  	$send = "INSERT INTO messsages(user_ip, email, subject, message) VALUES ('$user_ip', '$email','$subject','$message')";
  	$connect = mysqli_query($con, $send);

  	echo "<script>alert('your message has been received you will recieve back message in 24hrs.')</script>";
  	echo "<script>window.open('../pages/home/home.php', '_self');</script>";

  }
?>

