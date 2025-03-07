<!DOCTYPE html>
<html lang="en">

<?php

session_start();
if(!isset($_SESSION['username'])) {
  header('Location: login_form.php');
}

require_once('../includes/connect.php');
$stmt = $connection->prepare('SELECT id, title FROM projects ORDER BY id ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Main Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
  </head>
<body>

<?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo '<div class="project-list">
  <p>'.$row['title'].'</p>
  <a class="cms-btn" href="add_content_form.php?id='.$row['id'].'">Add content</a>'.
  '<a class="cms-btn" href="edit_project_form.php?id='.$row['id'].'">Edit</a>'.
  '<a class="cms-btn" href="delete_project.php?id='.$row['id'].'">Delete</a>
  </div>';
}

$stmt = null;

?>

<form class="cms-form" action="add_project.php" method="post" enctype="multipart/form-data">
    <h3>Add a new project</h3>

    <div class="form-cell">
      <label for="title">Title: </label>
      <input name="title" type="text" required>
    </div>

    <div class="form-cell">
      <label for="desc">Description: </label>
      <textarea name="desc" required></textarea>
    </div>

    <div class="form-cell">
      <label for="thumb">Thumbnail: </label>
      <input name="thumb" type="file" required>
    </div>

    <div class="form-cell">
      <label for="brief">Brief description: </label>
      <textarea name="brief" required></textarea>
    </div>

    <div class="form-cell">
      <label for="overview">Overview: </label>
      <textarea name="overview" required></textarea>
    </div>

    <div class="form-cell">
      <label for="hero_bc">Background image: </label>
      <input name="hero_bc" type="file" required>
    </div>

    <div class="form-cell">
      <label for="outcome">Outcome: </label>
      <textarea name="outcome" required></textarea>
    </div>

    <div class="form-cell">
      <label for="outcome_img">Outcome image: </label>
      <input name="outcome_img" type="file" required>
    </div>

    <div class="form-cell">
      <label for="color">Button color: </label>
      <input name="color" type="text" required>
    </div>

    <div class="form-cell final">
      <label for="link">Project link: </label>
      <input name="link" type="text" required>
    </div>

    <input class="form-btn" name="submit" type="submit" value="Add">
</form>

<div class="vertical-space">
  <a class="cms-btn" href="logout.php">Log out</a>
</div>

</body>
</html>
