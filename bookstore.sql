-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 05:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `admin_name`, `mypassword`, `created_at`) VALUES
(1, 'admin.first@outlook.com', 'admin.first@outlook.com', '$2y$10$db4Khdc0x3lIwJAH3QzsXea2Ywe3PWS6sy0kCNoIc7Zjp/HwMtSOS', '2024-04-26 15:52:36'),
(2, 'admin.second@outlook.com', 'admin.second@outlook.com', '$2y$10$GM2WYKsDr3K9mwBMUWE4ieFFhS0lAvBggVIIVLMSD2gjq8mwhABtG', '2024-04-30 13:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `prod_id` int(3) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_image` varchar(200) NOT NULL,
  `prod_price` int(3) NOT NULL,
  `prod_amount` int(3) NOT NULL,
  `prod_file` varchar(200) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `prod_id`, `prod_name`, `prod_image`, `prod_price`, `prod_amount`, `prod_file`, `user_id`, `created_at`) VALUES
(73, 1, 'Node basics', 'node.png', 20, 1, 'node.pdf', 1, '2024-05-03 18:02:08'),
(76, 1, 'Node basics', 'node.png', 20, 4, 'node.pdf', 2, '2024-05-03 18:22:00'),
(77, 2, 'Django Basics', 'django.png', 10, 1, 'django.pdf', 2, '2024-05-03 18:22:34'),
(78, 7, 'Photoshop Basics', 'photoshop.png', 50, 4, 'photoshop.pdf', 2, '2024-05-03 18:28:29'),
(79, 3, 'HTML5 Basics', 'html5.jpg', 30, 1, 'html5.pdf', 2, '2024-05-03 19:09:15'),
(80, 8, 'Adobe xd', 'adobexd.jpeg', 75, 1, 'adobexd.pdf', 2, '2024-05-03 19:09:24'),
(81, 10, 'Learn English!', 'english.jpg', 10, 1, 'english.pdf', 2, '2024-05-03 19:09:27'),
(87, 2, 'Django Basics', 'django.png', 10, 1, 'django.pdf', 4, '2024-05-06 15:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`) VALUES
(1, 'Programming', 'Discover the world of programming through our collection of insightful books, designed to demystify the complexities of coding and ignite your passion for technology. Whether you\'re a novice eager to embark on your coding journey or a seasoned developer seeking to deepen your expertise, our selection offers something for everyone.\r\n\r\nExplore foundational texts that introduce the fundamental concepts of programming languages, algorithms, and data structures, providing you with a solid understanding of the building blocks of software development. Dive into specific programming languages such as Python, Java, JavaScript, and C++, with comprehensive guides tailored to beginners and advanced practitioners alike.\r\n\r\nDelve into the realm of web development with books focusing on HTML, CSS, and JavaScript, guiding you through the intricacies of creating dynamic and responsive websites. Uncover the secrets of backend development with resources dedicated to frameworks like Django, Flask, Node.js, and Ruby on Rails, empowering you to build robust server-side applications.\r\n\r\nEmbark on the journey of app development for mobile platforms with insightful guides covering iOS, Android, and cross-platform frameworks like React Native and Flutter. Learn how to leverage databases effectively, whether it\'s SQL for relational databases or NoSQL solutions for flexible data management.\r\n\r\nStay ahead of the curve with books exploring emerging technologies such as machine learning, artificial intelligence, blockchain, and cloud computing. Gain practical insights into software engineering best practices, including version control, testing methodologies, and agile development principles.\r\n\r\nFuel your curiosity and expand your skill set with our diverse selection of programming books, crafted to inspire innovation and empower you to bring your ideas to life in the digital world.', 'prog_ilustration.png', '2024-04-26 13:02:45'),
(2, 'Design', 'Embark on a visual and creative journey with our curated collection of design books, meticulously crafted to inspire, educate, and elevate your understanding of design principles across various disciplines. Whether you\'re a seasoned professional or an aspiring artist, our selection offers a wealth of knowledge to explore and apply in your creative endeavors.\r\n\r\nDiscover the timeless principles of graphic design, typography, and layout through beautifully illustrated books that delve into the art of visual communication. Uncover the secrets of color theory, composition, and branding, and learn how to create impactful designs that captivate audiences and convey powerful messages.\r\n\r\nImmerse yourself in the world of user experience (UX) and user interface (UI) design, with books that illuminate the process of crafting intuitive and user-friendly digital experiences. Explore wireframing, prototyping, and usability testing techniques, and gain insights into designing products that resonate with users on a deep emotional level.\r\n\r\nDelve into the realm of product design, industrial design, and architecture, with books that showcase the intersection of form, function, and innovation. Learn from the masters of design as they share their creative processes, design thinking methodologies, and strategies for problem-solving in the real world.\r\n\r\nExpand your horizons with books exploring emerging design trends and technologies, such as augmented reality, virtual reality, and interaction design. Dive into the world of motion graphics, animation, and game design, and discover how to bring your designs to life through dynamic and immersive experiences.\r\n\r\nStay abreast of the latest developments in sustainable design, ethical design, and inclusive design, and explore how design can be a force for positive change in society. Gain practical insights into collaboration, project management, and client communication, and learn how to navigate the complexities of the design industry with confidence and professionalism.\r\n\r\nWhether you\'re passionate about pixels, polygons, or pencils, our collection of design books offers something for every creative mind, empowering you to unleash your imagination and shape the world around you with beauty, elegance, and purpose.', 'design.jpg', '2024-04-26 13:02:45'),
(26, 'Languages', 'cambiando cosas', 'languages.jpg', '2024-04-30 19:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `username`, `first_name`, `last_name`, `token`, `price`, `user_id`, `created_at`) VALUES
(11, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC2AkP736g8Fma5UiYYQySb', '240', 1, '2024-05-02 16:07:54'),
(12, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC2DSP736g8Fma5OOjwoo8C', '240', 1, '2024-05-02 16:10:41'),
(13, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC2GgP736g8Fma5AAQFPysK', '50', 1, '2024-05-02 16:14:02'),
(14, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC2JHP736g8Fma5DO1BB4sc', '50', 1, '2024-05-02 16:16:43'),
(15, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC2OSP736g8Fma5s44yk3mj', '50', 1, '2024-05-02 16:22:04'),
(16, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC3NcP736g8Fma52GiBBMsy', '20', 1, '2024-05-02 17:25:16'),
(17, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC4APP736g8Fma5OPlm9wO8', '10', 1, '2024-05-02 18:15:40'),
(18, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC4bwP736g8Fma5f7oZiv8k', '60', 1, '2024-05-02 18:44:07'),
(19, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC4dKP736g8Fma5zw3BTWNW', '30', 1, '2024-05-02 18:45:34'),
(20, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC4eCP736g8Fma5O5bcLjx4', '30', 1, '2024-05-02 18:46:27'),
(21, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC4eoP736g8Fma5FuRAYBbT', '10', 1, '2024-05-02 18:47:05'),
(22, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC4gDP736g8Fma5gVnYWNhl', '20', 1, '2024-05-02 18:48:33'),
(23, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC4icP736g8Fma5hHx5TGgF', '20', 1, '2024-05-02 18:51:01'),
(24, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PC4mIP736g8Fma5KrXTNysr', '20', 1, '2024-05-02 18:54:50'),
(25, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PCPyIP736g8Fma5RWoccnaK', '500', 1, '2024-05-03 17:32:38'),
(26, 'usuario@gmail.com', 'usuario', 'Franco Manuel', 'Ceballos', 'tok_1PCQPPP736g8Fma5hz8mbFqy', '30', 1, '2024-05-03 18:00:40'),
(27, 'usuario2@gmail.com', 'usuario2', 'Franco Manuel', 'Ceballos', 'tok_1PCQhIP736g8Fma5o6u53zt0', '50', 2, '2024-05-03 18:19:08'),
(28, 'francoceba@gmail.com', 'fran', 'Franco Manuel', 'Ceballos', 'tok_1PDTUdP736g8Fma5UUNH68LZ', '185', 4, '2024-05-06 15:30:24'),
(29, 'francoceba@gmail.com', 'fran', 'Franco Manuel', 'Ceballos', 'tok_1PDTaHP736g8Fma5U1MoKdvK', '185', 4, '2024-05-06 15:36:14'),
(30, 'francoceba@gmail.com', 'fran', 'Franco Manuel', 'Ceballos', 'tok_1PDTbKP736g8Fma5fcOeSyqP', '185', 4, '2024-05-06 15:37:19'),
(31, 'francoceba@gmail.com', 'fran', 'Franco Manuel', 'Ceballos', 'tok_1PDTd0P736g8Fma5GMdMB4u1', '185', 4, '2024-05-06 15:39:03'),
(32, 'francoceba@gmail.com', 'fran', 'Franco Manuel', 'Ceballos', 'tok_1PDTeCP736g8Fma5gda8HEd5', '185', 4, '2024-05-06 15:40:16'),
(33, 'social.fran@skiff.com', 'fran2', 'Franco Manuel', 'Ceballos', 'tok_1PDTqRP736g8Fma5FiDqYovv', '30', 5, '2024-05-06 15:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(3) NOT NULL,
  `file` text NOT NULL,
  `description` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `category_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `file`, `description`, `category`, `status`, `category_id`, `created_at`) VALUES
(1, 'Node basics', 'node.png', 20, 'node.pdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Programming', 1, 1, '2024-04-17 21:16:40'),
(2, 'Django Basics', 'django.png', 10, 'django.pdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Programming', 1, 1, '2024-04-17 21:16:40'),
(3, 'HTML5 Basics', 'html5.jpg', 30, 'html5.pdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Convallis convallis tellus id interdum velit laoreet id donec ultrices.', 'Programming', 1, 1, '2024-04-17 21:16:40'),
(7, 'Photoshop Basics', 'photoshop.png', 50, 'photoshop.pdf', 'Photoshop Basics', 'Design', 1, 2, '2024-05-01 02:15:31'),
(8, 'Adobe xd', 'adobexd.jpeg', 75, 'adobexd.pdf', 'Adobe xd', 'Design', 1, 2, '2024-05-01 11:51:19'),
(10, 'Learn English!', 'english.jpg', 10, 'english.pdf', 'Learn English', 'Languages', 1, 26, '2024-05-01 14:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mypassword`, `created_at`) VALUES
(1, 'usuario', 'usuario@gmail.com', '$2y$10$db4Khdc0x3lIwJAH3QzsXea2Ywe3PWS6sy0kCNoIc7Zjp/HwMtSOS', '2024-04-17 15:11:21'),
(2, 'usuario2', 'usuario2@gmail.com', '$2y$10$tnl.sIVTdNsOjH.PbkWS3ed6ftdQeOQk/qxdUEu2emi.mHIv6kMme', '2024-04-18 12:54:41'),
(3, 'usuario3', 'usuario3@gmail.com', '$2y$10$DnCrUeMY65MCtpOjpZvrqeyr1Xaz5x16UqKGzybC4lvgZBK7tfOnu', '2024-04-25 17:32:07'),
(4, 'fran', 'francoceba@gmail.com', '$2y$10$93jpmN3x3akW22X37NSzPeaMzAOI6DMyYYuNCKm5UeaccA/EiL2UO', '2024-05-06 15:23:57'),
(5, 'fran2', 'social.fran@skiff.com', '$2y$10$kFp8nzFvhoHc1xW98Af99ulSnn1vhszSMAKr0RS0Hld7KfwbrFU9W', '2024-05-06 15:52:15'),
(6, 'asd', 'asdasd@asd.com', '$2y$10$3DSITHYJLXGgrlOqh7p7keOrpaXGNNMf.vcccvUqZ3hsYFixhITr2', '2024-05-06 16:00:04'),
(7, 'test', 'email@email.com', '$2y$10$RckbBoUajiUEt6z/OB3cn.V0jU0HUzTXzx3lYaGA8/bh26o8t0.7u', '2024-05-06 16:04:11'),
(8, 'asd', 'asd@asd.com', '$2y$10$Xp.DIJDlbBk8wCOgKVtJAuVwLtZlR.WC2gk236TkBV2GWSTLykXX.', '2024-05-06 16:07:34'),
(15, 'usuario123', 'usuario123@gmail.com', '$2y$10$i9chtxa2q8gnnNElL0vhj.shUHHwhMpmZcZ7fB0eP39bOZyaMclAy', '2024-05-07 14:24:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
