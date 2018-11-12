-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Giu 01, 2018 alle 15:01
-- Versione del server: 5.7.21
-- Versione PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Ducati'),
(2, 'Yamaha'),
(3, 'Honda'),
(4, 'Harley Davidson'),
(5, 'Kawasaki'),
(6, 'Piaggio');

-- --------------------------------------------------------

--
-- Struttura della tabella `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(13, 1, '192.168.1.89', -1, 1),
(15, 4, '192.168.1.119', -1, 1),
(17, 1, '10.64.196.1', -1, 1),
(23, 3, '::1', -1, 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Scooter'),
(2, 'Sportiva'),
(3, 'Stradale'),
(4, 'Chopper'),
(5, 'Bagger'),
(6, 'Scrambler'),
(7, 'Enduro');

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 2, 7, 1, '07M47684BS5725041', 'Completed'),
(2, 2, 2, 1, '07M47684BS5725041', 'Completed'),
(3, 1, 7, 1, '04M663539C837510S', 'Completed'),
(4, 1, 3, 1, '5B866890T1223963M', 'Completed'),
(5, 3, 1, 1, '3RL257051E4360622', 'Completed'),
(6, 3, 2, 1, '4LP666378N9595141', 'Completed'),
(7, 3, 3, 1, '94Y08647209183237', 'Completed'),
(8, 3, 1, 1, '94Y08647209183237', 'Completed'),
(9, 3, 2, 1, '6GV070089N6545353', 'Completed'),
(10, 3, 1, 1, '2V87570168903302W', 'Completed'),
(12, 3, 3, 1, '1N340397FY309024V', 'Completed'),
(13, 3, 3, 1, '5HG59823S04418839', 'Completed'),
(14, 3, 3, 1, '0VV740312L225863N', 'Completed'),
(15, 3, 3, 1, '1J608945PK0365724', 'Completed'),
(16, 3, 3, 1, '9A9593323P040104R', 'Completed'),
(17, 3, 3, 1, '5VH661907H221410C', 'Completed'),
(18, 3, 6, 1, '5JE08523RU694921S', 'Completed'),
(19, 3, 6, 1, '9M3255904M623582A', 'Completed'),
(20, 3, 3, 1, '5S994676048171029', 'Completed'),
(21, 3, 3, 1, '7M569772GL871705M', 'Completed'),
(22, 3, 3, 1, '2SK06630F6911050H', 'Completed'),
(23, 3, 3, 1, '4CV4753428867405R', 'Completed'),
(24, 3, 2, 1, '4CV4753428867405R', 'Completed'),
(25, 3, 9, 1, '5LK693364E142373D', 'Completed'),
(26, 3, 13, 1, '28M10162D68458748', 'Completed'),
(27, 3, 1, 1, '90M178435G5843707', 'Completed'),
(28, 3, 3, 1, '1T818600EU7426041', 'Completed'),
(29, 3, 2, 1, '1T818600EU7426041', 'Completed'),
(30, 3, 3, 1, '40G555443R343382K', 'Completed'),
(31, 3, 3, 1, '0WW32012XW186543A', 'Completed'),
(32, 3, 2, 1, '89W69088KR565451Y', 'Completed'),
(33, 3, 2, 1, '8K328262AV4773617', 'Completed'),
(34, 3, 3, 1, '6JP85534K9326541P', 'Completed'),
(35, 3, 3, 1, '1FX87191V2967244S', 'Completed'),
(36, 3, 3, 1, '53R96394RP755614X', 'Completed'),
(37, 3, 11, 1, '7Y6024832N4102535', 'Completed'),
(39, 3, 3, 1, '9EP37225AN754060M', 'Completed'),
(40, 3, 3, 1, '6NF979958D152480B', 'Completed'),
(41, 8, 3, 1, '50U12125ED572060Y', 'Completed'),
(42, 8, 5, 1, '9K264242AX3740156', 'Completed'),
(43, 8, 2, 6, '8XF896612F6059628', 'Completed'),
(44, 8, 1, 1, '46922987YK919802K', 'Completed'),
(45, 3, 3, 2, '0XA44776BM9252614', 'Completed'),
(46, 3, 2, 3, '0XA44776BM9252614', 'Completed');

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `image`) VALUES
(1, 1, 2, 'Yamaha T-Max', 11490, 'Scooter', 'tmax.jpg', 'yamaha scooter t-max', 'https://image.ibb.co/mpOaJJ/tmax.jpg'),
(2, 1, 3, 'Honda Integra', 9490, 'Scooter', 'integra.jpg', 'honda integra scooter', 'https://image.ibb.co/h694Cd/integra.jpg'),
(3, 2, 3, 'Honda Neo Sports Cafe', 24000, 'Moto sportiva', 'neosportcafe.jpg', 'sportiva honda neo sports cafe', 'https://image.ibb.co/dtD9dJ/neosportcafe.jpg'),
(4, 2, 5, 'kawasaki Z750', 9050, 'Moto sportiva', 'z750.jpg', 'kawasaki sportiva z750', 'https://image.ibb.co/jrY9dJ/z750.jpg'),
(5, 2, 1, 'Ducati Monster 696', 8990, 'Moto sportiva', '696.jpg', 'ducati monster 696 sportiva', 'https://image.ibb.co/c6qY5y/696.jpg'),
(6, 1, 6, 'Piaggio Vespa lx', 4980, 'Scooter', 'lx.jpg', 'piaggio vespa lx scooter', 'https://image.ibb.co/kQbUdJ/lx.jpg'),
(7, 3, 1, 'Ducati Diavel', 22640, 'Moto da strada', 'diavel.jpg', 'Ducati diavel stradale', 'https://image.ibb.co/f5wvJJ/diavel.jpg'),
(8, 3, 2, 'Yamaha Niken 850', 22000, 'Moto da strada', 'niken.jpg', 'Yamaha Niken 850 stradale', 'https://image.ibb.co/f7n2yJ/niken.jpg'),
(9, 4, 4, 'Harley Davidson Chopper', 25090, 'Chopper', 'chopper.jpg', 'Harley Davidson Chopper', 'https://image.ibb.co/kAUFJJ/chopper.jpg'),
(10, 5, 4, 'Harley Davidson XR1200', 19500, 'Bagger', 'xr1200.jpg', 'Harley Davidson XR1200 Bagger', 'https://image.ibb.co/kaJ9dJ/xr1200.jpg'),
(11, 6, 1, 'Ducati Scrambler 1100', 12890, 'Scambler', 'scrambler.jpg', 'Ducati Scrambler 1100', 'https://image.ibb.co/cveFJJ/scrambler.jpg'),
(12, 6, 4, 'Harley Davidson 883', 9800, 'Scambler', '883.jpg', 'Harley Davidson 883 scrambler', 'https://image.ibb.co/cGsPCd/883.jpg'),
(13, 7, 2, 'Yamaha yz250f', 8990, 'Enduro', 'ycross.jpg', 'Yamaha yz250f enduro', 'https://image.ibb.co/igBvJJ/ycross.jpg'),
(14, 7, 5, 'Kawasaki KLX150', 8530, 'Enduro', 'kcross.jpg', 'kawasaki klx150 enduro', 'https://image.ibb.co/juFBsd/kcross.jpg'),
(15, 3, 4, 'Harley Davidson Street', 7450, 'Moto da strada', 'hstreet.jpg', 'Harley Davidson Street stradale', 'https://image.ibb.co/cZmUdJ/hstreet.jpg'),
(16, 2, 3, 'Honda CBR', 18790, 'Moto sportiva', 'cbr.jpg', 'honda cbr sportiva', 'https://image.ibb.co/dgdWsd/cbr.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'mirco', 'cipro', 'cipromirco@gmail.com', '25f9e794323b453885f5181f1b624d0b', '3332819333', 'via piave 2c', 'via campo 1'),
(2, 'giovanni', 'sallusto', 'giovannisallusto@yahoo.com', '25f9e794323b453885f5181f1b624d0b', '3281937281', 'via delsole 1', 'via giovanni 92'),
(3, 'fabio', 'prova', 'prova@gmail.com', '25f9e794323b453885f5181f1b624d0b', '3339281384', 'via montegrappa 12', 'via salcito 89/a'),
(4, 'marco', 'prova', 'marco@gmail.com', '25f9e794323b453885f5181f1b624d0b', '3339284933', 'via montegrappa 12', 'via salcito 11/c'),
(5, 'piero', 'amatuzzi', 'pieroamatuzzi@gmail.com', '25f9e794323b453885f5181f1b624d0b', '3382983928', 'via ciao 1', 'via addio 3'),
(6, 'Gianni', 'De Cino', 'giannidecino@hotmail.it', '25f9e794323b453885f5181f1b624d0b', '3335494827', 'Via Cep 10', 'Via San Giovanni 98/a'),
(7, 'valerio', 'anchisio', 'valerioanchisio@gmail.com', '25f9e794323b453885f5181f1b624d0b', '3281938271', 'Via Cep 101', 'Via 24 Aprile '),
(8, 'Marco', 'Piede', 'marcopiede@live.it', '25f9e794323b453885f5181f1b624d0b', '3321839281', 'via ciao1', 'via buongiorno12');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indici per le tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indici per le tabelle `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT per la tabella `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
