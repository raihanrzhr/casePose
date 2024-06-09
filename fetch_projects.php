<?php
include 'php/connection.php';

if (isset($_GET['tag'])) {
    $tag = mysqli_real_escape_string($conn, $_GET['tag']);
    $sql = "SELECT u.userId AS id_user, u.profilePicture AS foto_profil, p.userId AS id_user, p.projectId AS id_project, p.projectPicture AS foto_project, p.projectName AS nama_project, CONCAT(u.firstName, ' ', u.lastName) AS nama_lengkap_2
            FROM project p
            JOIN user u ON p.userId = u.userId
            WHERE p.projectType = '$tag'
            LIMIT 12";
} else {
    $sql = "SELECT u.userId AS id_user, u.profilePicture AS foto_profil, p.userId AS id_user, p.projectId AS id_project, p.projectPicture AS foto_project, p.projectName AS nama_project, CONCAT(u.firstName, ' ', u.lastName) AS nama_lengkap_2
            FROM project p
            JOIN user u ON p.userId = u.userId
            LIMIT 12";
}

$result = mysqli_query($conn, $sql);
$projects = array();
while ($row = mysqli_fetch_assoc($result)) {
    $projects[] = $row;
}
echo json_encode($projects);
?>
