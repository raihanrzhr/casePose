<?php

$projectName = $_POST["projectName"];
$projectDescription = $_POST["projectDescription"];
$projectType = $_POST["projectType"];

header("Location: ../../after/submit-project/submit-project-2.php?".
"projectName=$projectName&projectDescription=$projectDescription&projectType=$projectType");

?>