-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 05:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `founder_name` varchar(255) NOT NULL,
  `company_pic` varchar(255) DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  `description1` text NOT NULL,
  `latest_model` varchar(255) NOT NULL,
  `latest_model_pic` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `description2` text DEFAULT NULL,
  `description3` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `car_name`, `company_name`, `founder_name`, `company_pic`, `time`, `description1`, `latest_model`, `latest_model_pic`, `price`, `description2`, `description3`, `location`) VALUES
(3, 'Toyata', 'Toyota Motor Corporation', 'Kiichiro Toyoda', 'Headquarter_of_Toyota_Motor_Corporation_3.JPG', 'Aug-28 ,1937 - Now', 'Toyota was founded in 1937 by Kiichiro Toyoda, the son of a prominent Japanese industrialist. The company initially focused on producing small cars for the Japanese market, but it quickly expanded its operations to other parts of the world. During World War II, Toyota was forced to shift its production to military vehicles, but after the war, it resumed its production of civilian cars.', 'Toyota Corolla Cross', 'Toyota_Corolla_Cross.jpg', '$24,000 - $30,000', 'In the 1960s, Toyota established its reputation for quality and innovation with the introduction of the Toyota Production System, a manufacturing method that focused on reducing waste and improving efficiency. This system became the foundation of the company\'s success, and it enabled Toyota to produce high-quality cars at a lower cost than its competitors. In the 1980s and 1990s, Toyota expanded its operations to North America and Europe, and it became one of the largest and most successful car companies in the world.', 'In the early 21st century, Toyota faced several challenges, including a series of high-profile recalls and quality issues. However, the company responded by redoubling its focus on quality and innovation, and it has continued to be one of the most successful car companies in the world. Today, Toyota is known for its high-quality cars, trucks, and SUVs, as well as its commitment to sustainability and environmental responsibility. The company has also expanded into new areas, such as hybrid and electric vehicles, and it has continued to innovate in order to stay ahead of its competitors.', 'Toyota City, Aichi Prefecture, Japan'),
(5, 'Suzuki', 'Suzuki Motor Corporation', 'Michio Suzuki', 'SUZUKI-MotorHQ.jpg', 'Oct 1909 - now', 'Suzuki Motor Corporation is a Japanese multinational corporation that specializes in manufacturing automobiles, motorcycles, and marine engines. The company was founded in 1909 by Michio Suzuki as a weaving loom manufacturer, but in 1937 it shifted its focus to producing small engines for bicycles. By the 1950s, Suzuki had entered the motorcycle market, and in the 1960s it began producing automobiles. Today, Suzuki is one of the largest manufacturers of motorcycles in the world and has a significant presence in the automotive industry.', 'Maruti Suzuki Fronx', 'Maruti-Fronx-Price.jpg', '₹ 10.00 Lakh', 'Suzuki has a reputation for producing high-quality, reliable vehicles at an affordable price. Its motorcycles are known for their sporty designs and excellent performance, and the company has won numerous championships in motorcycle racing. In the automotive industry, Suzuki is known for producing compact cars and SUVs that are popular in many countries around the world. Suzuki has also made significant investments in developing environmentally friendly vehicles, including hybrid and electric cars.', 'In recent years, Suzuki has faced challenges due to changing consumer preferences and the emergence of new competitors. The company has struggled to compete with larger automotive manufacturers in terms of scale and innovation, and in 2020 it announced that it would stop selling cars in the United States due to poor sales. However, Suzuki continues to have a strong presence in many other countries and is investing in new technologies and partnerships to remain competitive in the global market.', 'Hamamatsu, Shizuoka Prefecture, Japan');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_flag` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_flag`, `photo`, `created_at`, `updated_at`, `brand_name`) VALUES
(1, 'Japane', 'SUZUKI-MotorHQ.jpg', 'Headquarter_of_Toyota_Motor_Corporation_3.JPG', '2023-03-11 19:16:28', NULL, 'Toyata'),
(3, 'Japan', 'jplogo.png', 'Toyota (2).png', '2023-03-22 18:29:19', NULL, 'Toyata'),
(4, 'Japan', 'jplogo.png', 'Suzuki.png', '2023-03-22 20:05:54', NULL, 'Suzuki');

-- --------------------------------------------------------

--
-- Table structure for table `countries_list`
--

CREATE TABLE `countries_list` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries_list`
--

INSERT INTO `countries_list` (`id`, `country_name`, `country_logo`) VALUES
(2, 'Japan', 'japan.png');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `value`) VALUES
(1, 'User', 1),
(2, 'Editor', 2),
(3, 'Admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `suspended` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `role_id`, `suspended`, `created_at`, `updated_at`) VALUES
(1, 'Khunn Satt Ko Ko', 'kset.dkk@gmail.com', '09735462722', 'YGN', '$2y$10$8gT2Qj0AvparQ/c2t1jBNOrVmbNUHRU2UioomNIou03HNw73.LD3W', 3, 0, '2023-02-22 10:46:14', NULL),
(2, 'Alice', 'a@gmail.com', '09735462722', 'MDY', '$2y$10$S/Vkwlq7lqBAl6AF69evzOs.0vLWxRtpry6gMdvG1uy3Tmv76A61C', 2, 0, '2023-02-22 11:22:55', NULL),
(14, 'BOBO', 'bobo@gmail.com', '09735462722', 'YGN', '$2y$10$mKUlwQGaMZIVNaanvNla7OpNRqbOkaxVhZNXZsU/nyp1s1hbmi77C', 1, 0, '2023-02-22 20:04:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries_list`
--
ALTER TABLE `countries_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries_list`
--
ALTER TABLE `countries_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
