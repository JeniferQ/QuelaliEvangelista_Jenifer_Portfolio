-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2025 at 09:07 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: myportfolio
--

-- --------------------------------------------------------

--
-- Table structure for table contact
--

CREATE TABLE contact (
  id int UNSIGNED NOT NULL,
  name varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  email varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  message varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table contact
--

INSERT INTO contact (id, name, email, message) VALUES
(1, 'Jarrod Osterback', 'j_osterback@gmail.com', 'Hi, how are you doing?'),
(2, 'Marco de Luca', 'm_deluca@gmail.com', 'Hey Jenifer, how is the break going?'),
(35, 'a', 'a@gmail.coma', 'a');

-- --------------------------------------------------------

--
-- Table structure for table paragraphs
--

CREATE TABLE paragraphs (
  id int UNSIGNED NOT NULL,
  paragraph_title varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  paragraph_description varchar(800) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  paragraph_file varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  paragraph_file_description varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  project_id int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table paragraphs
--

INSERT INTO paragraphs (id, paragraph_title, paragraph_description, paragraph_file, paragraph_file_description, project_id) VALUES
(10, 'Logo', 'Redesigning the logo was the first step to establish Dr. Nut’s new design identity. Inspired by brands like Coca-Cola and Dr. Pepper, the logo was simplified and a sans-serif typeface was implemented. Certain elements were removed, but the nut and text structure remained to preserve the logo’s essence. The red colour, previously only present in packaging, became part of the brand’s primary colours along with white. The final result was a logo that was bold and modern but still felt familiar to Dr. Nut’s audience.', 'media95918.jpg', 'Dr Nut\'s old and new logo', 23),
(11, 'Design Guidelines', 'After the logo was finalized, the next step was to create the full design document of the brand on Adobe XD. The document required information about: the logo, spacing, sizing, typography, photography, iconography, grids. website sections and product cards.\r\n\r\nThe choice of font was based on the typeface of the logo, and chosen colours were based on the logo and nuts of different kinds. The photography style choice was tied to the the brand’s mission and when it came to website sections, the goal was to create clean and easily navigable pages.', 'media24891.jpg', 'Dr Nut design guidelines', 23),
(12, 'Home', 'After the design guidelines were completed, the website was developed using only HTML, CSS, and JavaScript. The homepage was structured for easy navigation, redirecting users to other pages through illustrative banners. Promotional content was featured in the hero banner, guiding users to the products section. A contact information section was also included at the bottom of the page for easy access.', 'media82890.jpg', 'Dr Nut home page', 23),
(13, 'Mission', 'The mission page took a more informative role, giving users a deep understanding of the brand’s values and impact throughout the years. Written data and infographics were combined to effectively showcase the accomplishments of Dr. Nut, and direct links to charity pages affiliated with the brand were provided to encourage users to donate and explore other websites connected to Dr. Nut’s objective.', 'media76704.jpg', 'Dr Nut mission page', 23),
(14, 'Products', 'The products page was mainly an interactive section that displayed a variety of information about the beverages sold by the company. Each product contained ratings, reviews, nutritional facts and a direct link to their purchase page. As the user slides through the different products available, their corresponding information displayed accordingly, allowing users to quickly find the items they are looking for.', 'media42955.jpg', 'Dr Nut almond product page', 23),
(15, 'Promotional Video', 'The last step was to create a video that promoted the company’s products. With the use of Cinema 4D, beverage cans were modelled and animated to slide or float across the screen. The footage was then edited in Premiere Pro, where product qualities were highlighted to encourage viewers to make a purchase. The chosen music reflected the brand’s friendly tone, and the simple visual style ensured that the focus stayed on the products and the information presented.', 'media58172.mp4', 'Dr Nut\'s commercial video', 23),
(16, 'Logo', 'The first step of this project was to create a logo that embodied the brand’s concept of expression and sensuality. After considering several names, Kavorka was chosen for it meaning of attractiveness. Once the brand’s name was decided, my role was to aid and approve my project partner’s logo design. Multiple beauty brands were sources of inspiration for his design, such as Dove and Sephora. The Philosopher font was chosen for its balance of readability and elegance, and the letter “V” was replaced by a pink heart-shaped figure resembling lips. The final result was a sophisticated and feminine logo with an unique design that aligned with Kavorka’s values.', 'media15728.jpg', 'Kavorka white and normal logo', 24),
(17, 'Design Guidelines', 'After the creation of a logo, the next step was to take the brand’s already established concept and create a design guidelines document in collaboration with my project partner. The document reinforced the brand’s values and contained rules for the brand’s logo, colours, typography and photography. Both the colours and font choices were tied to the brand’s core values, while the photography style was meant to be unique and inclusive, ensuring that Kavorka would appeal to a wide and diverse audience.', 'media81884.jpg', 'Kavorka design guidelines', 24),
(18, 'Products', 'Once the design guidelines were completed, three products were created for the brand: a moisturizer, a make-up brush and a lipstick. Those products were chosen because together they offer variety to the brand. The packaging for those products was designed with simplicity and sophistication in mind as they were meant to be recognizable, but not overly flashy. Kavorka’s products were intended to be accessible, and so the packaging design reflected that.', 'media80109.jpg', 'Kavorka make up brush, body cream and lipstick', 24),
(19, 'Advertising Campaign', 'With the products and brand identity in hand, the next step was to design six banners and a magazine spread to promote the brand’s products and website. Both the magazine spread and banners highlighted the positive effects of using Kavorka and emphasized key features of the products, such as vegan ingredients or allergy-free formulas. The majority of them also displayed pictures of young and happy women to convey a positive feeling.\r\nan image ', 'media15632.jpg', 'Kavorka body cream banner', 24),
(20, 'Commercial', 'After the banners were finalized, a short commercial had to be created to promote both the brand and its products. The goal of the video was to showcase Kavorka’s proximity with women and how the brand impacted their lives. During the first part, the video build’s up the viewer’s curiosity, inducing them to question what are the similarities Kavorka has with women. The second half is the answer, highlighting the core features of the brand. The video ends with a display of the products and an animated logo sequence.', 'media92658.mp4', 'Kavorka commercial video', 24),
(21, 'Model', 'Before developing a website, the earbuds model had to be created and animated to provide assets for the project. After researching various earbuds designs, I settled with a circular earbuds shape with long handles. The case design was simple, a clean circular shaped box with soft pads to hold each earbud. Once the concept was defined, the earbuds were modelled in Cinema4D over the course of three days. Different case colours, a transparent earbud view and an animation of the case opening were rendered using Redshift.', 'media42271.jpg', 'Comet earbuds model', 25),
(22, 'Website - Model Viewer', 'Once the earbud assets were finalized, the website was developed using HTML, CSS, JavaScript and the Model Viewer API. The Model Viewer API added a dynamic section to the page which allowed users to interact with the earbuds model by rotating, zooming and hovering over hotspots to view information. On mobile devices, where this API was not fully supported or did not perform properly, the hotspots and model were presented as static elements. A static image was also displayed when the model viewer failed to load.', 'media18817.jpg', 'Comet model viewer with hotspots', 25),
(23, 'Animation', 'The animation, initially created in Cinema4D, was edited in After Effects and exported as sequence of images. The scroll-driven animation implemented utilized JavaScript to dynamically load and add those images to the page when the user scrolled, creating an animated sequence driven by scrolling. To optimize the website’s performance, all images were converted to WebP format to reduce their size.', 'media25508.jpg', 'Comet animation snippet', 25),
(24, 'Additional features', 'Multiple sliders were added to the page to enable more interactivity for users. Features such as colours and reviews were added as cards inside sliders, while the x-ray view of the earbuds model had it’s own dedicated slider. On mobile devices, where the x-ray view wasn’t the most suitable option, a static image was used instead. The contact form also featured animated rockets, which added some fun and engagement for users.', 'media66201.jpg', 'Comet x-ray vision', 25);

-- --------------------------------------------------------

--
-- Table structure for table projects
--

CREATE TABLE projects (
  id int UNSIGNED NOT NULL,
  title varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  description varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  thumbnail varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  brief varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  hero_bc varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  overview varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  outcome varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  outcome_image varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  color varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  link varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table projects
--

INSERT INTO projects (id, title, description, thumbnail, brief, hero_bc, overview, outcome, outcome_image, color, link) VALUES
(23, 'Dr. Nut', 'A complete rebrand and website build for a soft drink company from the 30’s.', 'image69201.jpg', 'A complete rebrand of a beverage company.', 'image44798.jpg', 'The objective of this project consisted of changing the brand identity of Dr. Nut, a defunct American beverage company from the 30’s, over the course of a month. The rebrand required a completely new logo and design guidelines document, along with a fully responsive website and a 20 second commercial. The new website had information about the brand and products, featuring an interactive section that helped users find the nutritional information of each beverage. A variety of promotional content was created to populate the website, along with the promotional video.', 'The result of this project was a well-received website and design guidelines document that met the client’s expectations. The brand was given a modern look but retained the essence of its previous design. The website was fully responsive and free of errors or bugs across all browsers. Interactive elements like the product slider were successfully implemented as well.', 'image81531.jpg', '#c0070b', 'https://github.com/JeniferQ/QuelaliEvangelista_Jenifer_FIP_W24'),
(24, 'Kavorka', 'A website made for a cosmetics brand focused on selling vegan beauty products.', 'image21339.jpg', 'A beauty brand creation and advertising campaign.', 'image41010.jpg', 'The objective of this project, done in collaboration with Rodrigo Nascimento, was to design a beauty brand and promote it across different mediums and platforms. The branding process required creating a logo, design guidelines and three different products. The advertising campaign featured banners in different formats for Facebook and Instagram to showcase the products, along with a 38-second commercial. The goal of the campaign was to reach a wide audience, promote the products, and highlight the brand’s mission of empowering women.', 'The result of this project was a beauty brand that successfully appealed to a wide audience of women and contained a good variety of products. The campaign was done in accordance with the brand’s guidelines and the video was complimented by many. All projects were completed ahead of the planned deadlines, which gave my team extra time to make any necessary adjustments.', 'image92258.jpg', '#d5124f', 'https://www.figma.com/design/HJu5StB0bZFyrn6GQIFpfM/Kavorka-Materials?node-id=18'),
(25, 'Comet', 'A premium earbud website featuring a real-time 3D model viewer for interactive product exploration.', 'image15113.jpg', 'An interactive website for an earbuds company.', 'image59019.jpg', 'This project’s objective was to model and animate a set of earbuds and develop a one-page dynamic website to promote them. The website required the integration of an interactive model section using Google’s Model Viewer API, which allowed users to view the earbuds model in real-time. A scroll-driven animated sequence was also implemented, and sliders were created to allow users to explore different product colours, an x-ray view and customer reviews as well. A contact form was also included on the page.', 'The result of this project was a website with multiple interactive elements that successfully implemented all elements required with a unique design style. The page performed well across multiple browsers, and the attention given to mobile performance was complimented by the client.', 'image15781.jpg', '#0a1b8f', 'https://github.com/JeniferQ/QuelaliEvangelista_Jenifer_Earbuds');

-- --------------------------------------------------------

--
-- Table structure for table users
--

CREATE TABLE users (
  id int UNSIGNED NOT NULL,
  username varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  password varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table users
--

INSERT INTO users (id, username, password) VALUES
(1, 'jeniq', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table contact
--
ALTER TABLE contact
  ADD PRIMARY KEY (id);

--
-- Indexes for table paragraphs
--
ALTER TABLE paragraphs
  ADD PRIMARY KEY (id);

--
-- Indexes for table projects
--
ALTER TABLE projects
  ADD PRIMARY KEY (id);

--
-- Indexes for table users
--
ALTER TABLE users
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table contact
--
ALTER TABLE contact
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table paragraphs
--
ALTER TABLE paragraphs
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table projects
--
ALTER TABLE projects
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table users
--
ALTER TABLE users
  MODIFY id int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
