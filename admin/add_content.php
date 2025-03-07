<?php
require_once('../includes/connect.php');

$random = rand(10000,99999);
$newname = 'media'.$random;

$filetype = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

$allowed_types = ['jpg', 'jpeg', 'png', 'mp4', 'mov', 'webm'];

if($filetype == 'jpeg') {
  $filetype = 'jpg';
}

if(!in_array($filetype, $allowed_types)) {
  exit('This file type is not allowed');
}

$newname .= '.'.$filetype;

if($filetype == 'mp4' || $filetype == 'mov' || $filetype == 'webm') {
  $target_file = '../videos/'.$newname;
} else {
  $target_file = '../images/'.$newname;
}

if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
    $query = "INSERT INTO paragraphs (paragraph_title, paragraph_description, paragraph_file, paragraph_file_description, project_id) VALUES (?,?,?,?,?)";

    $stmt = $connection->prepare($query);

    $stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(2, $_POST['desc'], PDO::PARAM_STR);
    $stmt->bindParam(3, $newname, PDO::PARAM_STR);
    $stmt->bindParam(4, $_POST['file_desc'], PDO::PARAM_STR);
    $stmt->bindParam(5, $_POST['project_id'], PDO::PARAM_INT);

    $stmt->execute();
    $stmt = null;

    header('Location: project_list.php');
}

if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
  exit('Error during file upload. Code: ' . $_FILES['file']['error']);
}
