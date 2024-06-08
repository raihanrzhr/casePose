<?php
// Ambil data dari form
$projectName = $_POST["projectName"];
$projectDescription = $_POST["projectDescription"];
$projectType = $_POST["projectType"];

// Cek apakah projectTitle, projectDescription, atau projectType kosong
if (empty($projectName) || empty($projectDescription) || empty($projectType)) {
    
    header('Location: ../../after/edit-project/edit-project-1.php?pesan=kosong');
}else {
    if (strlen($projectDescription) > 255) {
    // Redirect jika panjang melebihi 40 karakter
    header('Location: ../../after/edit-project/edit-project-1.php?pesan=project-desc-length-255');
    }else{
        if (strlen($projectName) > 40) {
    // Redirect jika panjang melebihi 40 karakter
        header('Location: ../../after/edit-project/edit-project-1.php?pesan=project-name-length-40');
        }else{
            header("Location: ../../after/edit-project/edit-project-2.php?".
            "projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType");
        }
    }
}

?>