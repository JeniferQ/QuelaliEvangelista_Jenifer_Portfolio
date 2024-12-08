<!DOCTYPE html>
<html lang="en">

<?php
require_once('includes/connect.php');

mysqli_query($connect, "SET SESSION group_concat_max_len = 10000");

$query1 = 'SELECT * FROM projects WHERE id ='.$_GET['id'];
$query2 = "SELECT GROUP_CONCAT(case_subtitle SEPARATOR '|') AS section_subtitle, GROUP_CONCAT(case_description SEPARATOR '|') AS section_description, GROUP_CONCAT(case_file SEPARATOR '|') AS section_file, GROUP_CONCAT(alt_text SEPARATOR '|') AS section_caption FROM section, projects WHERE projects_ID = projects.id AND projects.id = ".$_GET['id']; 

$results = mysqli_query($connect, $query1);
$results2 = mysqli_query($connect, $query2);

$row = mysqli_fetch_assoc($results);
$row2 = mysqli_fetch_assoc($results2);

$subtitle_array = explode('|', $row2['section_subtitle']);
$description_array = explode('|', $row2['section_description']);
$file_array = explode('|', $row2['section_file']);
$caption_array = explode('|', $row2['section_caption']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=Assistant:wght@200..800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css"/>
    
    <script src="https://kit.fontawesome.com/983615787b.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid.css">

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
                    <li><a href="#">Works</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="full-width-grid-con case case-hero" style="background: url(images/<?php echo $row ['hero_image']; ?>) repeat">
            <div class="grid-con text-align">
                <h1 class="col-span-full m-col-start-2 m-col-end-7"><?php echo $row ['project_title']; ?></h1>

                <p class="col-span-full m-col-start-2 m-col-end-7"><?php echo $row ['project_subtitle']; ?></p>

                <a class="col-span-full m-col-start-2 m-col-end-4 button shadow">View Website</a>
            </div>

            <div class="gradient" style="background: linear-gradient(90deg, <?php echo $row ['color']; ?> 40%, #ffffff00 100%)"></div>
            <div class="wave-divider"></div>
        </div>

        <div class="full-width-grid-con case-study" id="overview">
            <div class="grid-con">
                <h2 class="col-span-full m-col-start-2 m-col-end-7">Project Overview</h2>

                <p class="col-span-full m-col-start-2 m-col-end-12"><?php echo $row ['overview']; ?></p>
            </div>
        </div>

        <div class="full-width-grid-con case-study">
            <div class="grid-con">
                <h2 class="col-span-full m-col-start-2 m-col-end-7">Process</h2>

                <?php 
                    for($i = 0; $i < count($description_array); $i++) {

                        echo '<h3 class="col-span-full m-col-start-2 m-col-end-7">'.$subtitle_array[$i].'</h3>

                        <p class="col-span-full m-col-start-2 m-col-end-12">'.$description_array[$i].'</p>

                        <div class="col-span-full m-col-start-3 m-col-end-11 media-con">
                        <img class="media border" src="images/'.$file_array[$i].'" alt="'.$caption_array[$i].'">
                        </div>';
                    }
                ?>

            </div>
        </div>

        <div class="full-width-grid-con case-study" id="video">
            <div class="grid-con">
                <h3 class="col-span-full m-col-start-2 m-col-end-7"><?php echo $row ['video_subtitle']; ?></h3>

                <p class="col-span-full m-col-start-2 m-col-end-12"><?php echo $row ['video_description']; ?></p>

                <div class="col-span-full m-col-start-3 m-col-end-11 video-con" id="case-video-con">
                    <video class="media border" id="case-video" src="videos/<?php echo $row ['video_file']?>" alt="<?php echo $row ['project_title']; ?>'s commercial video">
                </div>
            </div>
        </div>

        <div class="full-width-grid-con case-study" id="outcome">
            <div class="grid-con">
                <h2 class="col-span-full m-col-start-2 m-col-end-7">Outcome</h2>

                <p class="col-span-full m-col-start-2 m-col-end-12"><?php echo $row ['outcome']; ?></p>

                <div class="col-span-full m-col-start-2 m-col-end-12 media-con">
                    <img class="media border" src="images/<?php echo $row ['outcome_image']; ?>" alt="<?php echo $row ['project_title']; ?>'s final result.">
                </div>

                <a class="col-start-1 col-end-3 m-col-start-2 m-col-end-6 back" href="index.php">
                    <i class="fa-solid fa-arrow-right-long"></i>Return to Works
                </a>
            </div>

        </div>

        <div class="full-width-grid-con button"></div>

    </main>

    <footer class="full-width-grid-con" id="footer">
        <h2 class="hidden">Footer</h2>

        <div class="grid-con text-align">
            <div class="col-span-full m-col-start-4 m-col-end-10 icons">
                <a href="https://www.linkedin.com/in/jenifer-quelali-evangelista/">
                    <img src="images/linkedin-in-brands-solid.svg" alt="Linkedin logo">
                </a>

                <a href="https://github.com/JeniferQ">
                    <img src="images/github-brands-solid.svg" alt="Github logo">
                </a>
            </div>

            <p class="col-span-full m-col-start-5 m-col-end-9">@2024 Jenifer Quelali</p>
        </div>
    </footer>
    
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
        
        