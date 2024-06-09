<?php
include '../connection.php';
echo $_POST["projectPicture"];
$foto_profil = $_POST["projectPicture"];


if($foto_profil == "" ){
    header("location:../../after/edit profil/edit_profil_general.php?pesan=already-removed");
}else {
    $sql = mysqli_query($conn,"UPDATE user SET profilePicture = '' ");
    header("location:../../after/edit profil/edit_profil_general.php?pesan=succes-remove-pp");
}

?>