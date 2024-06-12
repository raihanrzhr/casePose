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

if (empty($projectName) || empty($projectDescription) || empty($projectType) || empty($projectLink) || empty($projectTag) || empty($projectStatus)) {
    header("Location: ../../after/submit-project/submit-project-4.php?".
        "projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType".
        "&projectLink=$projectLink&projectPicture=$name_file".
        "&projectTag=$projectTag&projectStatus=$projectStatus&pesan=kosong");
    exit();
} else {
    if (strlen($projectDescription) > 255) {
        header("Location: ../../after/submit-project/submit-project-4.php?".
        "projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType".
        "&projectLink=$projectLink&projectPicture=$name_file".
        "&projectTag=$projectTag&projectStatus=$projectStatus&pesan=project-desc-length-40");
        exit();
    } else {
        if (strlen($projectName) > 40) {
            header("Location: ../../after/submit-project/submit-project-4.php?".
            "projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType".
            "&projectLink=$projectLink&projectPicture=$name_file".
            "&projectTag=$projectTag&projectStatus=$projectStatus&pesan=project-name-length-40");
            exit();
        } else {
            if (substr($projectLink, 0, 8) !== "https://") {
                header("Location: ../../after/submit-project/submit-project-4.php?".
                "projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType".
                "&projectLink=$projectLink&projectPicture=$name_file".
                "&projectTag=$projectTag&projectStatus=$projectStatus&pesan=https");
                exit();
            } else {
                if(strlen($projectTag) > 255){
                    header("Location: ../../after/submit-project/submit-project-4.php?".
                    "projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType".
                    "&projectLink=$projectLink&projectPicture=$name_file".
                    "&projectTag=$projectTag&projectStatus=$projectStatus&pesan=project-tag-length-255");
                    exit();
                } else {
                    $lengt = mysqli_query($conn, "SELECT COUNT(projectId) AS last_id FROM project");
                    $hasil = mysqli_fetch_assoc($lengt);
                    echo $new_id = $projectName.$hasil["last_id"] + 1;
                    
                    $stmt = $conn->prepare("CALL InsertProject(?,?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssssssss",$new_id, $projectName, $projectDescription, $projectType, $projectLink, $projectDate, $name_file, $projectTag, $projectStatus, $userId);

                    $sql2 = mysqli_query($conn, "SELECT MAX(id) AS last_id FROM logactivity");
                    $hasil = mysqli_fetch_assoc($sql2);
                    echo$last_id = $hasil["last_id"];
                    $trigger = mysqli_query($conn,"UPDATE logactivity SET userId = '$userId' WHERE id = '$last_id'");


                    if ($stmt->execute()) {
                        echo "Data berhasil ditambahkan";
                        header("Location: ../../after/index.php");
                        exit();
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                }
            }
        }
    }
}

$conn->close();
?>
