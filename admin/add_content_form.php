<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if(!isset($_SESSION['username'])) {
  header('Location: login_form.php');
}

require_once('../includes/connect.php');
$query = 'SELECT * FROM projects WHERE projects.id = :projectId';
$stmt = $connection->prepare($query);
$projectId = $_GET['id'];
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Content to the page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>

<form class="cms-form" action="add_content.php" method="POST" enctype="multipart/form-data">
    <h3>Add content to this project</h3>

    <input name="project_id" type="hidden" value="<?php echo $row['id']; ?>">

    <div class="form-cell">
      <label for="title">Title: </label>
      <input name="title" type="text" required>
    </div>

    <div class="form-cell">
      <label for="desc">Description: </label>
      <textarea name="desc" required></textarea>
    </div>

    <div class="form-cell">
      <label for="file">File: </label>
      <input name="file" type="file" required>
    </div>

    <div class="form-cell">
      <label for="file_desc">File description: </label>
      <input name="file_desc" type="text" required>
    </div>

    <input class="form-btn" name="submit" type="submit" value="Add">
</form>
 
<?php
$stmt = null;
?>
</body>
</html>
