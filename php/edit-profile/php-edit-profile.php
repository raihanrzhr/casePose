<?php 
include '../connection.php';
session_start();
$userId = $_SESSION["userId"];

// Ekstensi yang diperbolehkan dan ukuran file maksimal
$ekstensi_diperbolehkan = ['jpg', 'jpeg', 'png'];
$ukuran_file_maksimal = 5 * 1024 * 1024; // 5 MB

// Data file yang diupload
$file = $_FILES['profilePicture'];

$old_picture = $file["name"];

$nama_file = $file['name'];
$ukuran_file = $file['size'];
$tmp_file = $file['tmp_name'];

// Data pengguna lainnya
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$about = $_POST['about_me'];
$folder_p_picture = '../../asset/users/user/';

if (empty($nama_file)) {
    $updateGeneral = "UPDATE user SET firstName = '$firstName', lastName = '$lastName', 
    email = '$email', about_me = '$about' WHERE userId = '$userId'";
} else {
    // Mendapatkan ekstensi file
    $ekstensi_file = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

    // Validasi jenis dan ukuran file
    if (in_array($ekstensi_file, $ekstensi_diperbolehkan) && $ukuran_file <= $ukuran_file_maksimal) {
        // Memindahkan file yang diupload ke folder tujuan
        if (move_uploaded_file($tmp_file, $folder_p_picture . $nama_file)) {

            unlink($folder_p_picture.$old_picture);

            $updateGeneral = "UPDATE user SET firstName = '$firstName', lastName = '$lastName', 
            email = '$email', about_me = '$about', profilePicture = '$nama_file' WHERE userId = '$userId'";
        } else {
            die("Upload file gagal");
        }
    } else {
        if (!in_array($ekstensi_file, $ekstensi_diperbolehkan)) {
            die("Tipe file tidak valid. Hanya file JPG, JPEG, dan PNG yang diperbolehkan.");
            header("Location: ../../after/edit profil/edit_profil_general.php?pesan=tipe");
        }
        if ($ukuran_file > $ukuran_file_maksimal) {
            die("Ukuran file melebihi batas 5 MB.");
            header("Location: ../../after/edit profil/edit_profil_general.php?pesan=5mb");
        }
    }
}

if (mysqli_query($conn, $updateGeneral)) {
    header("Location: ../../after/edit profil/edit_profil_general.php?pesan=sukses");
} else {
    die("Update database gagal: " . mysqli_error($conn));
}
?>
