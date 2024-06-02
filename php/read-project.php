<?php
include '../php/connection.php';
$userId = $_SESSION["userId"];

$sqlp_1 = mysqli_query($conn," SELECT p.userId AS id_user,p.projectId AS id_project,p.projectPicture AS foto_project,p.projectName AS nama_project, CONCAT(u.firstName,' ',u.lastName) AS nama_lengkap_2 FROM project p JOIN user u ON p.userId = u.userId WHERE p.userId = '$userId'");

$sqlp_2 = mysqli_query($conn,"SELECT u.userId AS id_user,u.profilePicture AS foto_profil,p.userId AS id_user, p.projectId AS id_project, p.projectPicture AS foto_project,p.projectName AS nama_project, CONCAT(u.firstName,' ',u.lastName) AS nama_lengkap_2 FROM project p JOIN user u ON p.userId = u.userId");

?>