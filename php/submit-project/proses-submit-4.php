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
                    $stmt = $conn->prepare("CALL InsertProject(?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssssssi", $projectName, $projectDescription, $projectType, $projectLink, $projectDate, $name_file, $projectTag, $projectStatus, $userId);

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
