<?php
require_once('../includes/connect.php');

$files = ['thumb', 'hero_bc', 'outcome_img'];
$uploads = [];

foreach ($files as $file) {
    if (!empty($_FILES[$file]['name'])) {
        $random = rand(10000, 99999);
        $newname = 'image'.$random;

        $filetype = strtolower(pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION));
        
        $allowed_types = ['jpg', 'jpeg', 'png', 'mp4', 'mov', 'webm'];

        if($filetype == 'jpeg') {
            $filetype = 'jpg';
        }

        if(!in_array($filetype, $allowed_types)) {
            exit('This file type is not allowed');
        }

        $newname .= '.'.$filetype;
        $target_file = '../images/'.$newname;

        if (move_uploaded_file($_FILES[$file]['tmp_name'], $target_file)) {
            $uploads[$file] = $newname;
        }
    }
}

$query = "UPDATE projects SET title = ?, description = ?, thumbnail= ?, brief = ?, hero_bc = ?, overview = ?, outcome = ?, outcome_image = ?, color = ?, link = ? WHERE id = ?"; 

$stmt = $connection->prepare($query);

$stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['desc'], PDO::PARAM_STR);
$stmt->bindParam(3, $uploads['thumb'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['brief'], PDO::PARAM_STR);
$stmt->bindParam(5, $uploads['hero_bc'], PDO::PARAM_STR);
$stmt->bindParam(6, $_POST['overview'], PDO::PARAM_STR);
$stmt->bindParam(7, $_POST['outcome'], PDO::PARAM_STR);
$stmt->bindParam(8, $uploads['outcome_img'], PDO::PARAM_STR);
$stmt->bindParam(9, $_POST['color'], PDO::PARAM_STR);
$stmt->bindParam(10, $_POST['link'], PDO::PARAM_STR);
$stmt->bindParam(11, $_POST['pk'], PDO::PARAM_INT);

$stmt->execute();
$stmt = null;
header('Location: project_list.php');
?>
