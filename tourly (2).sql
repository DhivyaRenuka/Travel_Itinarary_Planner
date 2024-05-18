-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 11:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourly`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `accommodation_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`accommodation_id`, `name`, `destination_id`, `description`) VALUES
(1, 'Hotel Kyoto', 1, 'Luxurious hotel near Kyoto Temple.'),
(2, 'Rome Resort', 9, 'Resort with a view of the Colosseum.'),
(3, 'Parisian Hotel', 10, 'Charming hotel in the heart of Paris, near the Eiffel Tower.'),
(4, 'Agra Inn', 4, 'Cozy inn offering views of the Taj Mahal.'),
(5, 'Sydney Seaside Villa', 5, 'Villa with ocean views near the Sydney Opera House.'),
(6, 'Cusco Lodge', 6, 'Lodge nestled in the mountains near Machu Picchu.'),
(7, 'Jordanian Retreat', 7, 'Retreat offering tranquility near Petra.'),
(8, 'Siem Reap Resort', 8, 'Resort with a view of Angkor Wat.'),
(9, 'Kyoto Stay', 1, 'Traditional Japanese accommodation in Kyoto.'),
(10, 'New York City Hotel', 3, 'Hotel in the heart of New York City, near the Statue of Liberty.'),
(11, 'Beach Resort Italy', 2, 'Beachfront resort with views of San Miguel.');

-- --------------------------------------------------------

--
-- Table structure for table `attractions`
--

CREATE TABLE `attractions` (
  `attraction_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`attraction_id`, `name`, `location`, `description`) VALUES
(0, 'Kyoto Temple', 'Japan', 'Yet another description goes here.'),
(1, 'San Miguel', 'Italy', 'Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.'),
(2, 'Statue of Liberty', 'New York', 'Statue of Liberty description goes here.'),
(3, 'Taj Mahal', 'India', 'Taj Mahal description goes here.'),
(4, 'Sydney Opera House', 'Australia', 'Sydney Opera House description goes here.'),
(5, 'Machu Picchu', 'Peru', 'Machu Picchu description goes here.'),
(6, 'Petra', 'Jordan', 'Petra description goes here.'),
(7, 'Angkor Wat', 'Cambodia', 'Angkor Wat description goes here.'),
(8, 'Colosseum', 'Rome', 'Colosseum description goes here.'),
(9, 'Eiffel Tower', 'Paris', 'Eiffel Tower description goes here.'),
(10, 'Great Wall of China', 'China', 'Great Wall of China description goes here.');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `name`, `city`, `state`, `country`, `description`) VALUES
(1, 'Kyoto Temple', 'Kyoto', NULL, 'Japan', 'Kyoto Temple description goes here.'),
(2, 'San Miguel', NULL, NULL, 'Italy', 'San Miguel description goes here.'),
(3, 'Statue of Liberty', 'New York City', 'New York', 'USA', 'Statue of Liberty description goes here.'),
(4, 'Taj Mahal', 'Agra', 'Uttar Pradesh', 'India', 'Taj Mahal description goes here.'),
(5, 'Sydney Opera House', 'Sydney', 'New South Wales', 'Australia', 'Sydney Opera House description goes here.'),
(6, 'Machu Picchu', 'Cusco', NULL, 'Peru', 'Machu Picchu description goes here.'),
(7, 'Petra', NULL, NULL, 'Jordan', 'Petra description goes here.'),
(8, 'Angkor Wat', 'Siem Reap', NULL, 'Cambodia', 'Angkor Wat description goes here.'),
(9, 'Colosseum', 'Rome', NULL, 'Italy', 'Colosseum description goes here.'),
(10, 'Eiffel Tower', 'Paris', NULL, 'France', 'Eiffel Tower description goes here.'),
(11, 'Great Wall of China', NULL, NULL, 'China', 'Great Wall of China description goes here.');

-- --------------------------------------------------------

--
-- Table structure for table `itineraries`
--

CREATE TABLE `itineraries` (
  `itinerary_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itineraries`
--

INSERT INTO `itineraries` (`itinerary_id`, `user_id`, `destination_id`, `start_date`, `end_date`, `budget`) VALUES
(1, 5, 3, '2024-05-03', '2024-05-10', 2233.00),
(2, 5, 4, '2024-05-03', '2024-05-10', 2233.00);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `reviews` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `title`, `description`, `duration`, `capacity`, `location`, `reviews`, `rating`, `price`, `image`) VALUES
(1, 'Relaxing Retreat in Bali', 'Experience the ultimate relaxation in beautiful Bali. Unwind with spa treatments, explore stunning beaches, and immerse yourself in Balinese culture.', '5D/4N', 8, 'Bali, Indonesia', 15, 4, 600.00, './assets/images/packege-4.jpg'),
(2, 'Explore the Serengeti Safari', 'Embark on an unforgettable adventure through the Serengeti. Witness breathtaking wildlife, enjoy luxury tent accommodations, and experience the beauty of Africa.', '8D/7N', 6, 'Serengeti, Tanzania', 30, 5, 1500.00, './assets/images/packege-5.jpg'),
(3, 'Romantic Getaway in Paris', 'Celebrate love in the City of Light. Enjoy romantic walks along the Seine, indulge in gourmet cuisine, and visit iconic landmarks like the Eiffel Tower.', '4D/3N', 2, 'Paris, France', 25, 5, 900.00, './assets/images/packege-6.jpg'),
(4, 'Adventure in the Amazon Rainforest', 'Embark on a thrilling adventure deep into the heart of the Amazon. Explore diverse ecosystems, encounter exotic wildlife, and experience the wonders of nature.', '6D/5N', 4, 'Amazon Rainforest, Brazil', 20, 4, 1200.00, './assets/images/packege-7.jpg'),
(5, 'Cultural Immersion in Kyoto', 'Immerse yourself in the rich culture and history of Kyoto. Discover ancient temples, participate in traditional tea ceremonies, and experience the beauty of Japanese gardens.', '3D/2N', 4, 'Kyoto, Japan', 10, 4, 400.00, './assets/images/packege-8.jpg'),
(6, 'Luxury Retreat in the Maldives', 'Indulge in luxury and relaxation in the idyllic Maldives. Stay in overwater bungalows, snorkel in crystal-clear waters, and enjoy world-class dining.', '7D/6N', 2, 'Maldives', 35, 5, 2500.00, './assets/images/packege-9.jpg'),
(7, 'Winter Wonderland in Lapland', 'Experience the magic of Lapland in winter. Enjoy husky sledding, see the Northern Lights, and stay in cozy cabins surrounded by snow-covered landscapes.', '5D/4N', 6, 'Lapland, Finland', 18, 5, 1800.00, './assets/images/packege-10.jpg'),
(8, 'Desert Adventure in Dubai', 'Embark on an exciting adventure in the desert playground of Dubai. Experience thrilling dune bashing, ride camels, and indulge in Arabian hospitality under the stars.', '2D/1N', 4, 'Dubai, United Arab Emirates', 12, 4, 300.00, './assets/images/packege-11.jpg'),
(9, 'Historical Tour of Rome', 'Discover the ancient wonders of Rome on a historical tour. Visit iconic landmarks such as the Colosseum, explore Vatican City, and indulge in delicious Italian cuisine.', '4D/3N', 6, 'Rome, Italy', 22, 5, 800.00, './assets/images/packege-12.jpg'),
(10, 'Tropical Paradise in Fiji', 'Escape to a tropical paradise in Fiji. Relax on pristine beaches, swim in crystal-clear waters, and experience authentic Fijian hospitality.', '6D/5N', 4, 'Fiji Islands', 15, 4, 1500.00, './assets/images/packege-13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tour_inquiries`
--

CREATE TABLE `tour_inquiries` (
  `id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `inquiry_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(2, 'divya', 'divyarenu014@gmail.com', ''),
(3, 'divya', 'divyarenu@gmail.com', ''),
(4, NULL, 'a@gmail.com', '$2y$10$xKcHC7sP2frYf5lwbiGgiOXtBN6CgdVDVxVvnIdSjnvoifIeifNzm'),
(5, 'aa', 'aa@gmail.com', '$2y$10$4k1xbQSYEyNR4e85bFgHVOmtDVg3sKApaIX3TpaYl3OIhOIhUz9Nq'),
(6, 'bb', 'bb@gmail.com', '$2y$10$CRfH51slTsY.PpkVS2SPEevzyFkzaihXqrb/u9vU3VmfTdOBFg4xe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`accommodation_id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`attraction_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD PRIMARY KEY (`itinerary_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tour_inquiries`
--
ALTER TABLE `tour_inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itineraries`
--
ALTER TABLE `itineraries`
  MODIFY `itinerary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tour_inquiries`
--
ALTER TABLE `tour_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD CONSTRAINT `accommodations_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`destination_id`);

--
-- Constraints for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD CONSTRAINT `itineraries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `itineraries_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`destination_id`);

--
-- Constraints for table `tour_inquiries`
--
ALTER TABLE `tour_inquiries`
  ADD CONSTRAINT `tour_inquiries_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`destination_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
