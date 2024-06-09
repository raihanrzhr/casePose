<?php
include '../connection.php';

$id_project = $_POST["projectId"];

$projectName = $_POST["projectName"];
$projectDescription = $_POST["projectDescription"];
$projectType = $_POST["projectType"];

// Cek apakah projectName, projectDescription, atau projectType kosong
if (empty($projectName) || empty($projectDescription) || empty($projectType)) {
    
    header("Location: ../../after/edit-project/edit-project-1.php?pesan=kosong&idproject=$id_project");
}else {
    if (strlen($projectDescription) > 255) {
    // Redirect jika panjang melebihi 40 karakter
    header("Location: ../../after/edit-project/edit-project-1.php?pesan=project-desc-length-255&idproject=$id_project");
    }else{
        if (strlen($projectName) > 40) {
    // Redirect jika panjang melebihi 40 karakter
        header("Location: ../../after/edit-project/edit-project-1.php?pesan=project-name-length-40&idproject=$id_project");
        }else{
            
            $sql = mysqli_query($conn,"UPDATE project SET projectName = '$projectName',
            projectDescription = '$projectDescription', projectType = '$projectType'
            WHERE projectId = '$id_project'");

            header("Location: ../../after/edit-project/edit-project-1.php?pesan=sukses&idproject=$id_project");
        }
    }
}


?>