<?php
$servername = "http://localhost:3306/"; 
  $username = "arun"; 
  $password = "arun0987"; 
  $dbname = "login"; 


  $conn = new mysqli($servername, $username, $password, $dbname);


  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO login (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: profile.html"); //redirect to the profile page
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  $conn->close();
  ?>