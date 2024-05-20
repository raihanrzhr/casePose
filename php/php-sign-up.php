<?php
session_start();
include 'connection.php';

// Periksa apakah formulir telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['sbpw'];

    // Periksa apakah ada kolom yang kosong
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password)) {
        // Redirect dengan pesan kesalahan jika ada kolom yang kosong
        header("Location: ../sign-up.php?pesan=kosong");
        exit(); // Pastikan untuk keluar setelah melakukan redireksi
    } else {
        // Periksa apakah format email benar
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@upi\.edu$/', $email)) {
            // Redirect dengan pesan kesalahan jika format email tidak benar
            header("Location: ../sign-up.php?pesan=gagal-upi");
            exit();
        } else {
            // Periksa apakah kata sandi cocok
            if ($password !== $confirm_password) {
                // Redirect dengan pesan kesalahan jika kata sandi tidak cocok
                header("Location: ../sign-up.php?pesan=sinkron");
                exit();
            } else {
                // Persiapkan pernyataan SQL untuk menyimpan data pengguna ke dalam tabel user
                $sql_id = "SELECT COUNT(userId) AS last_id FROM user";
                $new_id1 = mysqli_query($conn,$sql_id);
                $new_id2 = mysqli_fetch_assoc($new_id1);
                $new_id = $firstname.$new_id2["last_id"];

                $sql = "INSERT INTO user (userId,email, password, firstName, lastName) VALUES (?,?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $new_id, $email, $password, $firstname, $lastname);

                // Hash kata sandi sebelum disimpan ke database
                
                // Jalankan pernyataan yang telah disiapkan
                if ($stmt->execute()) {
                    $sql2 = "SELECT * FROM user WHERE email='$email' AND password='$password'";
                    $result = mysqli_query($conn, $sql2);
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION["userId"] = $row["userId"];
                    $_SESSION["status"] = "login";
                    // Redirect ke halaman sign-in setelah pendaftaran berhasil
                    header("Location: ../after/index.php");
                    exit();
                } else {
                    // Redirect dengan pesan kesalahan jika gagal menyimpan data
                    header("Location: ../sign-up.php?pesan=error");
                    exit();
                }
            }
        }
    }
}
?>
