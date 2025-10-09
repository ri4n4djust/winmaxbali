-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2025 at 11:39 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awanvillasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `image`, `created_at`, `updated_at`) VALUES
(1, 'One Bed Room', 'one-bed-room', '<h2>One Bedroom Villas with Private Pool</h2><p>Experience the ultimate in luxury and relaxation in our stunning One Bedroom Villas with Private Pool.</p><p><img src=\"http://localhost:8000/assets/images/icon/pool.png\" alt=\"Company\" width=\"70\" height=\"70\"><br>Private Pool Size: 7m x 3m x 1,5m</p><p><img src=\"http://localhost:8000/assets/images/icon/wifi.png\" alt=\"Pool\" width=\"70\" height=\"70\"><br>High Spped Wifi</p><p><img src=\"http://localhost:8000/assets/images/icon/villa.png\" alt=\"Pool\" width=\"70\" height=\"70\"><br>Villa Size 180 sqm</p><p><img src=\"http://localhost:8000/assets/images/icon/plug.png\" alt=\"Pool\" width=\"70\" height=\"70\"><br>Electrical Voltase 220V</p><p><img src=\"http://localhost:8000/assets/images/icon/bed.png\" alt=\"Pool\" width=\"70\" height=\"70\"><br>Bedroom 5m x 5m</p><p><img src=\"http://localhost:8000/assets/images/icon/door.png\" alt=\"Pool\" width=\"70\" height=\"70\"><br>Living Room 3,2m x 7,30m</p><h2>Our luxurious villas boast:</h2><p>- Private Swimming Pool: Unwind in your own private oasis, surrounded by lush tropical gardens.<br>- Sundeck: Soak up the sun and take in the stunning surroundings.<br>- Shower garden which is surrounded by tropical gardens with the villa’s size 300sm2.<br>&nbsp;</p><h2>Villa Amenities</h2><h3>Each villa is equipped with:</h3><p>- Full-Size Refrigerators: Stock up on your favorite snacks and drinks.<br>- Flat Screen Televisions (TV Cables): Stay entertained, with a range of channels to choose from.<br>- Electric Kettle<br>- Kitchenette: Prepare snacks and light meals with ease.<br>&nbsp;</p><h2>Guest Rooms</h2><h3>Our luxurious guest rooms feature:</h3><p>- King Size Bed and Twin Beds: Enjoy a restful night\'s sleep in our comfortable beds.<br>- Mosquito Net: Sleep peacefully, protected from mosquitoes.<br>- Air-Conditioned: Stay cool and comfortable, with air conditioning throughout the villa.<br>- Wardrobes: Ample storage space for your belongings.<br>- Flat Screen Televisions (TV Cables): Stay entertained, with a range of channels to choose from.<br>- IDD Telephones: Stay connected, with international direct dialing.<br>- Internet Access (WiFi): Stay online, with fast and reliable internet access.<br>- Safety Deposit Boxes: Secure storage for your valuables.&nbsp;</p>', NULL, NULL, NULL, '1_banner-one-bed.jpg', NULL, '2025-04-07 15:49:16'),
(2, 'Two Bed Room', 'two-bed-room', '<h2>Two Bedroom Villas with Private Pool</h2><p>Experience the ultimate in luxury and relaxation in our stunning One Bedroom Villas with Private Pool.</p><p><img src=\"{{asset(\'assets/images/icon/pool.png\')}}\" alt=\"Company\"><br>Private Pool Size: 7m x 3m x 1,5m..</p><p><img src=\"{{asset(\'assets/images/icon/wifi.png\')}}\" alt=\"Pool\"><br>High Spped Wifi</p><p><img src=\"{{asset(\'assets/images/icon/villa.png\')}}\" alt=\"Pool\"><br>Villa Size 180 sqm</p><p><img src=\"{{asset(\'assets/images/icon/plug.png\')}}\" alt=\"Pool\"><br>Electrical Voltase 220V</p><p><img src=\"{{asset(\'assets/images/icon/bed.png\')}}\" alt=\"Pool\"><br>Bedroom 5m x 5m</p><p><img src=\"{{asset(\'assets/images/icon/door.png\')}}\" alt=\"Pool\"><br>Living Room 3,2m x 7,30m</p><h2>Our luxurious villas boast:</h2><p>- Private Swimming Pool: Unwind in your own private oasis, surrounded by lush tropical gardens.<br>- Sundeck: Soak up the sun and take in the stunning surroundings.<br>- Shower garden which is surrounded by tropical gardens with the villa’s size 300sm2.<br>&nbsp;</p><h2>Villa Amenities</h2><h3>Each villa is equipped with:</h3><p>- Full-Size Refrigerators: Stock up on your favorite snacks and drinks.<br>- Flat Screen Televisions (TV Cables): Stay entertained, with a range of channels to choose from.<br>- Electric Kettle<br>- Kitchenette: Prepare snacks and light meals with ease.<br>&nbsp;</p><h2>Guest Rooms</h2><h3>Our luxurious guest rooms feature:</h3><p>- King Size Bed and Twin Beds: Enjoy a restful night\'s sleep in our comfortable beds.<br>- Mosquito Net: Sleep peacefully, protected from mosquitoes.<br>- Air-Conditioned: Stay cool and comfortable, with air conditioning throughout the villa.<br>- Wardrobes: Ample storage space for your belongings.<br>- Flat Screen Televisions (TV Cables): Stay entertained, with a range of channels to choose from.<br>- IDD Telephones: Stay connected, with international direct dialing.<br>- Internet Access (WiFi): Stay online, with fast and reliable internet access.<br>- Safety Deposit Boxes: Secure storage for your valuables.<br>&nbsp;</p>', NULL, NULL, NULL, '2_banner-gallery.jpg', NULL, '2025-04-07 15:49:49'),
(3, 'Provide Services', 'provide-services', '<h2>● In-Villa Spa</h2><p>Indulge in the ultimate relaxation experience with our In-Villa Spa services. Enjoy rejuvenating treatments in the comfort and privacy of your own villa.</p><p><img src=\"http://localhost:8000/assets/images/spa.jpg\" alt=\"Dancer\" width=\"2100\" height=\"1421\"></p><p><img src=\"http://localhost:8000/assets/images/floating.jpg\" alt=\"Dancer\" width=\"600\" height=\"400\"></p><h2>● Floating Breakfast</h2><p>Start your day in paradise with our signature Floating Breakfast experience. Indulge in a Delicious Breakfast Enjoy a mouth-watering breakfast, carefully prepared by our chefs, and served to you in the comfort of your own private pool.&nbsp;</p><p><img src=\"http://localhost:8000/assets/images/romantic.jpg\" alt=\"Dancer\" width=\"600\" height=\"400\"></p><h2>● Romantic Dinner</h2><p>Celebrate love and romance with a unforgettable dinner experience under the stars.</p><p><img src=\"http://localhost:8000/assets/images/honeymoon.jpg\" alt=\"Dancer\" width=\"600\" height=\"400\"></p><h2>● Honeymoon Decoration</h2><p>Make your dream honeymoon even more unforgettable with our romantic decoration packages. Transform your villa into a love nest with our beautifully crafted decoration packages</p><h2>● Airport Pickup</h2><p>Pickup transfer and drop.</p><h2>● Motorbike Rental</h2>', NULL, NULL, NULL, '3_Mandiri-7547.jpg', NULL, '2025-03-18 23:18:09'),
(4, 'Gallery', 'gallery', '<p>Foto gallery</p>', NULL, NULL, NULL, '4_banner-gallery1.jpg', NULL, '2025-03-19 17:36:05'),
(5, 'Special Offers', 'special-offers', '<p>Spesial Offer</p>', NULL, NULL, NULL, '5_Mandiri-0804.jpg', NULL, '2025-03-18 23:20:46'),
(6, 'About Us', 'about-us', '<h2>About US</h2><p>Escape to The Awan Villas, where every moment is a chance to unwind and rejuvenate. .</p><h2>Why Choose The Awan Villas?</h2><h3>- Prime Location &amp; Accessibility</h3><p>Experience the best of Seminyak, with Batu Belig Beach just 5 minutes away, Seminyak hotspots 10 minutes away, Canggu area 15 minutes away, and a 30-minute drive from the airport.</p><h3>- Private Luxury &amp; Spacious Design</h3><p>Each of our 300m² villas features:</p><p>A private pool and sundeck for ultimate relaxation<br>A Balinese-style entrance that sets the tone for a serene stay<br>A fully equipped living space, complete with modern amenities<br>A beautiful garden that creates a peaceful atmosphere<br>&nbsp;</p><h3>- Exclusive In-Villa Spa &amp; Modern Amenities</h3><p>Indulge in rejuvenating spa treatments, featuring Balinese and Indonesian herbs and spices. Enjoy:</p><p>King-size beds for a restful night\'s sleep<br>Air conditioning and Wi-Fi for your convenience<br>Entertainment facilities in a serene setting<br>&nbsp;</p>', NULL, NULL, NULL, '6_banner-one-bed.jpg', NULL, '2025-04-07 15:52:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
