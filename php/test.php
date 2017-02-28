<?php
include "connection.php";
$email = $_POST['email'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

$email = mysqli_real_escape_string($conn, $_POST['email']);
$sql = "INSERT INTO test.users (username,email,password ,first_name, last_name)
VALUES ('ybce','$email', '$password', '$fname', '$lname')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>