-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 11:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` longtext NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_image`, `status`, `created_at`) VALUES
(2, 'Cakes', '1796770957Cakes.jpeg', 'ACTIVE', '2022-05-09 17:52:52'),
(3, 'Cup Cakes', '1533417249CupCakes.jpeg', 'ACTIVE', '2022-05-09 17:53:14'),
(4, 'Donuts', '1360573774Donuts.jpeg', 'ACTIVE', '2022-05-09 17:53:23'),
(5, 'Chocolates', '353614588Chocolates.jpeg', 'ACTIVE', '2022-05-09 17:53:37'),
(6, 'Jar Cakes', '1577579347Jar Cakes.jpeg', 'ACTIVE', '2022-05-09 17:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'daman', 'daman@gmail.com', 'this is for demo purpose', '2022-06-21 10:15:30'),
(2, 'Daman', 'daman@gmail.com', 'demo testing', '2022-07-30 11:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `create_account`
--

CREATE TABLE `create_account` (
  `id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_account`
--

INSERT INTO `create_account` (`id`, `user_name`, `user_email`, `password`, `contact`, `status`, `created_at`) VALUES
(2, 'Customer 2', 'customer2@gmail.com', 'cust123456', 6534766501, 'ACTIVE', '2022-04-27 09:05:57'),
(4, 'Customer4', 'customer4@gmail.com', 'cust12345', 8734684911, 'ACTIVE', '2022-05-03 16:14:14'),
(16, 'daman', 'daman@gmail.com', '123456', 7894561230, 'ACTIVE', '2022-06-21 09:52:12'),
(17, 'Mohit', 'mohit@gmail.com', '123456', 9874563210, 'ACTIVE', '2022-06-21 10:23:00'),
(18, 'd', 'd@gmail.com', '123456', 9876543210, 'ACTIVE', '2022-07-30 11:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `status`, `created_at`) VALUES
(1, '', 'admin@gmail.com', '123456', 'Active', '2022-07-30 11:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `sub_category_name` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` longtext NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `sub_category_name`, `product_name`, `price`, `description`, `image`, `status`, `created_at`) VALUES
(4, 'Cakes', 'Theme Cakes', 'Cute Tik Tok Cake', '1000', 'Customized Cake', '149698996613 Cute Tik Tok Cake Ideas (Some are Absolutely Beautiful).jpeg', 'ACTIVE', '2022-05-10 16:12:54'),
(5, 'Cakes', 'Theme Cakes', 'Harry Potter Cake', '1000', 'Customized Cake', '896887856Harry Potter Cake Design Ideas _ Gold & Soft Pink Two Tier Cake.jpeg', 'ACTIVE', '2022-05-10 16:16:07'),
(6, 'Cakes', 'Theme Cakes', 'Jungle Book Cake', '1200', 'Customized Cake', '437159592Christening cake I made last month, jungle theme.jpeg', 'ACTIVE', '2022-05-11 08:15:25'),
(7, 'Cakes', 'Theme Cakes', 'Frozen Princess Cake', '1500', 'Customized Cake', '1703437683155226127410 Frozen Birthday Cake Ideas for Fans of Disneys Frozen.jpeg', 'ACTIVE', '2022-05-12 11:19:06'),
(8, 'Cakes', 'Theme Cakes', 'Peacock Theme Cake', '2000', 'Customized Cake', '694711018Peacock Themed Wedding Cake  - Shaadiwish.jpeg', 'ACTIVE', '2022-05-11 08:52:05'),
(9, 'Cakes', 'Theme Cakes', 'Piano Music Cake', '1500', 'Customized Cake', '830215145Piano music cake_.jpeg', 'ACTIVE', '2022-05-11 08:52:39'),
(10, 'Cakes', 'Theme Cakes', 'Woodkand Wedding Cake', '2500', 'Customized Cake', '2143567515Woodland Wedding Cake - Bakealous.jpeg', 'ACTIVE', '2022-05-11 08:53:54'),
(11, 'Cakes', 'Theme Cakes', 'Beer Theme Cake', '2000', 'Customized Cake', '43067010914 Fabulous 18th Birthday Cake Ideas.jpeg', 'ACTIVE', '2022-05-11 08:55:01'),
(12, 'Cakes', 'Chocolate Cakes', 'Chocolate Oreo Cup-cake', '1000', 'Cake with Cup Cake on it', '2570103240 Cute Cake Ideas For Any Celebration _ Chocolate Birthday Cake Topped with Cupcake.jpeg', 'ACTIVE', '2022-05-11 13:24:33'),
(13, 'Cakes', 'Chocolate Cakes', 'Choco White Cake', '900', 'Dark with White chololate Cake', '1270363281cbd0e373-ecaa-467d-b6e6-645e33172668.jpeg', 'ACTIVE', '2022-05-11 13:26:17'),
(14, 'Cakes', 'Chocolate Cakes', 'Chocolate Ganache Cake', '1500', 'Chocolate Ganache Cake', '1059665417Chocolate Ganache Tiered Cake _ JOANN.jpeg', 'ACTIVE', '2022-05-11 13:27:11'),
(15, 'Cakes', 'Chocolate Cakes', 'Chocolate Explosion Cake', '1500', 'Chocolate Cake with explosion', '1622417618Chocolate Explosion Cake _.. made for my Sons 21st birthday with all his favourite chocolate', 'ACTIVE', '2022-05-11 13:28:22'),
(16, 'Cakes', 'Fruit Cakes', 'Cake WithCone', '600', 'Cake with cone of Fruits', '190617492788 Amazing Birthday Cake Ideas for Kids of All Ages.jpeg', 'ACTIVE', '2022-05-11 13:32:18'),
(17, 'Cakes', 'Fruit Cakes', 'Fruit Choco Cake', '750', 'Fruit cake with chocolate Net', '957038371Chocolate-fruits.jpeg', 'ACTIVE', '2022-05-11 13:34:01'),
(18, 'Cakes', 'Butterscotch', 'Butter Scotch with nuts', '550', 'Butter with nuts', '488865421Easy Butterscotch Cake Recipe.jpeg', 'ACTIVE', '2022-05-11 13:38:55'),
(19, 'Cakes', 'Butterscotch', 'Flower Scotch', '500', 'Cake with flower decoration', '10816733Esterházy Torte.jpeg', 'ACTIVE', '2022-05-11 13:40:04'),
(20, 'Cakes', 'Red Velvet Cakes', 'Red Velvet Birthday Cake', '900', 'Red Velvet Birthday Cake', '637068986Red Velvet Birthday Cake with Cream Cheese Frosting.png', 'ACTIVE', '2022-05-11 13:44:20'),
(21, 'Cakes', 'Red Velvet Cakes', 'Heart Cake', '500', 'Heart shape Red Velvet Cake', '1458676256Red Velvet Cake In Pressure Cooker.jpeg', 'ACTIVE', '2022-05-11 13:45:34'),
(22, 'Cakes', 'Pinata Cake', 'White Choco Pinata', '1800', 'Pinata Cake for your mother', '443411082Bestseller Uppercase Letter Mold for Candy Making.jpeg', 'ACTIVE', '2022-05-11 13:48:06'),
(23, 'Cakes', 'Pinata Cake', 'Cat Pinata', '2500', 'Cat Pinata cake', '1829498402Adorable cat in a Party Hat Birthday Cake!.jpeg', 'ACTIVE', '2022-05-11 13:49:09'),
(24, 'Cakes', 'Alphabet Cake', 'L Alphabet', '600', 'Letter L', '641744273Letter L Cake.jpeg', 'ACTIVE', '2022-05-11 13:52:46'),
(25, 'Cakes', 'Alphabet Cake', 'Heart', '600', 'Heart Shape', '2043246812Cream tart cake Ingredienti pasta sablè (potete usare anche pan di spagna,pasta frolla o pasta biscotto) 500 g di farina 00 300 g di burro 200 g di zucchero a velo 4 tuorli di uova medie scorza di limone grattugi.jpeg', 'ACTIVE', '2022-05-11 13:53:14'),
(26, 'Cakes', 'Alphabet Cake', 'G Alphabet', '600', 'Letter G', '198047650637 Of The Most Beautiful Alphabet Cake Designs - The Wonder Cottage.jpeg', 'ACTIVE', '2022-05-11 13:53:45'),
(27, 'Cup Cakes', 'Chocolate Cupcake', 'Oreo Cupcakes', '20', 'Oreo Cupcakes with Oreo cookies', '1415455411Oreo Cookies and Cream Cupcakes- Cake Mix Hack - One Sweet Appetite.jpeg', 'ACTIVE', '2022-09-05 06:17:51'),
(28, 'Cup Cakes', 'Flavoured Cupcake', 'Strawberry Dip', '30', 'Strawberry Dipped with Chocolate', '1244658844Chocolate Covered Strawberry Cupcakes for Valentines Day.jpeg', 'ACTIVE', '2022-09-05 06:17:51'),
(29, 'Cup Cakes', 'Flavoured Cupcake', 'Rose Water Cup Cake', '20', 'Rose water Cupcakes with rose water ButterCream', '2147349297Rose Water Cupcakes with Rose Water Buttercream - Chelsweets.jpeg', 'ACTIVE', '2022-09-05 06:19:22'),
(30, 'Donuts', 'Chocolate Donuts', 'Chocolate Donuts', '30', 'Chocolate dipped Donuts', '1899939525gluten free vegan baked chocolate donuts - Sarah Bakes Gluten Free.jpeg', 'ACTIVE', '2022-09-05 06:19:23'),
(31, 'Donuts', 'Flavoured Donuts', 'Colored Donuts', '20', 'Flavoured Donuts', '627209354Donuts selber machen.jpeg', 'ACTIVE', '2022-09-05 06:19:23'),
(32, 'Chocolates', 'Chocolate in Pieces', 'Chocolate Balls', '15', 'Circuled Chocolate Cake', '295374518The Best Chocolate Dessert In Every State.jpeg', 'ACTIVE', '2022-09-05 06:19:23'),
(33, 'Chocolates', 'Chocolate Boxes', 'Chocolate Box', '500', 'Chocolate Box with 25 pieces', '652267274Edwart Chocolate Shop in Paris.jpeg', 'ACTIVE', '2022-09-05 06:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `sub_category_name` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_name`, `sub_category_name`, `image`, `description`, `status`, `created_at`) VALUES
(7, 'Cakes', 'Theme Cakes', '2003822456Theme Cake.jpeg', 'Because every theme cake has a story to tell.', 'ACTIVE', '2022-05-09 18:34:13'),
(9, 'Cakes', 'Chocolate Cakes', '92028957Chocolate Cakes.jpeg', 'If it were easy to resist, it would not be called chocolate cake.', 'ACTIVE', '2022-05-09 18:37:47'),
(10, 'Cakes', 'Fruit Cakes', '1846319912Fruit Cakes.jpeg', 'Something Healthy and Delicious.....', 'ACTIVE', '2022-05-09 18:40:31'),
(11, 'Cakes', 'Butterscotch', '1807471879Butter Scotch.jpeg', 'Homemade Butterscotch Sauce...', 'ACTIVE', '2022-05-09 18:43:18'),
(12, 'Cakes', 'Red Velvet Cakes', '913976057Red Velvet.jpeg', 'Be thankful for everything...', 'ACTIVE', '2022-05-09 18:57:30'),
(13, 'Cakes', 'Pinata Cake', '367832839Pinata Cake.jpeg', 'A Lil Surprise....', 'ACTIVE', '2022-05-10 08:31:20'),
(14, 'Cakes', 'Alphabet Cake', '512952346Letter Cake Tout choco  - kederecettes, bienvenue dans la cuisine de Vanessa.jpeg', 'Cakes start with your name...', 'ACTIVE', '2022-05-11 09:05:47'),
(15, 'Cup Cakes', 'Chocolate Cupcake', '1805565986Dark Chocolate Cupcakes with Coffee Cream Cheese Frosting _ Baked by Rachel.jpeg', 'Chocolate inside chocolate outside', 'ACTIVE', '2022-05-13 08:49:29'),
(17, 'Cup Cakes', 'Flavoured Cupcake', '1044208901download.jpeg', 'All Flavours', 'ACTIVE', '2022-05-13 08:50:02'),
(18, 'Donuts', 'Chocolate Donuts', '1388842893The Most Amazing Chocolate Donuts - Pretty_ Simple. Sweet_', 'Chocolaty', 'ACTIVE', '2022-05-13 08:52:10'),
(19, 'Donuts', 'Flavoured Donuts', '1701954398Easy Baked Cinnamon Roll Donuts.jpeg', 'All Flavours', 'ACTIVE', '2022-05-13 08:52:38'),
(20, 'Chocolates', 'Chocolate Boxes', '6017987412017 best boxed chocolates.jpeg', 'Boxes', 'ACTIVE', '2022-05-13 08:54:53'),
(21, 'Chocolates', 'Chocolate in Peices', '242544486Easy Salted Caramel Fudge Truffles.jpeg', 'Pieces ', 'ACTIVE', '2022-05-13 09:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `order_desc` longtext NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `user_name`, `user_email`, `price`, `order_desc`, `contact`, `address`, `order_date`, `order_status`, `created_at`) VALUES
(15, 'janki', 'daman@gmail.com', '3200', '<br>Harry Potter Cake | Quantity: 2 | Price: 2000<br>Jungle Book Cake | Quantity: 1 | Price: 1200', '984540394', 'jalandhar', '05-09-2022', 'ACCEPTED', '2022-09-05 09:30:25'),
(16, 'Janki Janki', 'daman@gmail.com', '1540', '<br>Chocolate Ganache Cake | Quantity: 1 | Price: 1500<br>Rose Water Cup Cake | Quantity: 2 | Price: 40', '984540394', 'hjsbsjhf', '05-09-2022', 'Rejected', '2022-09-05 09:30:27'),
(17, 'janki', 'daman@gmail.com', '110', '<br>Strawberry Dip | Quantity: 3 | Price: 90<br>Rose Water Cup Cake | Quantity: 1 | Price: 20', '984540394', 'jalandhar', '06-09-2022', 'ACCEPTED', '2022-09-17 08:44:33'),
(18, 'janki', 'daman@gmail.com', '4000', '<br>Cute Tik Tok Cake | Quantity: 2 | Price: 2000<br>Peacock Theme Cake | Quantity: 1 | Price: 2000', '984540394', 'jalandhar', '17-09-2022', 'Rejected', '2022-09-17 08:44:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_account`
--
ALTER TABLE `create_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_category_name` (`sub_category_name`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `create_account`
--
ALTER TABLE `create_account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
