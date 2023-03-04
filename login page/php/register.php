<?php
$connection = mysqli_connect('http://localhost:3306/', 'arun', 'arun0987', 'register');


if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";


$stmt = mysqli_prepare($connection, $query);



mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);


mysqli_stmt_execute($stmt);


if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Registration successful!";
} else {
    echo "Registration failed!";
}



mysqli_stmt_close($stmt);
mysqli_close($connection);
?>