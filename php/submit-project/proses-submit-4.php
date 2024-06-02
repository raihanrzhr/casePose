<?php 
session_start();
include '../../php/connection.php';
$userId = $_SESSION["userId"];
$projectName = $_POST["projectName"];
$projectDescription = $_POST["projectDescription"];
$projectType = $_POST["projectType"];
$projectLink = $_POST["projectLink"];
$projectDate = $_POST["projectDate"];

$name_file = $_POST['projectPicture'];

$projectTag = $_POST["projectTag"];
$projectStatus = $_POST["projectStatus"];

// echo $userId ."<br>";
// echo $projectName ."<br>";
// echo $projectDate ."<br>";
// echo $projectDescription ."<br>";
// echo $projectLink ."<br>";
// echo $projectStatus ."<br>";
// echo $projectTag ."<br>";
// echo $projectType ."<br>";
// echo $name_file ."<br>";

if(empty($projectName) || empty($projectDescription) || empty($projectType) || empty($projectLink) || empty($projectLink) || empty($projectTag) || empty($projectStatus)){

    header("Location: ../../after/submit-project/submit-project-4.php?".
        "projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType".
        "&projectLink=$projectLink&projectPicture=$name_file".
        "&projectTag=$projectTag&projectStatus=$projectStatus&pesan=kosong");
}else{
    if (strlen($projectDescription) > 255) {
        // Redirect jika panjang melebihi 40 karakter
        header("Location: ../../after/submit-project/submit-project-4.php?".
        "projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType".
        "&projectLink=$projectLink&projectPicture=$name_file".
        "&projectTag=$projectTag&projectStatus=$projectStatus&pesan=project-desc-length-40");
    }else{
        if (strlen($projectName) > 40) {
    // Redirect jika panjang melebihi 40 karakter
        header("Location: ../../after/submit-project/submit-project-4.php?".
        "projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType".
        "&projectLink=$projectLink&projectPicture=$name_file".
        "&projectTag=$projectTag&projectStatus=$projectStatus&pesan=project-name-length-40");
        }else{
            
            if (substr($projectLink, 0, 8) !== "https://") {
                header("Location: ../../after/submit-project/submit-project-4.php?".
                "projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType".
                "&projectLink=$projectLink&projectPicture=$name_file".
                "&projectTag=$projectTag&projectStatus=$projectStatus&pesan=https");
            }else{
                if(strlen($projectTag) > 255){
                    header("Location: ../../after/submit-project/submit-project-4.php?".
                    "projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType".
                    "&projectLink=$projectLink&projectPicture=$name_file".
                    "&projectTag=$projectTag&projectStatus=$projectStatus&pesan=project-tag-length-255");
                }else{
                    
                    // ALTER TABLE `project` ADD `projectTag` VARCHAR(255) NOT NULL AFTER `projectStatus`;
                    $sqll = "SELECT MAX(projectId) AS last_id FROM project";
                    
                    $hasil = mysqli_query($conn,$sqll);
                    $rows = mysqli_fetch_assoc($hasil);
                    $new_id = $rows["last_id"] + 1;

                    $sql = "INSERT INTO project (projectId,projectName, projectType, projectDescription, projectLink, projectPicture, uploadDate, projectStatus, projectTag, userId) 
                    VALUES ('$new_id','$projectName', '$projectType', '$projectDescription', '$projectLink', '$name_file', '$projectDate', '$projectStatus', '$projectTag', '$userId')";

                    if (mysqli_query($conn, $sql)) {
                        // Berhasil menambahkan data
                        echo "Data berhasil ditambahkan";
                        // Redirect ke halaman lain jika diperlukan
                        header("Location: ../../after/index.php");
                        exit();
                    } else {
                        // Gagal menambahkan data
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
    
            }
        }
    }
}

?>