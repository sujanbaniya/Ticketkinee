-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220503.92457c1607
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 02:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main_ticket_kinee`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id` int(11) NOT NULL,
  `airlines_name` varchar(500) NOT NULL,
  `airlines_logo_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `airlines_name`, `airlines_logo_path`) VALUES
(1, 'Yeti Airlines', '../logos/YetiAirlines.png'),
(2, 'Saurya Airlines', '../logos/SauryaAirlines.png'),
(3, 'Shree Airlines', '../logos/ShreeAirlines.png'),
(4, 'Buddha Airlines', '../logos/BuddhaAirlines.png');

-- --------------------------------------------------------

--
-- Table structure for table `airport_list`
--

CREATE TABLE `airport_list` (
  `id` int(11) NOT NULL,
  `location` varchar(500) NOT NULL,
  `airport_name` varchar(500) NOT NULL,
  `iata` varchar(500) NOT NULL,
  `district` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airport_list`
--

INSERT INTO `airport_list` (`id`, `location`, `airport_name`, `iata`, `district`) VALUES
(1, 'Baglung', 'Baglung Airport', 'BGL', 'Baglung'),
(2, 'Bajura', 'Bajura Airport', 'BJU', 'Bajura'),
(3, 'Bhadrapur', 'Bhadrapur Airport', 'BDP', 'Jhapa'),
(4, 'Bharatpur', 'Bharatpur Airport', 'BHR', 'Chitwan'),
(5, 'Bharatpur', 'Meghauli Airport', 'MEY', 'Chitwan'),
(6, 'Bhojpur', 'Bhojpur Airport', 'BHP', 'Bhojpur'),
(7, 'Biratnagar', 'Biratnagar Airport', 'BIR', 'Morang'),
(8, 'Birendranagar', 'Surkhet Airport', 'SKH', 'Surkhet'),
(9, 'Bowang', 'Dhorpatan Airport', '', 'Baglung'),
(10, 'Chandannath', 'Jumla Airport', 'JUM', 'Jumla'),
(11, 'Chaurjahari', 'Rukum Chaurjahari Airport', 'HRJ', 'Western Rukum'),
(12, 'Dhangadhi', 'Dhangadhi Airport', 'DHI', 'Kailali'),
(13, 'Dolpa', 'Dolpa Airport', 'DOP', 'Dolpa'),
(14, 'Dipayal Silgadhi', 'Doti Airport', 'SIH', 'Doti'),
(15, 'Gokuleshwor, Darchula', 'Darchula Airport', '', 'Darchula'),
(16, 'Ilam', 'Sukilumba Airport', '', 'Ilam'),
(17, 'Janakpur', 'Janakpur Airport', 'JKR', 'Dhanusha'),
(18, 'Jaya Prithvi', 'Bajhang Airport', 'BJH', 'Bajhang'),
(19, 'Jitpur Simara', 'Simara Airport', 'SIF', 'Bara'),
(20, 'Jiri', 'Jiri Airport', 'JIR', 'Dolakha'),
(21, 'Jomsom', 'Jomsom Airport', 'JMO', 'Mustang'),
(22, 'Kamal Bazar, Achham', 'Kamal Bazar Airport', '', 'Accham'),
(23, 'Kangeldanda', 'Kangeldanda Airport', '', 'Solukhumbu'),
(24, 'Kathmandu', 'Tribhuvan International Airport', 'KTM', 'Kathmandu'),
(25, 'Khanidanda, Khotang', 'Man Maya Airport', '', 'Khotang'),
(26, 'Khotehang', 'Thamkharka Airport', '', 'Khotang'),
(27, 'Lamidanda', 'Lamidanda Airport', 'LDN', 'Khotang'),
(28, 'Langtang', 'Langtang Airport', 'LTG', 'Rasuwa'),
(29, 'Lukla', 'Tenzing-Hillary Airport', 'LUA', 'Solukhumbu'),
(30, 'Mahendranagar', 'Mahendranagar Airport', 'XMG', 'Kanchanpur'),
(31, 'Manang', 'Manang Airport', 'NGX', 'Manang'),
(32, 'Nepalgunj', 'Nepalgunj Airport', 'KEP', 'Banke'),
(33, 'Pahada', 'Masinechaur Airport', '', 'Dolpa'),
(34, 'Palungtar', 'Palungtar Airport', 'GKH', 'Gorkha'),
(35, 'Patan, Baitadi', 'Baitadi Airport[3]', '', 'Baitadi'),
(36, 'Pokhara', 'Pokhara Airport', 'PKR', 'Kaski'),
(37, 'Rajbiraj', 'Rajbiraj Airport', 'RJB', 'Saptari'),
(38, 'Manthali', 'Ramechhap Airport', 'RHP', 'Ramechhap'),
(39, 'Rara National Park', 'Talcha Airport', '', 'Mugu'),
(40, 'Rolpa', 'Rolpa Airport', 'RPA', 'Rolpa'),
(41, 'Musikot', 'Rukum Salle Airport[4]', 'RUK', 'Western Rukum'),
(42, 'Rumjatar', 'Rumjatar Airport', 'RUM', 'Okhladhunga'),
(43, 'Sanfebagar', 'Sanphebagar Airport', 'FEB', 'Accham'),
(44, 'Siddharthanagar', 'Gautam Buddha Airport', 'BWA', 'Rupandehi'),
(45, 'Simikot', 'Simikot Airport', 'IMK', 'Humla'),
(46, 'Solu Dudhkunda', 'Phaplu Airport', 'PPL', 'Solukhumbu'),
(47, 'Syangboche', 'Syangboche Airport', 'SYH', 'Solukhumbu'),
(48, 'Taplejung', 'Taplejung Airport', 'TPJ', 'Taplejung'),
(49, 'Tikapur', 'Tikapur Airport', 'TPU', 'Kailali'),
(50, 'Tulsipur', 'Dang Airport', 'DNP', 'Dang'),
(51, 'Tumlingtar', 'Tumlingtar Airport', 'TMI', 'Sankhuwasabha');

-- --------------------------------------------------------

--
-- Table structure for table `booked_bus`
--

CREATE TABLE `booked_bus` (
  `bb_id` int(11) NOT NULL,
  `bus_ticket_list_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `location` varchar(500) NOT NULL,
  `destination` varchar(500) NOT NULL,
  `departure_datetime` varchar(500) NOT NULL,
  `arrival_datetime` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `qr_location_local_pc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_bus`
--

INSERT INTO `booked_bus` (`bb_id`, `bus_ticket_list_id`, `name`, `user_email`, `location`, `destination`, `departure_datetime`, `arrival_datetime`, `status`, `qr_location_local_pc`) VALUES
(3, 'BA-001', 'Aakash', 'aakash_shakya@hotmail.com', 'Kathmandu', 'Pokhara', '2022-05-29', '', 'active', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Aakash_Shakya_BA-001.png'),
(4, 'CHD-001', 'Manoj', 'manojchaudhary3168@gmail.com', 'Chandragiri', '', '', '', 'active', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Manoj_Chaudhary_CHD-001.png'),
(5, 'CHD-001', 'Manoj', 'manojchaudhary3168@gmail.com', 'Chandragiri', '', '', '', 'active', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Manoj_Chaudhary_CHD-001.png'),
(8, '', 'Sumit', 'dummy.sumitshrestha@gmail.com', '', '', '', '', 'active', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_.png'),
(10, 'CHD-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Chandragiri', '', '', '', 'active', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_CHD-001.png'),
(11, 'CHD-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Chandragiri', '', '', '', 'active', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_CHD-001.png'),
(12, 'CHD-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Chandragiri', '', '2022-05-29', '', 'active', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_CHD-001.png'),
(13, '', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Chandragiri', '', '2022-05-29', '', 'active', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_.png'),
(14, '', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Chandragiri', '', '2022-05-29', '', 'active', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_.png'),
(15, 'CHD-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Chandragiri', '', '2022-05-29', '', 'active', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_CHD-001.png');

-- --------------------------------------------------------

--
-- Table structure for table `booked_flight`
--

CREATE TABLE `booked_flight` (
  `bf_id` int(11) NOT NULL,
  `flight_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `location` varchar(500) NOT NULL,
  `destination` varchar(500) NOT NULL,
  `departure_date` varchar(500) NOT NULL,
  `arrival_date` varchar(500) NOT NULL,
  `qr_location` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_flight`
--

INSERT INTO `booked_flight` (`bf_id`, `flight_id`, `name`, `user_email`, `location`, `destination`, `departure_date`, `arrival_date`, `qr_location`) VALUES
(79, 'YT-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_YT-001.png'),
(80, 'YT-001', 'Ekin', 'nepalicovers3@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Ekin_Pariyar_YT-001.png'),
(81, 'YT-001', 'Manas', 'manesingh777@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Manas_Singh_YT-001.png'),
(82, 'YT-001', 'Sujan', 'sujankaranjit5@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sujan_Karanjit_YT-001.png'),
(83, 'BA-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-05-29', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_BA-001.png'),
(84, 'CHD-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Chandragiri', '', '2022-05-29', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_CHD-001.png'),
(85, 'CHD-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Chandragiri', '', '2022-05-29', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_CHD-001.png'),
(86, 'YT-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_YT-001.png'),
(87, '', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Chandragiri', '', '2022-05-29', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_.png'),
(88, '', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Chandragiri', '', '2022-05-29', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_.png'),
(89, 'YT-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_YT-001.png'),
(90, 'YT-001', 'Aakash', 'aakash_shakya@hotmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Aakash_Shakya_YT-001.png'),
(91, 'YT-001', 'Aakash', 'aakash_shakya@hotmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Aakash_Shakya_YT-001.png'),
(92, 'YT-001', 'Sailendra', 'sailendrashrestha84@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sailendra_Shrestha_YT-001.png'),
(93, 'YT-001', 'Manoj', 'manojchaudhary3168@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Manoj_Chaudhary_YT-001.png'),
(94, 'YT-001', 'Manoj', 'manojchaudhary3168@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Manoj_Chaudhary_YT-001.png'),
(95, 'YT-001', 'Krishna', 'kmrc.krsa@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Krishna_Dhungana_YT-001.png'),
(111, 'YT-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-07-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_YT-001.png'),
(112, 'YT-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-06-18', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_YT-001.png'),
(113, 'YT-004', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-05-30', '2022-05-30', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_YT-004.png'),
(115, 'YT-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_YT-001.png'),
(116, 'YT-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_YT-001.png'),
(117, 'YT-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_YT-001.png'),
(120, 'YT-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_YT-001.png'),
(121, 'YT-001', 'Sumit', 'dummy.sumitshrestha@gmail.com', 'Kathmandu', 'Pokhara', '2022-04-11', '', 'C:/xampp/htdocs/mainProject_TicketKinee/assets/php/temp/Sumit_Shrestha_YT-001.png');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `movie` int(11) NOT NULL,
  `hall` int(11) NOT NULL,
  `seat` varchar(11) NOT NULL,
  `totalSeats` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user`, `movie`, `hall`, `seat`, `totalSeats`, `totalPrice`) VALUES
(8, 9, 1, 1, ' F1', 1, 20),
(9, 9, 1, 1, ' A5 A6', 2, 40),
(11, 14, 1, 1, ' C6', 1, 250),
(12, 20, 3, 2, ' B2 C3 F4', 3, 750),
(13, 23, 3, 2, ' A5', 1, 250),
(14, 23, 1, 1, ' A3', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `bus_routes`
--

CREATE TABLE `bus_routes` (
  `id` int(11) NOT NULL,
  `location` varchar(500) NOT NULL,
  `station_name` varchar(500) NOT NULL,
  `iata` varchar(500) NOT NULL,
  `district` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_routes`
--

INSERT INTO `bus_routes` (`id`, `location`, `station_name`, `iata`, `district`) VALUES
(1, 'Kathmandu', 'Kathmandu Bus Park', 'KTM', 'Kathmandu'),
(2, 'Pokhara', 'Pokhara Bus Park', 'POK', 'Kaski'),
(3, 'Janakpur', 'Janakpur Bus Park', 'JKP', 'Dhanusha');

-- --------------------------------------------------------

--
-- Table structure for table `bus_tickets_list`
--

CREATE TABLE `bus_tickets_list` (
  `id` int(11) NOT NULL,
  `bus_travel_company_id` varchar(500) NOT NULL,
  `bus_ticket_no` varchar(500) NOT NULL,
  `departure_datetime` varchar(500) NOT NULL,
  `arrival_datetime` varchar(500) NOT NULL,
  `location_from` varchar(500) NOT NULL,
  `destination` varchar(500) NOT NULL,
  `seats` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `status` enum('active','closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_tickets_list`
--

INSERT INTO `bus_tickets_list` (`id`, `bus_travel_company_id`, `bus_ticket_no`, `departure_datetime`, `arrival_datetime`, `location_from`, `destination`, `seats`, `price`, `status`) VALUES
(1, '1', 'BA-001', '2022-05-29', '', 'Kathmandu', 'Pokhara', '25', '750', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bus_travel_company`
--

CREATE TABLE `bus_travel_company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_travel_company`
--

INSERT INTO `bus_travel_company` (`id`, `company_name`, `company_logo`) VALUES
(1, 'Bus Assist', '../logos/busassist.png');

-- --------------------------------------------------------

--
-- Table structure for table `cable_company`
--

CREATE TABLE `cable_company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cable_company`
--

INSERT INTO `cable_company` (`id`, `company_name`, `company_logo`) VALUES
(1, 'Chandragiri Cable Cars', '../logos/chandragiri_logo.png'),
(2, 'Annapurna Cable Cars', '');

-- --------------------------------------------------------

--
-- Table structure for table `cable_station`
--

CREATE TABLE `cable_station` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `iata` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cable_station`
--

INSERT INTO `cable_station` (`id`, `location`, `name`, `iata`, `district`) VALUES
(1, 'Chandragiri', 'Chandragiri', 'CHD', 'Kathmandu'),
(2, 'Annapurna', 'Annapurna', 'ANP', 'Kaski');

-- --------------------------------------------------------

--
-- Table structure for table `cable_tickets`
--

CREATE TABLE `cable_tickets` (
  `id` int(11) NOT NULL,
  `cable_company_id` int(11) NOT NULL,
  `cable_car_no` varchar(11) NOT NULL,
  `departure_datetime` varchar(255) NOT NULL,
  `location_from` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cable_tickets`
--

INSERT INTO `cable_tickets` (`id`, `cable_company_id`, `cable_car_no`, `departure_datetime`, `location_from`, `price`) VALUES
(1, 1, 'CHD-001', '2022-05-29', 'Chandragiri', 750);

-- --------------------------------------------------------

--
-- Table structure for table `flight_lists`
--

CREATE TABLE `flight_lists` (
  `id` int(11) NOT NULL,
  `airlines_id` int(11) NOT NULL,
  `flight_no` varchar(500) NOT NULL,
  `departure_datetime` varchar(500) NOT NULL,
  `arrival_datetime` varchar(500) NOT NULL,
  `location_from` varchar(500) NOT NULL,
  `destination` varchar(500) NOT NULL,
  `seats` int(11) NOT NULL,
  `price` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_lists`
--

INSERT INTO `flight_lists` (`id`, `airlines_id`, `flight_no`, `departure_datetime`, `arrival_datetime`, `location_from`, `destination`, `seats`, `price`) VALUES
(1, 1, 'YT-001', '2022-04-11', '', 'Kathmandu', 'Pokhara', 150, '1700'),
(2, 1, 'YT-002', '2022-05-30', '', 'Kathmandu', 'Pokhara', 150, '1700'),
(3, 1, 'YT-004', '2022-05-30', '2022-05-30', 'Kathmandu', 'Pokhara', 150, '4200'),
(4, 4, 'BD-001', '2022-06-01', '2022-06-01', 'Kathmandu', 'Pokhara', 100, '2000'),
(5, 4, 'BD-002', '2022-06-01', '2022-06-01', 'Kathmandu', 'Pokhara', 100, '1800'),
(6, 2, 'SAU-001', '2022-06-22', '2022-06-22', 'Kathmandu', 'Pokhara', 150, '4500');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `name`) VALUES
(1, 'HL001'),
(2, 'HL002'),
(3, 'HL003');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(266) NOT NULL,
  `sub_description` varchar(266) NOT NULL,
  `language` varchar(255) NOT NULL,
  `duration` time NOT NULL,
  `genre` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `casts` varchar(255) NOT NULL,
  `price` int(15) NOT NULL,
  `director` varchar(255) NOT NULL,
  `video_id_youtube` varchar(244) NOT NULL,
  `image` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `sub_description`, `language`, `duration`, `genre`, `release_date`, `casts`, `price`, `director`, `video_id_youtube`, `image`, `banner`) VALUES
(1, 'Batman', 'Batman a movie', 'English', '02:55:00', 'Action', '2022-03-04', 'John Wick , Ekin Pariyar', 20, 'Sumit DON Director', 'mqqft2x_Aa4', '62925924b727f8.90176792.jpg', '629258b6ce6834.48815851.jpg'),
(3, 'The Kasmir Files', 'A series of interviews about the exodus of Kashmiri Hindus in 1990, exploring the course of events and reasons for it.', 'Hindi ', '02:30:00', 'Thriller', '2022-02-07', 'Anupam Kher , Pallavi Joshi', 250, 'Vivek Agnihotri', 'A179apttY58', '6292597a0153a0.52913338.jpg', '6292595edce6c2.38576127.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nowplaying`
--

CREATE TABLE `nowplaying` (
  `id` int(11) NOT NULL,
  `movie` int(11) NOT NULL,
  `hall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nowplaying`
--

INSERT INTO `nowplaying` (`id`, `movie`, `hall`) VALUES
(1, 1, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id` int(11) NOT NULL,
  `hall` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `occupied` tinyint(1) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `hall`, `name`, `occupied`, `user`) VALUES
(1, 1, 'A1', 1, 0),
(2, 1, 'A2', 1, 9),
(3, 1, 'A3', 1, 23),
(4, 1, 'A4', 0, 0),
(5, 1, 'A5', 1, 9),
(6, 1, 'A6', 1, 9),
(7, 1, 'A7', 0, 0),
(8, 1, 'A8', 1, 9),
(9, 1, 'B1', 0, 0),
(10, 1, 'B2', 0, 0),
(11, 1, 'B3', 0, 0),
(12, 1, 'B4', 1, 10),
(13, 1, 'B5', 1, 10),
(14, 1, 'B6', 1, 10),
(15, 1, 'B7', 0, 0),
(16, 1, 'B8', 0, 0),
(17, 1, 'C1', 0, 0),
(18, 1, 'C2', 1, 9),
(19, 1, 'C3', 0, 0),
(20, 1, 'C4', 0, 0),
(21, 1, 'C5', 1, 9),
(22, 1, 'C6', 1, 14),
(23, 1, 'C7', 1, 14),
(24, 1, 'C8', 1, 14),
(25, 1, 'D1', 0, 0),
(26, 1, 'D2', 0, 0),
(27, 1, 'D3', 0, 0),
(28, 1, 'D4', 1, 9),
(29, 1, 'D5', 1, 10),
(30, 1, 'D6', 0, 0),
(31, 1, 'D7', 0, 0),
(32, 1, 'D8', 0, 0),
(33, 1, 'E1', 0, 0),
(34, 1, 'E2', 0, 0),
(35, 1, 'E3', 0, 0),
(36, 1, 'E4', 0, 0),
(37, 1, 'E5', 0, 0),
(38, 1, 'E6', 1, 9),
(39, 1, 'E7', 0, 0),
(40, 1, 'E8', 0, 0),
(41, 1, 'F1', 1, 9),
(42, 1, 'F2', 0, 0),
(43, 1, 'F3', 0, 0),
(44, 1, 'F4', 0, 0),
(45, 1, 'F5', 0, 0),
(46, 1, 'F6', 0, 0),
(47, 1, 'F7', 0, 0),
(48, 1, 'F8', 0, 0),
(49, 1, 'G1', 0, 0),
(50, 1, 'G2', 0, 0),
(51, 1, 'G3', 0, 0),
(52, 1, 'G4', 0, 0),
(53, 1, 'G5', 0, 0),
(54, 1, 'G6', 0, 0),
(55, 1, 'G7', 0, 0),
(56, 1, 'G8', 0, 0),
(57, 2, 'A1', 0, 0),
(58, 2, 'A2', 0, 0),
(59, 2, 'A3', 0, 0),
(60, 2, 'A4', 0, 0),
(61, 2, 'A5', 1, 23),
(62, 2, 'A6', 0, 0),
(63, 2, 'A7', 0, 0),
(64, 2, 'A8', 0, 0),
(65, 2, 'B1', 0, 0),
(66, 2, 'B2', 1, 20),
(67, 2, 'B3', 0, 0),
(68, 2, 'B4', 0, 0),
(69, 2, 'B5', 0, 0),
(70, 2, 'B6', 0, 0),
(71, 2, 'B7', 0, 0),
(72, 2, 'B8', 0, 0),
(73, 2, 'C1', 0, 0),
(74, 2, 'C2', 0, 0),
(75, 2, 'C3', 1, 20),
(76, 2, 'C4', 0, 0),
(77, 2, 'C5', 0, 0),
(78, 2, 'C6', 0, 0),
(79, 2, 'C7', 0, 0),
(80, 2, 'C8', 0, 0),
(81, 2, 'D1', 0, 0),
(82, 2, 'D2', 0, 0),
(83, 2, 'D3', 0, 0),
(84, 2, 'D4', 0, 0),
(85, 2, 'D5', 0, 0),
(86, 2, 'D6', 0, 0),
(87, 2, 'D7', 0, 0),
(88, 2, 'D8', 0, 0),
(89, 2, 'E1', 0, 0),
(90, 2, 'E2', 0, 0),
(91, 2, 'E3', 0, 0),
(92, 2, 'E4', 0, 0),
(93, 2, 'E5', 0, 0),
(94, 2, 'E6', 0, 0),
(95, 2, 'E7', 0, 0),
(96, 2, 'E8', 0, 0),
(97, 2, 'F1', 0, 0),
(98, 2, 'F2', 0, 0),
(99, 2, 'F3', 0, 0),
(100, 2, 'F4', 1, 20),
(101, 2, 'F5', 0, 0),
(102, 2, 'F6', 0, 0),
(103, 2, 'F7', 0, 0),
(104, 2, 'F8', 0, 0),
(105, 2, 'G1', 0, 0),
(106, 2, 'G2', 0, 0),
(107, 2, 'G3', 0, 0),
(108, 2, 'G4', 0, 0),
(109, 2, 'G5', 0, 0),
(110, 2, 'G6', 0, 0),
(111, 2, 'G7', 0, 0),
(112, 2, 'G8', 0, 0),
(113, 3, 'A1', 0, 0),
(114, 3, 'A2', 0, 0),
(115, 3, 'A3', 0, 0),
(116, 3, 'A4', 0, 0),
(117, 3, 'A5', 0, 0),
(118, 3, 'A6', 0, 0),
(119, 3, 'A7', 0, 0),
(120, 3, 'A8', 0, 0),
(121, 3, 'B1', 0, 0),
(122, 3, 'B2', 0, 0),
(123, 3, 'B3', 0, 0),
(124, 3, 'B4', 0, 0),
(125, 3, 'B5', 0, 0),
(126, 3, 'B6', 0, 0),
(127, 3, 'B7', 0, 0),
(128, 3, 'B8', 0, 0),
(129, 3, 'C1', 0, 0),
(130, 3, 'C2', 0, 0),
(131, 3, 'C3', 0, 0),
(132, 3, 'C4', 0, 0),
(133, 3, 'C5', 0, 0),
(134, 3, 'C6', 0, 0),
(135, 3, 'C7', 0, 0),
(136, 3, 'C8', 0, 0),
(137, 3, 'D1', 0, 0),
(138, 3, 'D2', 0, 0),
(139, 3, 'D3', 0, 0),
(140, 3, 'D4', 0, 0),
(141, 3, 'D5', 0, 0),
(142, 3, 'D6', 0, 0),
(143, 3, 'D7', 0, 0),
(144, 3, 'D8', 0, 0),
(145, 3, 'E1', 0, 0),
(146, 3, 'E2', 0, 0),
(147, 3, 'E3', 0, 0),
(148, 3, 'E4', 0, 0),
(149, 3, 'E5', 0, 0),
(150, 3, 'E6', 0, 0),
(151, 3, 'E7', 0, 0),
(152, 3, 'E8', 0, 0),
(153, 3, 'F1', 0, 0),
(154, 3, 'F2', 0, 0),
(155, 3, 'F3', 0, 0),
(156, 3, 'F4', 0, 0),
(157, 3, 'F5', 0, 0),
(158, 3, 'F6', 0, 0),
(159, 3, 'F7', 0, 0),
(160, 3, 'F8', 0, 0),
(161, 3, 'G1', 0, 0),
(162, 3, 'G2', 0, 0),
(163, 3, 'G3', 0, 0),
(164, 3, 'G4', 0, 0),
(165, 3, 'G5', 0, 0),
(166, 3, 'G6', 0, 0),
(167, 3, 'G7', 0, 0),
(168, 3, 'G8', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `booked_id` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_ref_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_email`, `booked_id`, `amount`, `payment_ref_code`) VALUES
(1, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, 'cQC6wLiR'),
(2, 'nepalicovers3@gmail.com', 'YT-001', 1700, 'z8sfM7C2'),
(3, 'manesingh777@gmail.com', 'YT-001', 1700, 'Q5ys09iZ'),
(4, 'sujankaranjit5@gmail.com', 'YT-001', 1700, 'txTO0C2P'),
(5, 'dummy.sumitshrestha@gmail.com', 'BA-001', 750, 's1bhjvSe'),
(6, 'dummy.sumitshrestha@gmail.com', 'BA-001', 750, 'nI0Zc4N3'),
(7, 'dummy.sumitshrestha@gmail.com', 'BA-001', 750, '0akrEFvR'),
(8, 'dummy.sumitshrestha@gmail.com', 'CHD-001', 750, 'CuFdWkQt'),
(9, 'dummy.sumitshrestha@gmail.com', 'CHD-001', 750, 'JzQpPbmw'),
(10, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, '6XExtogM'),
(13, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, 'ZvLdAwnE'),
(14, 'aakash_shakya@hotmail.com', 'YT-001', 1700, 'qW8jDLnt'),
(15, 'aakash_shakya@hotmail.com', 'YT-001', 1700, 'QUWG1Rqj'),
(16, 'aakash_shakya@hotmail.com', 'BA-001', 750, 'lyXtcsdO'),
(17, 'sailendrashrestha84@gmail.com', 'YT-001', 1700, 'S7ezgE0q'),
(18, 'manojchaudhary3168@gmail.com', 'YT-001', 17000, 'uo0SY9z7'),
(19, 'manojchaudhary3168@gmail.com', 'YT-001', 3400, 'qZAaDN7L'),
(20, 'manojchaudhary3168@gmail.com', 'CHD-001', 1500, 'Ya7N2C3V'),
(21, 'manojchaudhary3168@gmail.com', 'CHD-001', 1500, 'OtfkTUG5'),
(22, 'kmrc.krsa@gmail.com', 'YT-001', 1700, 'DHC9Ad8r'),
(23, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, 'pjEHVYAd'),
(24, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, 'IycatNOw'),
(25, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, '7cb6widK'),
(26, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, 'NqhJ6ATL'),
(28, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, 'uKc6n4Zk'),
(29, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, 'pWUezI5v'),
(30, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, 'Bbj5fAo0'),
(31, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, 'Kivub2Cf'),
(42, 'dummy.sumitshrestha@gmail.com', 'SAU-001', 4500, '00042D2'),
(43, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, '00042D3'),
(44, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, '00042D3'),
(45, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, '00042KO'),
(46, 'dummy.sumitshrestha@gmail.com', 'SAU-001', 4500, '00042KQ'),
(47, 'dummy.sumitshrestha@gmail.com', 'SAU-001', 4500, '00042KX'),
(50, 'dummy.sumitshrestha@gmail.com', 'BA-001', 750, '00042L6'),
(51, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, '00042RU'),
(52, 'dummy.sumitshrestha@gmail.com', 'CHD-001', 750, 'YW1ZOtbT'),
(53, 'dummy.sumitshrestha@gmail.com', 'CHD-001', 750, 'xBqKHUWV'),
(54, 'dummy.sumitshrestha@gmail.com', 'CHD-001', 750, 'QCGriL4B'),
(57, 'dummy.sumitshrestha@gmail.com', 'CHD-001', 750, '00042RY'),
(58, 'dummy.sumitshrestha@gmail.com', 'YT-001', 1700, '00042VF');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(500) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `user_contact_no` bigint(15) NOT NULL,
  `user_password` varchar(1000) NOT NULL,
  `user_type` enum('normal','admin') NOT NULL,
  `verification_status` enum('unverified','verified') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_username`, `user_email`, `user_contact_no`, `user_password`, `user_type`, `verification_status`) VALUES
(1, 'Sumit', 'Shrestha', 's1_1mit', 'sumitshrestha027@gmail.com', 9840125398, 'a912c71d2374016ebd47a0a03051538e', 'admin', 'verified'),
(10, 'Ekin', 'Pariyar', 'ekin_pariyar', 'nepalicovers3@gmail.com', 9818089882, '9db0c58f63d763ba39863859b4eee256', 'normal', 'verified'),
(12, 'Homa', 'Khatri', 'homa_khatri', 'homakhatri221@gmail.com', 9863495916, '25f9e794323b453885f5181f1b624d0b', 'normal', 'verified'),
(13, 'Manas', 'Singh', 'manas_singh', 'manesingh777@gmail.com', 9840123456, '25f9e794323b453885f5181f1b624d0b', 'normal', 'verified'),
(15, 'Sujan', 'Karanjit', 'sujan', 'sujankaranjit5@gmail.com', 98400000000, '25f9e794323b453885f5181f1b624d0b', 'normal', 'verified'),
(16, 'Aakash', 'Shakya', 'aakash', 'aakash_shakya@hotmail.com', 9840125125, '25f9e794323b453885f5181f1b624d0b', 'normal', 'verified'),
(20, 'Manoj', 'Chaudhary', 'mannu', 'manojchaudhary3168@gmail.com', 9818297183, '25f9e794323b453885f5181f1b624d0b', 'normal', 'verified'),
(21, 'Krishna', 'Dhungana', 'krishna', 'kmrc.krsa@gmail.com', 9849821879, '25f9e794323b453885f5181f1b624d0b', 'normal', 'verified'),
(23, 'Sumit', 'Shrestha', 'sums', 'dummy.sumitshrestha@gmail.com', 9840125399, '6ebe76c9fb411be97b3b0d48b791a7c9', 'normal', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `verification_token`
--

CREATE TABLE `verification_token` (
  `id` int(11) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `token` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport_list`
--
ALTER TABLE `airport_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_bus`
--
ALTER TABLE `booked_bus`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indexes for table `booked_flight`
--
ALTER TABLE `booked_flight`
  ADD PRIMARY KEY (`bf_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie` (`movie`),
  ADD KEY `hall` (`hall`),
  ADD KEY `seat` (`seat`);

--
-- Indexes for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_tickets_list`
--
ALTER TABLE `bus_tickets_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_travel_company`
--
ALTER TABLE `bus_travel_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cable_company`
--
ALTER TABLE `cable_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cable_station`
--
ALTER TABLE `cable_station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cable_tickets`
--
ALTER TABLE `cable_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_lists`
--
ALTER TABLE `flight_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airlines_id` (`airlines_id`),
  ADD KEY `flight_no` (`flight_no`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nowplaying`
--
ALTER TABLE `nowplaying`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie` (`movie`),
  ADD KEY `hall` (`hall`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall` (`hall`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_contact_no` (`user_contact_no`);

--
-- Indexes for table `verification_token`
--
ALTER TABLE `verification_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `airport_list`
--
ALTER TABLE `airport_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `booked_bus`
--
ALTER TABLE `booked_bus`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `booked_flight`
--
ALTER TABLE `booked_flight`
  MODIFY `bf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bus_routes`
--
ALTER TABLE `bus_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bus_tickets_list`
--
ALTER TABLE `bus_tickets_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bus_travel_company`
--
ALTER TABLE `bus_travel_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cable_company`
--
ALTER TABLE `cable_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cable_station`
--
ALTER TABLE `cable_station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cable_tickets`
--
ALTER TABLE `cable_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flight_lists`
--
ALTER TABLE `flight_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nowplaying`
--
ALTER TABLE `nowplaying`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `verification_token`
--
ALTER TABLE `verification_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`hall`) REFERENCES `hall` (`id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`movie`) REFERENCES `movie` (`id`);

--
-- Constraints for table `flight_lists`
--
ALTER TABLE `flight_lists`
  ADD CONSTRAINT `flight_lists_ibfk_1` FOREIGN KEY (`airlines_id`) REFERENCES `airlines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nowplaying`
--
ALTER TABLE `nowplaying`
  ADD CONSTRAINT `nowplaying_ibfk_1` FOREIGN KEY (`hall`) REFERENCES `hall` (`id`),
  ADD CONSTRAINT `nowplaying_ibfk_2` FOREIGN KEY (`movie`) REFERENCES `movie` (`id`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`hall`) REFERENCES `hall` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



