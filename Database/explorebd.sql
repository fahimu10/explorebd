-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 01:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `explorebd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`) VALUES
(2, 'Saz', '$2y$10$FFzM7xH7rWA5keIinTAcGO3Zyq.Yy1CI0VKomWPEGDZGDuw2Xg89e', 'Sazzidr@gmail.com'),
(5, 'fariarahman', '$2y$10$h2x8YNCv2tBnVaJWmTwejuCAuVluHml95SqPgkwiYizeBl4v05ez6', 'rahmanfaria015@gmail.com'),
(6, 'fahim', '$2y$10$ms65njNz/C.zrEm3yeQcI.ee8btkC7sSao9JuAeiXfubpYQZ3feM6', 'fahimuddin900@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admins_reset`
--

CREATE TABLE `admins_reset` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destinations_id` int(11) NOT NULL,
  `destinations_name` varchar(255) DEFAULT NULL,
  `destinations_shortdes` varchar(255) DEFAULT NULL,
  `destinations_des` text DEFAULT NULL,
  `destinations_img` varchar(100) DEFAULT NULL,
  `destinations_cost` decimal(8,2) DEFAULT NULL,
  `divisions_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destinations_id`, `destinations_name`, `destinations_shortdes`, `destinations_des`, `destinations_img`, `destinations_cost`, `divisions_id`) VALUES
(5, 'Lalbag Fort', 'Lalbagh Fort is a 17th-century Mughal fort and one of the key tourist attractions in Dhaka.', 'Lalbagh Fort is a 17th-century Mughal fort and one of the key tourist attractions in Dhaka. Started by Prince and handed to then governor of Dhaka Shaista Khan for completion, who didnt finish it because of the death of her daughter Pari Bibi whose tomb is inside the fort. There is a small museum inside displaying Mughal paintings and calligraphy, along with swords and firearms.', '5ed237f6bdb063.23384579.jpg', '1500.00', 3),
(6, 'National Martyrs Memorial', 'National Martyrs Memorial is the national monument of Bangladesh, set up in the memory of those who died in the Bangladesh Liberation War of 1971', 'National Martyrs Memorial is the national monument of Bangladesh, set up in the memory of those who died in the Bangladesh Liberation War of 1971, which brought independence and separated Bangladesh from Pakistan. The monument is located in Savar, about 35 km north-west of the capital, Dhaka.', '5ed2386299e240.74120626.jpg', '1300.00', 3),
(7, 'Saint Martin Island', 'St. Martins Island is a small island in the northeastern part of the Bay of Bengal, about 9 km south of the tip of the Coxs Bazar-Teknaf peninsula.', 'St. Martins Island is a small island in the northeastern part of the Bay of Bengal, about 9 km south of the tip of the Coxs Bazar-Teknaf peninsula, and forming the southernmost part of Bangladesh. There is a small adjoining island that is separated at high tide, called Chera Dwip.', '5ed238da834fd4.65015931.jpg', '60000.00', 2),
(8, 'Keokradong', 'Keokradong is a peak located in Bandarban, Bangladesh.', 'Keokradong is a peak located in Bandarban, Bangladesh, with an elevation of 986 metres. Some sources claim it as the highest point of Bangladesh. On the top of Keokradong there is a small shelter and a signboard put up by Bangladesh Army proclaiming the elevation to be 967 metres.', '5ed2397030ab10.24375941.jpg', '5000.00', 2),
(9, 'Bichnakandi', 'Bichnakandi, also known as Bisnakandi, is a village in Rustompur Union, Gowainghat Upazila of Bangladeshs Sylhet District. ', 'Bichnakandi, also known as Bisnakandi, is a village in Rustompur Union, Gowainghat Upazila of Bangladeshs Sylhet District.', '5ed239a89f0527.72389663.jpg', '3000.00', 8),
(10, 'Lala Khal', 'Lalakhal is a tourist spot in Sylhet, Bangladesh. Lalakhal is a wide channel in the Sharee River near the Tamabil road', 'Lalakhal is a tourist spot in Sylhet, Bangladesh. Lalakhal is a wide channel in the Sharee River near the Tamabil road. The river is not very deep and is one of the sources of sand in Sylhet.', '5ed239e06c9982.51857810.jpg', '3000.00', 8),
(11, 'Sundarban', 'The Sundarbans is a mangrove area in the delta formed by the confluence of the Ganges, Brahmaputra and Meghna Rivers in the Bay of Bengal.', 'The Sundarbans is a mangrove area in the delta formed by the confluence of the Ganges, Brahmaputra and Meghna Rivers in the Bay of Bengal. It spans from the Hooghly River in Indias state of West Bengal to the Baleswar River in Bangladesh.', '5ed23a2ef2c184.06962233.jpg', '8000.00', 4),
(12, 'Shat Gombuj Masjid', 'The Sixty Dome Mosque, is a mosque in Bangladesh. It is part of the Mosque City of Bagerhat, a UNESCO World Heritage Site.', 'The Sixty Dome Mosque, is a mosque in Bangladesh. It is part of the Mosque City of Bagerhat, a UNESCO World Heritage Site. It is the largest mosque in Bangladesh from the sultanate period. It was built during the Bengal Sultanate by Ulugh Khan Jahan, the governor of the Sundarbans.Barisal.', '5ed23a6e8be2f9.30180859.jpg', '2500.00', 4),
(13, 'Mahasthangarh', 'Mahasthangarh is one of the earliest urban archaeological sites so far discovered in Bangladesh.', 'Mahasthangarh is one of the earliest urban archaeological sites so far discovered in Bangladesh. The village Mahasthan in Shibganj thana of Bogra District contains the remains of an ancient city which was called Pundranagara or Paundravardhanapura in the territory of Pundravardhana.', '5ed23af83db529.95178884.jpg', '2500.00', 6),
(14, 'Choto Shona Mosque', 'Choto Shona Mosque is located in Chapai Nawabganj district of Bangladesh.', 'Choto Shona Mosque is located in Chapai Nawabganj district of Bangladesh. The mosque is situated about 3 kilometres south of the Kotwali Gate and 0.5 kilometres to the south-east of the Mughal Tahakhana complex in the Firozpur Quarter.', '5ed23b228fdd36.05005497.jpg', '2500.00', 6),
(15, 'Tajhat Palace', 'Tajhat Palace, Tajhat Rajbari, is a historic palace of Bangladesh, located in Tajhat, Rangpur.', 'Tajhat Palace, Tajhat Rajbari, is a historic palace of Bangladesh, located in Tajhat, Rangpur. This palace now holds the Rangpur museum. Tajhat Palace is situated three km. south-east of the city of Rangpur, on the outskirts of town.', '5ed23b5b609194.81801120.jpg', '2500.00', 7),
(16, 'Birishiri', 'Shusong Durgapur of Birishiri is located at Netrokona district about 200 km north from Dhaka.', 'Shusong Durgapur of Birishiri is located at Netrokona district about 200 km north from Dhaka. Its not only blessed by charismatic natural beauty, is also reach in ethnic culture as there are many ethnic groups like – Hajong, Garo, Achik and Mandi etc lives here. Many people around the world come here to learn the ethnic culture and livings.', '5ed23bb2b3ccb0.16639302.jpg', '1500.00', 5),
(17, 'Kuakata', 'Kuakata is a beach town known for its panoramic sea beach. It is in southeastern Bangladesh.', 'Kuakata is a beach town known for its panoramic sea beach. It is in southeastern Bangladesh and is the number sizeable tourist destination in the country. Kuakata beach is a sandy expanse 18 kilometres long and 3 kilometres wide.', '5ed23bef479a22.61332682.jpg', '4000.00', 1),
(18, 'Guava floating market', 'The 200-year-old floating market at Bhimruli in Jhalakathi has become a tourist spot.', 'The 200-year-old floating market at Bhimruli in Jhalakathi has become a tourist spot. Guava floating market is a unique market. Hundreds of tourists from home and abroad visit the place every day to enjoy the beauty of the market and its surrounding landscape.', '5ed23c1d5ff7e4.34260652.jpg', '4000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `divisions_id` int(11) NOT NULL,
  `divisions_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`divisions_id`, `divisions_name`) VALUES
(1, 'Barisal'),
(2, 'Chittagong'),
(3, 'Dhaka'),
(4, 'Khulna'),
(5, 'Mymensingh'),
(6, 'Rajshahi'),
(7, 'Rangpur'),
(8, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotels_id` int(11) NOT NULL,
  `hotels_name` varchar(255) DEFAULT NULL,
  `hotels_shortdes` varchar(255) DEFAULT NULL,
  `hotels_des` text DEFAULT NULL,
  `hotels_img` varchar(100) DEFAULT NULL,
  `destinations_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `packages_id` int(11) NOT NULL,
  `packages_name` varchar(255) DEFAULT NULL,
  `packages_shortdes` varchar(255) DEFAULT NULL,
  `packages_des` text DEFAULT NULL,
  `packages_img` varchar(100) DEFAULT NULL,
  `packages_cost` decimal(8,2) DEFAULT NULL,
  `destinations_id` int(11) DEFAULT NULL,
  `hotels_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `to_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `to_date`) VALUES
(8, 'fahimu10', '$2y$10$BYMh4Wr5RlsKQy2goAv/yON6KP69uG.gZMyl09JUOhhCeKpcLSBea', 'fahimuddin900@gmail.com', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins_reset`
--
ALTER TABLE `admins_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destinations_id`),
  ADD KEY `destinations_name` (`destinations_name`) USING BTREE,
  ADD KEY `divisions_id` (`divisions_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`divisions_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotels_id`),
  ADD KEY `hotels_name` (`hotels_name`) USING BTREE,
  ADD KEY `destinations_id` (`destinations_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`packages_id`),
  ADD KEY `packages_name` (`packages_name`) USING BTREE,
  ADD KEY `destinations_id` (`destinations_id`),
  ADD KEY `hotels_id` (`hotels_id`);

--
-- Indexes for table `resetpassword`
--
ALTER TABLE `resetpassword`
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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admins_reset`
--
ALTER TABLE `admins_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destinations_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `divisions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotels_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `packages_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_ibfk_1` FOREIGN KEY (`divisions_id`) REFERENCES `divisions` (`divisions_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`destinations_id`) REFERENCES `destinations` (`destinations_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`destinations_id`) REFERENCES `destinations` (`destinations_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `packages_ibfk_2` FOREIGN KEY (`hotels_id`) REFERENCES `hotels` (`hotels_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
