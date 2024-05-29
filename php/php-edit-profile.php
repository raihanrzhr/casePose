<?php
    // 01. Koneksi database
    include "connection.php";

    // 02. Tangkap variable dari UI inputan
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $about = $_POST['about'];
    $id = $_POST['id'];

    // 03. Query SQL UPDATE di database
    $updateGeneral = "UPDATE user SET firstName = '".$firstName."', lastName = '".$lastName."', email = '".$email."', about_me = '".$about."' WHERE userId = '".$id."'";

    // 04. Eksekusi SQL
    $result = mysqli_query($conn, $updateGeneral);

    // 05. Kembali ke halaman profil.php
    header("location:../after/profil.php?");
?>