<!DOCTYPE html>
<html lang="en">

<?php

require_once('includes/connect.php');

$connection->exec("SET SESSION group_concat_max_len = 10000");

$query1 = 'SELECT * FROM projects WHERE id = :portfolioid';
$query2 = "SELECT GROUP_CONCAT(paragraph_title SEPARATOR '|') AS title, GROUP_CONCAT(paragraph_description SEPARATOR '|') AS description, GROUP_CONCAT(paragraph_file SEPARATOR '|') AS file, GROUP_CONCAT(paragraph_file_description SEPARATOR '|') AS file_description FROM paragraphs, projects WHERE project_id = projects.id AND projects.id = :portfolioid"; 

$stmt1 = $connection->prepare($query1);
$stmt2 = $connection->prepare($query2);

$portfolioid = $_GET['id'];

$stmt1->bindParam(':portfolioid', $portfolioid, PDO::PARAM_INT);
$stmt2->bindParam(':portfolioid', $portfolioid, PDO::PARAM_INT);

$stmt1->execute();
$stmt2->execute();
    
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

if (!empty($row2['title']) && !empty($row2['description']) && !empty($row2['file']) && !empty($row2['file_description'])) {
    $title_array = explode('|', $row2['title']);
    $desc_array = explode('|', $row2['description']);
    $file_array = explode('|', $row2['file']);
    $file_desc_array = explode('|', $row2['file_description']);
} else {
    $title_array = [];
    $desc_array = [];
    $file_array = [];
    $file_desc_array = [];
}

$stmt1 = null;
$stmt2 = null;

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/x-icon" href="images/favicon.svg">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=Assistant:wght@200..800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css"/>
    
    <script src="https://kit.fontawesome.com/983615787b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid.css">
    
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script type="module" defer src="js/casestudy.js"></script>

    <title>Jenifer Quelali - Portfolio</title>
</head>

<body>

    <header class="full-width-grid-con" id="header">
        <h1 class="hidden">Welcome to my Portfolio!</h1>

        <div class="grid-con">
            <h2 class="hidden">Header</h2>

            <div class="col-start-1 col-end-4" id="logo">
                <a href="index.php"><img src="images/mylogo.svg" alt="A logo of a swan besides the typography of my name, Jenifer Quelali."></a>
            </div>
    
            <div class="col-start-4 col-end-5 m-col-start-12 m-col-end-13" id="burger">
                <img src="images/bars-menu.svg" alt="A burger menu icon">
            </div>

            <nav class="col-span-full m-col-start-6 m-col-end-13" id="menu">
                <h3 class="hidden">Header Navigation</h3>
                <ul>
                    <li><a href="index.php#projects">Works</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="full-width-grid-con case case-hero slide-down" style="background: url(images/<?php echo $row1 ['hero_bc']; ?>) repeat">
            <div class="grid-con text-align">
                <h1 class="col-span-full m-col-start-2 m-col-end-7"><?php echo $row1 ['title']; ?></h1>

                <p class="col-span-full m-col-start-2 m-col-end-7"><?php echo $row1 ['brief']; ?></p>

                <a class="col-span-full m-col-start-2 m-col-end-4 button shadow" href="<?php echo $row1 ['link']; ?>" target="_blank">View Result</a>
            </div>

            <div class="gradient" style="background: linear-gradient(90deg, <?php echo $row1 ['color']; ?> 40%, #ffffff00 100%)"></div>
            <div class="wave-divider"></div>
        </div>

        <div class="full-width-grid-con case-study slide-up" id="overview">
            <div class="grid-con">
                <h2 class="col-span-full m-col-start-2 m-col-end-7">Project Overview</h2>

                <p class="col-span-full m-col-start-2 m-col-end-12"><?php echo $row1 ['overview']; ?></p>
            </div>
        </div>

        <div class="full-width-grid-con case-study slide-up">
            <div class="grid-con">
                <h2 class="col-span-full m-col-start-2 m-col-end-7">Process</h2>

                <?php 
                if (!empty($title_array) && !empty($desc_array) && !empty($file_array) && !empty($file_desc_array)) {
                    for($i = 0; $i < count($desc_array); $i++) {

                        echo '<h3 class="col-span-full m-col-start-2 m-col-end-7">'.$title_array[$i].'</h3>

                        <p class="col-span-full m-col-start-2 m-col-end-12">'.$desc_array[$i].'</p>';

                        $file_extension = strtolower(pathinfo($file_array[$i], PATHINFO_EXTENSION));

                        if ($file_extension == 'jpg' || $file_extension == 'png') {
                            echo '<div class="col-span-full m-col-start-3 m-col-end-11 media-con">
                            <img class="media border" src="images/'.$file_array[$i].'" alt="'.$file_desc_array[$i].'">
                            </div>';
                        } else {
                            echo '<div class="col-span-full m-col-start-3 m-col-end-11 video-con" id="video">
                                <video class="media border" src="videos/'.$file_array[$i].'" alt="'.$file_desc_array[$i].'"></video>
                            </div>';
                        }
                    }
                } else {
                    echo '<p class="col-span-full m-col-start-2 m-col-end-12">The process is undocumented at the moment.</p>';
                }
                ?>

            </div>
        </div>

        <div class="full-width-grid-con case-study slide-up" id="outcome">
            <div class="grid-con">
                <h2 class="col-span-full m-col-start-2 m-col-end-7">Outcome</h2>

                <p class="col-span-full m-col-start-2 m-col-end-12"><?php echo $row1 ['outcome']; ?></p>

                <div class="col-span-full m-col-start-2 m-col-end-12 media-con">
                    <img class="media border" src="images/<?php echo $row1 ['outcome_image']; ?>" alt="<?php echo $row1 ['title']; ?>'s final result.">
                </div>

                <a class="col-start-1 col-end-3 m-col-start-2 m-col-end-6 back" href="index.php">
                    <i class="fa-solid fa-arrow-right-long"></i>Return to Works
                </a>
            </div>
        </div>

    </main>

    <footer class="full-width-grid-con" id="footer">
        <h2 class="hidden">Footer</h2>

        <div class="grid-con text-align">
            <div class="col-span-full m-col-start-4 m-col-end-10 icons">
                <a href="https://www.linkedin.com/in/jenifer-quelali-evangelista/" target="_blank">
                    <img src="images/linkedin-in-brands-solid.svg" alt="Linkedin logo">
                </a>

                <a href="https://github.com/JeniferQ" target="_blank">
                    <img src="images/github-brands-solid.svg" alt="Github logo">
                </a>
            </div>

            <p class="col-span-full m-col-start-5 m-col-end-9">@2024 Jenifer Quelali</p>
        </div>
    </footer>
</body>

</html>
        
        