<?php
$servername = "http://localhost:3306/";
$username = "arun";
$password = "arun0987";
$dbname = "profile";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $address1 = mysqli_real_escape_string($conn, $_POST["address1"]);
    $address2 = mysqli_real_escape_string($conn, $_POST["address2"]);
    $postcode = mysqli_real_escape_string($conn, $_POST["postcode"]);
    $state = mysqli_real_escape_string($conn, $_POST["state"]);
    $area = mysqli_real_escape_string($conn, $_POST["area"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $education = mysqli_real_escape_string($conn, $_POST["education"]);
    $country = mysqli_real_escape_string($conn, $_POST["country"]);
    $region = mysqli_real_escape_string($conn, $_POST["region"]);

    $sql = "INSERT INTO users (firstname, lastname, phone, address1, address2, postcode, state, area, email, education, country, region)
            VALUES ('$firstname', '$lastname', '$phone', '$address1', '$address2', '$postcode', '$state', '$area', '$email', '$education', '$country', '$region')";

    if (mysqli_query($conn, $sql)) {
        echo "Data added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
