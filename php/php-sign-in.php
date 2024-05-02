<?php
session_start();
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if email and password are not empty
    if (empty($email) || empty($password)) {
        // If either email or password is empty, set error message and redirect back to login page
        header("Location: ../sign-in.php?pesan=kosong");
        exit(); // Stop further execution
    }

    

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $cek = mysqli_query($conn,$sql);
    $result = mysqli_num_rows($cek);

    if ($result == 1) {
        // Login successful, set session variables

        $_SESSION["email"] = $email;
        $_SESSION["status"] = "login";
        header("Location: ../after/index.html"); // Redirect to dashboard upon successful login
        exit(); // Stop further execution
    } else {
        // Login failed, set error message and redirect back to login page
        header("Location: ../sign-in.php?pesan=gagal");
        exit(); // Stop further execution
    }

    $conn->close();
}
?>
