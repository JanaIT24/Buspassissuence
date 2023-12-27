<?php
session_start();
include "db_conn.php";
$mysqli = new mysqli($sname, $unmae, $password, $db_name);
if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    //$password = $_POST['password'];

    // Perform user registration and database insertion here
    // You need to write the code to insert the user into the database

    // Example code for inserting a user (modify it based on your database structure)
    $query = "UPDATE details SET name='$name',emailid='$email'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: User registration failed.";
    }

    $stmt->close();
}
