<?php 
include '../connection.php';    

$id_project = $_POST["projectId"];

$projectTag = $_POST["projectTag"];
$projectStatus = $_POST["projectStatus"];

if(empty($projectTag) || empty($projectStatus)){

    header("Location: ../../after/edit-project/edit-project-3.php?".
    "pesan=kosong&idproject=$id_project");

}else {
    if(strlen($projectTag) > 255){
        header("Location: ../../after/edit-project/edit-project-3.php?".
        "pesan=project-tag-length-255&idproject=$id_project");
    }else{

        $sql = mysqli_query($conn , "UPDATE project SET projectTag = '$projectTag', projectStatus = '$projectStatus' WHERE projectId = '$id_project'");

        header("Location: ../../after/edit-project/edit-project-3.php?".
        "pesan=sukses&idproject=$id_project");
        exit();
    }
}

?>