<!DOCTYPE html>
<html lang="en">

<?php

require_once('includes/connect.php');

$stmt = $connection->prepare("SELECT projects.id AS project, title, description, thumbnail, color FROM projects");
$stmt->execute();

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
    <script type="module" defer src="js/index.js"></script>

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
        <div class="full-width-grid-con slide-down" id="home-hero">
            <div class="grid-con text-align">
                <h1 class="col-span-full m-col-start-2 m-col-end-7">Hi there, I’m Jenifer!</h1>

                <p class="col-span-full m-col-start-2 m-col-end-7">I’m a web designer based in London, Ontario that focuses on creating appealing websites through animation and motion graphics.</p>

                <img class="col-span-full m-col-start-7 m-col-end-13" src="images/home-hero-tablet.png"
                srcset="images/home-hero-mobile.png 400w, images/home-hero-tablet.png 600w"
                sizes="(max-width: 768px) 400px, 600px" alt="Floating phones featuring the Dr. Nut products page">
            </div>

            <div class="wave-bc"></div>

            <div class="col-span-full wave-con">
                <div class="wave wave1"></div>
                <div class="wave wave2"></div>
                <div class="wave wave3"></div>
            </div>
        </div>

        <div class="full-width-grid-con home slide-up" id="video">
            <div class="grid-con text-align">
                <h2 class="col-span-full m-col-start-2 m-col-end-7"><span>Demo</span> Reel</h2>

                <div class="col-span-full m-col-start-2 m-col-end-12 border" id="video-con">
                    <video src="videos/demoreel.mp4" poster="images/thumbnail.jpg"></video>
                </div>
            </div>
        </div>

        <div class="full-width-grid-con" id="projects">

            <div class="grid-con">
                <h2 class="col-span-full m-col-start-2 m-col-end-12 text-align slide-up"><span>Featured</span> Projects</h2>

                <div class="col-span-full m-col-start-2 m-col-end-12 project-flex">

                    <?php 
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="project-card slide-up">
                                <img class="border" src="images/'.$row['thumbnail'].'" alt="'.$row['title'].' icon">

                                <h3>'.$row['title'].'</h3>
                                <p>'.$row['description'].'</p>
                                
                                <a class="point" style="color:'.$row['color'].'" href="case-study.php?id='.$row['project'].'">Read Case Study<i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>';
                        }

                        $stmt = null;
                    ?>
                </div>

                <div class="line fade"></div>
            </div>
        </div>

        <div class="full-width-grid-con slide-up" id="about">
            <div class="grid-con text-align">

                <div class="col-span-full m-col-start-2 m-col-end-7 photo"><img class="border" src="images/home-about.jpg"  alt="A photo of me"></div>

                <h2 class="col-span-full m-col-start-7 m-col-end-12">About me</h2>

                <p class="col-span-full m-col-start-2 m-col-end-7">I’m a web designer based in London, Ontario currently studying Interactive Media at Fanshawe College. 
                    As a professional, my objective is to create clean and user friendly websites that look great and 
                    make people happy with the results.</p>

                <p class="col-span-full m-col-start-7 m-col-end-12">Born and raised in Brazil, I’m an avid lover of hot weather and cold desserts. I enjoy baking and drawing 
                    when I’m free, and I wish to travel around the world when I have the resources to. I love music, and hope
                     that one day I’ll have time to learn music making as well!</p>

                <a class="col-span-full m-col-start-5 m-col-end-9 download button shadow" href="download/resume.pdf" download="resume.pdf">Download CV</a>
            </div>

            <div class="wave-bc"></div>

            <div class="col-span-full wave-con">
                <div class="wave wave1"></div>
                <div class="wave wave2"></div>
                <div class="wave wave3"></div>
            </div>
        </div>

        <div class="full-width-grid-con" id="contact">

            <div class="purple-bc slide-down-delay"></div>

            <div class="contact-border slide-up">
                <div class="grid-con background text-align">
                    <h2 class="col-span-full m-col-start-2 m-col-end-7">Contact</h2>
    
                    <p class="col-span-full m-col-start-2 m-col-end-7">Interested? Get in touch with me and I’ll return in 3 business days.</p>
    
                    <div class="col-span-full m-col-start-2 m-col-end-7 email"><img src="images/mail.svg"  alt="A mail symbol inside a circle"><a>j_quelali@gmail.com</a></div>
                    
                    <form class="col-span-full m-col-start-7 m-col-end-12 form" id="contact-form" action="sendmail.php">
                        <input class="type" id="name" type="text" name="name" placeholder="Name">
                        <input class="type" id="email" type="text" name="email" placeholder="Email">
                        <input class="type message" id="message" type="text" name="message" placeholder="Message">
                        
                        <input class="submit button shadow" type="submit" value="Send">

                        <section id="feedback"><p>*Please fill out all required sections.</p></section>
                    </form>
                </div>
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