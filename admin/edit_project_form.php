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
    <title>Project Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>

<form class="cms-form" action="edit_project.php" method="POST" enctype="multipart/form-data">
    <input name="pk" type="hidden" value="<?php echo $row['id']; ?>">
    
    <h3>Edit this project</h3>

    <div class="form-cell">
      <label for="title">Title: </label>
      <input name="title" type="text" value="<?php echo $row['title']; ?>" required>
    </div>

    <div class="form-cell">
      <label for="desc">Description: </label>
      <textarea name="desc" required><?php echo $row['description']; ?></textarea>
    </div>

    <div class="form-cell">
      <label for="thumb">Thumbnail: </label>
      <input name="thumb" type="file" value="<?php echo $row['thumbnail']; ?>" required>
    </div>

    <div class="form-cell">
      <label for="brief">Brief description: </label>
      <textarea name="brief" required><?php echo $row['brief']; ?></textarea>
    </div>

    <div class="form-cell">
      <label for="overview">Overview: </label>
      <textarea name="overview" required><?php echo $row['overview']; ?></textarea>
    </div>

    <div class="form-cell">
      <label for="hero_bc">Background image: </label>
      <input name="hero_bc" type="file" value="<?php echo $row['hero_bc']; ?>" required>
    </div>

    <div class="form-cell">
      <label for="outcome">Outcome: </label>
      <textarea name="outcome" required><?php echo $row['outcome']; ?></textarea>
    </div>

    <div class="form-cell">
      <label for="outcome_img">Outcome image: </label>
      <input name="outcome_img" type="file" value="<?php echo $row['outcome_image']; ?>" required>
    </div>

    <div class="form-cell">
      <label for="color">Button color: </label>
      <input name="color" type="text" value="<?php echo $row['color']; ?>" required>
    </div>

    <div class="form-cell">
      <label for="link">Project link: </label>
      <input name="link" type="text" value="<?php echo $row['link']; ?>" required>
    </div>

    <input class="form-btn" name="submit" type="submit" value="Add">
</form>

<?php
$stmt = null;
?>
</body>
</html>
